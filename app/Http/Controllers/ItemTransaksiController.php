<?php

namespace App\Http\Controllers;

use App\Models\ItemTransaksi;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class ItemTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item_transaksi = ItemTransaksi::with('transaksi','produk')->orderBy('id','asc')->paginate(10);//select * from transaksis
        $data['item_transaksi'] = $item_transaksi;
        return view('item_transaksi.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['transaksi']=Transaksi::all();
        $data['produk']=Produk::all();
        $data['item_transaksi']=ItemTransaksi::all();
        return view('item_transaksi.create',$data);
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
            "jumlah" => "required",
            "harga" => "required",
            // "total_harga" => "required",
        ]);
        $item_transaksi = new itemtransaksi();
        $item_transaksi->transaksi_id = $request->transaksi_id;
        $item_transaksi->produk_id = $request->produk_id;
        $item_transaksi->jumlah = $request->jumlah;
        $item_transaksi->harga = $request->harga;
        // $item_transaksi->total_harga = $request->total_harga;
        $item_transaksi->total_harga = $request->jumlah * $request->harga;
        $item_transaksi->save();

        return redirect()->action([ItemTransaksiController::class, 'index']);
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
        $data['transaksi']=Transaksi::all();
        $data['produk']=Produk::all();
        $data['item_transaksi'] = ItemTransaksi::findOrFail($id);
        return view('item_transaksi.edit', $data);
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
            "jumlah" => "required",
            "harga" => "required",
            "total_harga" => "required",
        ]);
        $item_transaksi = ItemTransaksi::findOrFail($id);
        $item_transaksi->transaksi_id = $request->transaksi_id;
        $item_transaksi->produk_id = $request->produk_id;
        $item_transaksi->jumlah = $request->jumlah;
        $item_transaksi->harga = $request->harga;
        $item_transaksi->total_harga = $request->total_harga;
        $item_transaksi->update();

        return redirect()->action([ItemTransaksiController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item_transaksi = ItemTransaksi::findOrFail($id);
        $item_transaksi->delete();
        return redirect()->action([ItemTransaksiController::class, 'index']);
    }
}
