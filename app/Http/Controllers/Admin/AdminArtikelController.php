<?php

namespace App\Http\Controllers\Admin;

use App\Models\artikel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class AdminArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.artikel.index',[
            'artikel' => DB::table('artikel')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'judul' => 'required|min:3|max:255',
            'foto' => 'mimes:jpg,png,jpeg|max:5120',
            'tgl_for_set' => 'required|date_format:Y-m-d\TH:i',
            'tgl' => 'required',
            'content' => 'required|min:10',
        ],[
            'judul.required' => 'Input Tidak Boleh Kosong',
            'judul.min' => 'Minimal Inputkan 3 Karakter',
            'judul.max' => 'Maksimal Inputkan 225 Karakter',
            'foto.required' => 'Input Tidak Boleh Kosong',
            'foto.max' => 'Input Hanya Menampung File  Maksimal 5mb',
            'foto.mimes' => 'Input Hanya Menerima File Dengan Extensi jpg,png,jpeg',
            'tgl.required' => 'Input Tidak Boleh Kosong',
            'tgl_for_set.required' => 'Input Tidak Boleh Kosong',
            'tgl_for_set.date_format' => 'Input Tanggal Harus Dengan Format datetime-local',
            'content.required' => 'Input Tidak Boleh Kosong',
            'content.min' => 'Minimal Inputkan 3 Karakter',
        ]);


        $carbonDate = Carbon::parse($request->tgl_for_set);
        $day = $carbonDate->format('d');
        $month = $carbonDate->format('M');
        if ($request->hasFile('foto')) {
            $detination_path = 'public/artikel';
            $image = $request->file('foto');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs($detination_path, $imageName);
        }
            artikel::create([
                'judul' => $request->judul,
                'foto' => $imageName,
                'original_tgl' => $request->tgl_for_set,
                'tgl' => $request->tgl,
                'day' => $day,
                'month' => $month,
                'content' => $request->content
            ]);

        return redirect(route('admin.artikel.index'))->with('sukses', 'Berhasil Tambah Data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $artikel = artikel::where('id', $id)->first();
        return view('admin.artikel.read', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $artikel = artikel::where('id', $id)->first();
        return view('admin.artikel.update', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            'judul' => 'required|min:3|max:255',
            'foto' => 'mimes:jpg,png,jpeg|max:5120',
            'tgl_for_set' => 'required|date_format:Y-m-d\TH:i',
            'tgl' => 'required',
            'content' => 'required|min:10',
        ],[
            'judul.required' => 'Input Tidak Boleh Kosong',
            'judul.min' => 'Minimal Inputkan 3 Karakter',
            'judul.max' => 'Maksimal Inputkan 225 Karakter',
            'foto.max' => 'Input Hanya Menampung File  Maksimal 5mb',
            'foto.mimes' => 'Input Hanya Menerima File Dengan Extensi jpg,png,jpeg',
            'tgl.required' => 'Input Tidak Boleh Kosong',
            'tgl_for_set.required' => 'Input Tidak Boleh Kosong',
            'tgl_for_set.date_format' => 'Input Tanggal Harus Dengan Format datetime-local',
            'content.required' => 'Input Tidak Boleh Kosong',
            'content.min' => 'Minimal Inputkan 3 Karakter',
        ]);


        $carbonDate = Carbon::parse($request->tgl_for_set);
        $day = $carbonDate->format('d');
        $month = $carbonDate->format('M');
        $artikel = artikel::where('id', $id)->first();
        if ($request->hasFile('foto')) {
            $detination_path = 'public/artikel';
            $image = $request->file('foto');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs($detination_path, $imageName);
            $filePath = 'artikel/'.$artikel->foto;
            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            $artikel->update([
                'judul' => $request->judul,
                'foto' => $imageName,
                'original_tgl' => $request->tgl_for_set,
                'tgl' => $request->tgl,
                'day' => $day,
                'month' => $month,
                'content' => $request->content
            ]);
        }else{
            $artikel->update([
                'judul' => $request->judul,
                'original_tgl' => $request->tgl_for_set,
                'tgl' => $request->tgl,
                'day' => $day,
                'month' => $month,
                'content' => $request->content
            ]);
        }
        return redirect(route('admin.artikel.index'))->with('sukses', 'Berhasil Ubah Data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artikel = artikel::where('id', $id)->first();
        $filePath = 'artikel/' . $artikel->foto;
        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }
        $artikel->delete();
        return redirect(route('admin.artikel.index'))->with('sukses', 'Berhasil Hapus Data!');
    }
    public function __construct()
    {
        $this->middleware('guest')->except('index', 'create', 'store', 'show', 'edit', 'update', 'destroy');
    }
}
