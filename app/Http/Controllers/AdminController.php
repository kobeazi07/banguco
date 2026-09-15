<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Format;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\SettingModel;
use App\Models\About;
use App\Models\Faq;
use App\Models\Blog;
use App\Models\User;
use App\Models\G_Blog;

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
            'message' => 'blog berhasil diupdate'
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
            // if ($request->hasFile('foto')) {
            //     $thumbnail = $request->file('foto');

            //     $originalName = $thumbnail->getClientOriginalName();

            //     // Ganti spasi dengan tanda -
            //     $originalName = str_replace(' ', '-', $originalName);

            //     $thumbnailName = uniqid() . '_foto_' . $originalName;

            //     $thumbnail->move(
            //         public_path('inputan/blog/'),
            //         $thumbnailName
            //     );

            //     $thumbnailPath = 'inputan/blog/' . $thumbnailName;
            // }
            if ($request->hasFile('foto')) {

                $thumbnail = $request->file('foto');
                $originalName = pathinfo(
                    $thumbnail->getClientOriginalName(),
                    PATHINFO_FILENAME
                );
                $originalName = str_replace(' ', '-', $originalName);
                $thumbnailName = uniqid() . '_foto_' . $originalName . '.webp';
                $destination = public_path('inputan/blog/');
                if (!file_exists($destination)) {
                    mkdir($destination, 0755, true);
                }

                $manager = ImageManager::usingDriver(Driver::class);

                $image = $manager->decode(
                    $thumbnail->getPathname()
                );
                // Resize maksimal 1920px
                $image->scaleDown(width: 1920);
                // Convert ke WebP quality 80
                $encoded = $image->encodeUsingFormat(
                    Format::WEBP,
                    quality: 80
                );
                $encoded->save(
                    $destination . $thumbnailName
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
            $blog_id = $blog->id;
            // dd($request->hasFile('files'));
            if ($request->hasFile('files')) {

                // Gunakan Image Manager
                $manager = ImageManager::usingDriver(Driver::class);

                foreach ($request->file('files') as $file) {
                    $originalName = pathinfo(
                        $file->getClientOriginalName(),
                        PATHINFO_FILENAME
                    );
                    $originalName = str_replace(' ', '-', $originalName);
                    $fileName = uniqid() . '_' . $originalName . '.webp';
                    $destination = public_path(
                        'inputan/blog/detailimg'
                    );
                    if (!file_exists($destination)) {
                        mkdir($destination, 0755, true);
                    }
                    $image = $manager->decode($file);

                    // Resize maksimal 1920px
                    $image->scaleDown(width: 1920);

                    // Convert ke WebP quality 80
                    $encoded = $image->encodeUsingFormat(
                        Format::WEBP,
                        quality: 80
                    );
                    $encoded->save(
                        $destination . '/' . $fileName
                    );

                    // Simpan ke database
                    G_Blog::create([
                        'blog_id' => $blog_id,
                        'image'        => $fileName,
                        'created_at'   => now(),
                        'updated_at'   => now(),
                    ]);
                }
            }


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

        $blog = Blog::findOrFail($id);
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
            // Simpan nama file lama 
            $oldPhoto = $blog->foto;
            // Nama file tanpa extension
            $originalName = pathinfo(
                $thumbnail->getClientOriginalName(),
                PATHINFO_FILENAME
            );
            $originalName = str_replace(' ', '-', $originalName);
            $thumbnailName = uniqid() . '_foto_' . $originalName . '.webp';
            $destination = public_path('inputan/blog/');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            // Gunakan GD
            $manager = ImageManager::usingDriver(Driver::class);
            // Baca file upload
            $image = $manager->decode($thumbnail);
            // Resize maksimal 1920px, rasio tetap
            $image->scaleDown(width: 1920);
            // Convert ke WebP + compression
            $encoded = $image->encodeUsingFormat(
                Format::WEBP,
                quality: 80
            );
            $encoded->save(
                $destination . $thumbnailName
            );

            $data['foto'] = 'inputan/blog/' . $thumbnailName;

            if (!empty($oldPhoto)) {
                $oldPhotoPath = public_path($oldPhoto);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }
        }
        Blog::where('id', $id)->update($data);
        $blog_id = $id;
        if ($request->hasFile('files')) {

            // Gunakan Image Manager
            $manager = ImageManager::usingDriver(Driver::class);
            foreach ($request->file('files') as $file) {
                $originalName = pathinfo(
                    $file->getClientOriginalName(),
                    PATHINFO_FILENAME
                );
                $originalName = str_replace(' ', '-', $originalName);
                $fileName = uniqid() . '_' . $originalName . '.webp';
                $destination = public_path(
                    'inputan/blog/detailimg'
                );
                if (!file_exists($destination)) {
                    mkdir($destination, 0755, true);
                }
                $image = $manager->decode($file);
                // Resize maksimal 1920px
                $image->scaleDown(width: 1920);
                // Convert ke WebP quality 80
                $encoded = $image->encodeUsingFormat(
                    Format::WEBP,
                    quality: 80
                );
                $encoded->save(
                    $destination . '/' . $fileName
                );

                // Simpan ke database
                G_Blog::create([
                    'blog_id' => $blog_id,
                    'image'        => $fileName,
                    'created_at'   => now(),
                    'updated_at'   => now(),
                ]);
            }
        }
        // if ($request->hasFile('foto')) {

        //     $thumbnail = $request->file('foto');
        //     $oldPhoto = $blog->foto;
        //     $originalName = $thumbnail->getClientOriginalName();
        //     $originalName = str_replace(' ', '-', $originalName);
        //     $thumbnailName = uniqid() . '_foto_' . $originalName;
        //     $thumbnail->move(
        //         public_path('inputan/blog/'),
        //         $thumbnailName
        //     );
        //     // Simpan path ke database
        //     $data['foto'] = 'inputan/blog/' . $thumbnailName;
        // }


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

    public function deletePictureblog($id)
    {
        $picture = G_Blog::findOrFail($id);

        // hapus file fisik
        $filePath = public_path('inputan/blog/detailimg/' . $picture->image);
        // $filePath = public_path($picture->image);


        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $picture->delete();

        return response()->json([
            'success' => true
        ]);
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
