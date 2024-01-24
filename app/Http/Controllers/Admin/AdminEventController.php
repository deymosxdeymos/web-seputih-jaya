<?php

namespace App\Http\Controllers\Admin;


use App\Models\event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class AdminEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.event.index',[
            'event' => DB::table('event')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->foto);
        $validator = $request->validate([
            'nama_event' => 'required|min:3|max:255',
            'foto' => 'required|mimes:jpg,png,jpeg|max:5120',
            'tgl_for_set' => 'required|date_format:Y-m-d\TH:i',
            'tgl' => 'required',
        ],[
            'nama_event.required' => 'Input Tidak Boleh Kosong',
            'nama_event.min' => 'Minimal Inputkan 3 Karakter',
            'nama_event.max' => 'Maksimal Inputkan 225 Karakter',
            'foto.required' => 'Input Tidak Boleh Kosong',
            'foto.max' => 'Input Hanya Menampung File  Maksimal 5mb',
            'foto.mimes' => 'Input Hanya Menerima File Dengan Extensi jpg,png,jpeg',
            'tgl.required' => 'Input Tidak Boleh Kosong',
            'tgl_for_set.required' => 'Input Tidak Boleh Kosong',
            'tgl_for_set.date_format' => 'Input Tanggal Harus Dengan Format datetime-local',
        ]);


        if ($request->hasFile('foto')) {
            $detination_path = 'public/event';
            $image = $request->file('foto');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs($detination_path, $imageName);
        }
            event::create([
                'nama_event' => $request->nama_event,
                'foto' => $imageName,
                'original_tgl' => $request->tgl_for_set,
                'tgl' => $request->tgl,
            ]);

        return redirect(route('admin.event.index'))->with('sukses', 'Berhasil Tambah Data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = event::where('id', $id)->first();
        return view('admin.event.read', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = event::where('id', $id)->first();
        return view('admin.event.update', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            'nama_event' => 'required|min:3|max:255',
            'foto' => 'mimes:jpg,png,jpeg|max:5120',
            'tgl_for_set' => 'required|date_format:Y-m-d\TH:i',
            'tgl' => 'required',
        ],[
            'nama_event.required' => 'Input Tidak Boleh Kosong',
            'nama_event.min' => 'Minimal Inputkan 3 Karakter',
            'nama_event.max' => 'Maksimal Inputkan 225 Karakter',
            'foto.max' => 'Input Hanya Menampung File  Maksimal 5mb',
            'foto.mimes' => 'Input Hanya Menerima File Dengan Extensi jpg,png,jpeg',
            'tgl.required' => 'Input Tidak Boleh Kosong',
            'tgl_for_set.required' => 'Input Tidak Boleh Kosong',
            'tgl_for_set.date_format' => 'Input Tanggal Harus Dengan Format datetime-local',
        ]);


        $event = event::where('id', $id)->first();
        if ($request->hasFile('foto')) {
            $detination_path = 'public/event';
            $image = $request->file('foto');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs($detination_path, $imageName);
            $filePath = 'event/'.$event->foto;
            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            $event->update([
                'nama_event' => $request->nama_event,
                'foto' => $imageName,
                'original_tgl' => $request->tgl_for_set,
                'tgl' => $request->tgl,
            ]);
        }else{
            $event->update([
                'nama_event' => $request->nama_event,
                'original_tgl' => $request->tgl_for_set,
                'tgl' => $request->tgl,
            ]);
        }
        return redirect(route('admin.event.index'))->with('sukses', 'Berhasil Ubah Data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = event::where('id', $id)->first();
        $filePath = 'event/' . $event->foto;
        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }
        $event->delete();
        return redirect(route('admin.event.index'))->with('sukses', 'Berhasil Hapus Data!');
    }
    public function __construct()
    {
        $this->middleware('guest')->except('index', 'create', 'store', 'show', 'edit', 'update', 'destroy');
    }
}
