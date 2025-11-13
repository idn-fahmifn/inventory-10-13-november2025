<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Room::all();
        $pic = User::where('is_admin', false)->where('is_active', true)->get();
        return view('room.index', compact('data', 'pic'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('ruangan.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_ruangan' => ['required', 'string', 'min:5', 'max:30'],
            'kode_ruangan' => ['required', 'numeric', 'unique:rooms,room_code'],
            'penanggung_jawab' => ['required', 'integer', Rule::exists('users', 'id')],
            'deskripsi' => ['required']
        ]);

        $simpan = [
            'room_name' => $request->input('nama_ruangan'),
            'room_code' => $request->input('kode_ruangan'),
            'user_id' => $request->input('penanggung_jawab'),
            'desc' => $request->input('deskripsi'),
            'slug' => Str::slug($request->input('nama_ruangan') . '_' . Carbon::now()->format('Ymdhis'))
        ];

        Room::create($simpan);
        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($param)
    {

        return view('room.detail', [
            'data' => Room::where('slug', $param)->firstOrFail(),

            'pic' => User::where('is_admin', false)
                ->where('is_active', true)->get()
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('ruangan.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Room::findOrFail($id);
        $request->validate([
            'nama_ruangan' => ['required', 'string', 'min:5', 'max:30'],
            'kode_ruangan' => ['required', 'numeric'],
            'penanggung_jawab' => ['required', 'integer', Rule::exists('users', 'id')],
            'deskripsi' => ['required']
        ]);

        $simpan = [
            'room_name' => $request->input('nama_ruangan'),
            'room_code' => $request->input('kode_ruangan'),
            'user_id' => $request->input('penanggung_jawab'),
            'desc' => $request->input('deskripsi'),
            'slug' => Str::slug($request->input('nama_ruangan') . '_' . Carbon::now()->format('Ymdhis'))
        ];

        $data->update($simpan);
        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
