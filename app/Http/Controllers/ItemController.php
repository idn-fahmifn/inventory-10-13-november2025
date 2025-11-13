<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Item::paginate(10);
        $room = Room::all();
        return view('item.index', compact('data', 'room'));
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
        $request->validate([
            'nama_barang' => ['required', 'string', 'min:5', 'max:30'],
            'kode_barang' => ['required', 'numeric', 'unique:items,item_code'],
            'penyimpanan' => ['required', 'integer', Rule::exists('rooms', 'id')],
            'kondisi' => ['required', 'in:good,broke,maintenance'],
            'harga' => ['required', 'numeric', 'min:1000', 'max:5000000000'],
            'gambar' => ['required', 'mimes:png,jpg,jpeg,webp,heic,svg']
        ]);

        // data yang harus disimpan : sesuaikan dengan database

        $simpan = [
            'item_name' => $request->input('nama_barang'),
            'item_code' => $request->input('kode_barang'),
            'room_id' => $request->input('penyimpanan'),
            'condition' => $request->input('kondisi'),
            'price' => $request->input('harga'),
            'slug' => Str::slug($request->input('nama_barang').Carbon::now()->format('Ymdhis'))
        ];

        // untuk gambar : 
        if($request->hasFile('gambar'))
        {
            $img = $request->file('gambar');
            $path = 'public/images/items';
            $ext = $img->getClientOriginalExtension();
            $nama = 'image_item_'.Carbon::now()->format('Ymdhis').'.'.$ext;
            $simpan['image'] = $nama;
        }

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
