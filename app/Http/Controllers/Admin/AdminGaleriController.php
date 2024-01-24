<?php

namespace App\Http\Controllers\Admin;


use App\Models\galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class AdminGaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.galeri.index',[
            'galeri' => DB::table('galeri')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'foto' => 'required|mimes:jpg,png,jpeg|max:5120',
        ],[
            'foto.max' => 'Input Hanya Menampung File  Maksimal 5mb',
            'foto.mimes' => 'Input Hanya Menerima File Dengan Extensi jpg,png,jpeg',
        ]);


        if ($request->hasFile('foto')) {
            $detination_path = 'public/galeri';
            $image = $request->file('foto');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs($detination_path, $imageName);
        }
            galeri::create([
                'foto' => $imageName
            ]);

        return redirect(route('admin.galeri.index'))->with('sukses', 'Berhasil Tambah Data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $galeri = galeri::where('id', $id)->first();
        return view('admin.galeri.read', compact('galeri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $galeri = galeri::where('id', $id)->first();
        return view('admin.galeri.update', compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            'foto' => 'required|mimes:jpg,png,jpeg|max:5120',
        ],[
            'foto.max' => 'Input Hanya Menampung File  Maksimal 5mb',
            'foto.mimes' => 'Input Hanya Menerima File Dengan Extensi jpg,png,jpeg',
        ]);


        $galeri = galeri::where('id', $id)->first();
        if ($request->hasFile('foto')) {
            $detination_path = 'public/galeri';
            $image = $request->file('foto');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs($detination_path, $imageName);
            $filePath = 'galeri/'.$galeri->foto;
            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            $galeri->update([
                'foto' => $imageName
            ]);
        }
        return redirect(route('admin.galeri.index'))->with('sukses', 'Berhasil Ubah Data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $galeri = galeri::where('id', $id)->first();
        $galeri->delete();
        return redirect(route('admin.galeri.index'))->with('sukses', 'Berhasil Hapus Data!');
    }
    public function __construct()
    {
        $this->middleware('guest')->except('index', 'create', 'store', 'show', 'edit', 'update', 'destroy');
    }
}
