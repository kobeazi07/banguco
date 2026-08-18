<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
