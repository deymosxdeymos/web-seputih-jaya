<?php

namespace App\Http\Controllers\Admin;


use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.profile.index',[
            'profile' => DB::table('profile')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profile = profile::count();
        if($profile > 0){
            $profile = profile::paginate(5);
            return redirect(route('admin.profile.index'))->with('check', 'Data Profile Telah Dibuat Silahkan Ubah Data Yang Ada Atau Hapus Data Yang Sudah Ada', compact('profile'));
        }else{
            return view('admin.profile.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'nama_kelurahan' => 'required|min:3|max:255',
            'content' => 'required|min:10',
        ],[
            'nama_kelurahan.required' => 'Input Tidak Boleh Kosong',
            'nama_kelurahan.min' => 'Minimal Inputkan 3 Karakter',
            'nama_kelurahan.max' => 'Maksimal Inputkan 225 Karakter',
            'content.required' => 'Input Tidak Boleh Kosong',
            'content.min' => 'Minimal Inputkan 3 Karakter',
        ]);


        profile::create([
            'nama_kelurahan' => $request->nama_kelurahan,
            'content' => $request->content
        ]);

        return redirect(route('admin.profile.index'))->with('sukses', 'Berhasil Tambah Data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profile = profile::where('id', $id)->first();
        return view('admin.profile.read', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profile = profile::where('id', $id)->first();
        return view('admin.profile.update', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            'nama_kelurahan' => 'required|min:3|max:255',
            'content' => 'required|min:10',
        ],[
            'nama_kelurahan.required' => 'Input Tidak Boleh Kosong',
            'nama_kelurahan.min' => 'Minimal Inputkan 3 Karakter',
            'nama_kelurahan.max' => 'Maksimal Inputkan 225 Karakter',
            'content.required' => 'Input Tidak Boleh Kosong',
            'content.min' => 'Minimal Inputkan 3 Karakter',
        ]);


        $profile = profile::where('id', $id)->first();
        // if ($request->hasFile('foto')) {
        //     $detination_path = 'public/artikel';
        //     $image = $request->file('foto');
        //     $imageName = time() . '_' . $image->getClientOriginalName();
        //     $image->storeAs($detination_path, $imageName);
        //     $filePath = 'artikel/'.$profile->foto;
        //     if (Storage::disk('public')->exists($filePath)) {
        //         Storage::disk('public')->delete($filePath);
        //     }
        //     $profile->update([
        //         'judul' => $request->judul,
        //         'tgl' => $request->tgl,
        //         'foto' => $request->foto,
        //         'content' => $request->content
        //     ]);
        // }
            $profile->update([
                'judul' => $request->judul,
                'tgl' => $request->tgl,
                'content' => $request->content
            ]);
        return redirect(route('admin.profile.index'))->with('sukses', 'Berhasil Ubah Data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profile = profile::where('id', $id)->first();
        $profile->delete();
        return redirect(route('admin.profile.index'))->with('sukses', 'Berhasil Hapus Data!');
    }
    public function __construct()
    {
        $this->middleware('guest')->except('index', 'create', 'store', 'show', 'edit', 'update', 'destroy');
    }
}
