<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $simpan = [
            'room_name' => $request->input('nama_ruangan'),
            'room_code' => $request->input('kode_ruangan'),
            'user_id' => $request->input('penanggung_jawab'),
            'desc' => $request->input('deskripsi'),
            'slug' => Str::slug($request->input('nama_ruangan'))
        ];

        Room::create($simpan);
        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
