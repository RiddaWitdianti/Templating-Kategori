<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::with('kategori')->orderBy('id','desc')->paginate(10); //select * from produks
        return view('produk.index',compact('produk'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['kategori'] = Kategori::all();
        $data['produk'] = Produk::all();
        return view('produk.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "kode" => "required|unique:produks,kode|max:100",
            "nama" => "required",
            "photo" => "file",
            "jenis" => "required",
            "stok" => "required",
            "harga" => "required",

        ]);
        $produk = new Produk();
        $produk->kode = $request->kode;
        $produk->nama = $request->nama;
        $produk->photo = $request->photo->getClientOriginalName();
        $request->photo->storeAs('public/image/',$request->photo->getClientOriginalName());
        $produk->kategori_id = $request->kategori_id;
        $produk->deskripsi = $request->deskripsi;
        $produk->jenis = $request->jenis;
        $produk->stok = $request->stok;
        $produk->harga = $request->harga;
        $produk->save();

        //Produk::create(['kode=>request->kode']);

        return redirect()->action([ProdukController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['produk'] = Produk::findOrFail($id);
        $data['kategori'] = Kategori::all();
        return view('produk.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            "kode" => "required",
            "nama" => "required",
            "jenis" => "required",
            "stok" => "required",
            "harga" => "required",

        ]);
        $produk = Produk::findOrFail($id);
        // dd($produk->photo);
        $produk->kode = $request->kode;
        $produk->nama = $request->nama;
        $produk->kategori_id = $request->kategori_id;
        if($request->photo){
            $produk->photo = $request->photo->getClientOriginalName();
            $request->photo->storeAs('public/image/',$request->photo->getClientOriginalName());
        }
        $produk->deskripsi = $request->deskripsi;
        $produk->jenis = $request->jenis;
        $produk->stok = $request->stok;
        $produk->harga = $request->harga;
        $produk->update();

        return redirect()->action([ProdukController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->action([ProdukController::class, 'index']);
    }
}
