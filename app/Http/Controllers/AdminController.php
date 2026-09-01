<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\SettingModel;
use App\Models\About;
use App\Models\Faq;
use App\Models\Blog;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $setting = SettingModel::limit(1)->get();
        $settingss = SettingModel::limit(1)->get();
        return view('backend.pages.dashboard', compact('setting', 'settingss'));
    }

    public function edit_setting(Request $request, $id)
    {
        $setting =   SettingModel::find($id);
        $data = [
            'tittle'     => $request->judul,
            'description' => $request->deskripsi,
            'meta'     => $request->meta,
            'price' => $request->harga,
            'no_wa' => $request->nowa,
            'link_ig' => $request->link_ig,
            'link_facebook' => $request->link_facebook,
            'link_tiktok' => $request->link_tiktok,
            'text_wa' => $request->text_wa,
        ];

        // cek jika ada thumbnail baru
        if ($request->hasFile('thumbnail')) {

            $thumbnail = $request->file('thumbnail');
            $thumbnailName = uniqid() . '_thumbnail_' . $thumbnail->getClientOriginalName();
            $thumbnail->move(public_path('inputan/thumbnail/img'), $thumbnailName);

            $data['gambar'] = 'inputan/thumbnail/img/' . $thumbnailName;
        }

        // update data
        SettingModel::where('id', $id)->update($data);

        return response()->json([
            'status' => 1,
            'message' => 'Portfolio berhasil diupdate'
        ]);
    }
    public function profiladmin()
    {
        $users = Auth::user();

        return view('backend.pages.profil', compact('users'));
    }
    public function edit_profiladmin(Request $request, $id)
    {

        $user = User::findOrFail(Auth::id());

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return response()->json([
            'status' => 1,
            'message' => 'Profil admin berhasil diupdate'
        ]);
    }
    // about
    public function about()
    {
        $abouts = About::limit(1)->get();
        return view('backend.pages.about', compact('abouts'));
    }

    public function tambah_about(Request $request)
    {
        $thumbnailPath = null;



        $about = About::create([
            'judul'   => $request->judul,
            'deskripsi' => $request->deskripsi,
            'visi' => $request->visi,
            'misi' => $request->misi,

        ]);
        return response()->json([
            'status' => 1,
            'message' => 'About berhasil ditambahkan'
        ]);
    }

    public function edit_about(Request $request, $id)
    {
        $about =   About::find($id);
        $data = [
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'visi' => $request->visi,
            'misi' => $request->misi,
        ];


        // update data
        About::where('id', $id)->update($data);
        //  dd($id);   

        return response()->json([
            'status' => 1,
            'message' => 'About berhasil diupdate'
        ]);
    }


    //faq
    public function admin_faq()
    {
        $faq = Faq::get();
        return view('backend.pages.faq', compact('faq'));
    }
    public function tambah_faq(Request $request)
    {

        DB::beginTransaction();

        try {
            $faq = Faq::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);

            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'faq berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function edit_faq(Request $request, $id)
    {

        $faq = Faq::find($id);
        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi
        ];
        Faq::where('id', $id)->update($data);
        return response()->json([
            'status'  => 1,
            'message' => 'Data faq berhasil diupdate'
        ]);
    }
    public function faq_destroy(Faq $faq)
    {
        DB::beginTransaction();

        try {

            // hapus file gambar jika ada
            if ($faq->image && file_exists(public_path($faq->image))) {
                unlink(public_path($faq->image));
            }

            // hapus data
            $faq->delete();

            DB::commit();

            return response()->json([
                'status'  => 1,
                'message' => 'Data faq berhasil dihapus'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // blog
    public function admin_blog()
    {
        $blog = Blog::get();
        return view('backend.pages.blog', compact('blog'));
    }
    public function tambah_blog(Request $request)
    {

        DB::beginTransaction();

        try {
            $thumbnailPath = null;
            if ($request->hasFile('foto')) {
                $thumbnail = $request->file('foto');

                $originalName = $thumbnail->getClientOriginalName();

                // Ganti spasi dengan tanda -
                $originalName = str_replace(' ', '-', $originalName);

                $thumbnailName = uniqid() . '_foto_' . $originalName;

                $thumbnail->move(
                    public_path('inputan/blog/'),
                    $thumbnailName
                );

                $thumbnailPath = 'inputan/blog/' . $thumbnailName;
            }
            $slug = Str::slug($request->judul);

            $originalSlug = $slug;
            $count = 1;

            while (Blog::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $blog = Blog::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'foto' =>  $thumbnailPath,
                'slug' => $slug,
            ]);

            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'blog berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function edit_blog(Request $request, $id)
    {

        $blog = Blog::find($id);
        $slug = Str::slug($request->judul);

        // Cek apakah slug sudah digunakan artikel lain
        $originalSlug = $slug;
        $count = 1;

        while (
            Blog::where('slug', $slug)
            ->where('id', '!=', $id)
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi
        ];
        if ($request->hasFile('foto')) {

            $thumbnail = $request->file('foto');
            $originalName = $thumbnail->getClientOriginalName();
            $originalName = str_replace(' ', '-', $originalName);
            $thumbnailName = uniqid() . '_foto_' . $originalName;
            $thumbnail->move(
                public_path('inputan/blog/'),
                $thumbnailName
            );
            // Simpan path ke database
            $data['foto'] = 'inputan/blog/' . $thumbnailName;
        }


        Blog::where('id', $id)->update($data);
        return response()->json([
            'status'  => 1,
            'message' => 'Data blog berhasil diupdate'
        ]);
    }
    public function blog_destroy(Blog $blog)
    {
        DB::beginTransaction();

        try {

            // hapus file gambar jika ada
            if ($blog->foto && file_exists(public_path($blog->foto))) {
                unlink(public_path($blog->foto));
            }

            // hapus data
            $blog->delete();

            DB::commit();

            return response()->json([
                'status'  => 1,
                'message' => 'Data blog berhasil dihapus'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    //login
    public function halamanlogin()
    {

        return view('backend.layouts.login');
    }
    public function login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
        ]);
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return response()->json([
                'success' => true,
                'message' => 'Login berhasil',
                'redirect' => route('HalamanDashboard') // sesuaikan route tujuan
            ]);
        }
        // Password salah
        return response()->json([
            'success' => false,
            'message' => 'Password salah! Silakan coba lagi.'
        ], 401);
    }
    public function user_logout(Request $request)
    {

        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
