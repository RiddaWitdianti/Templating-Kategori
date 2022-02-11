<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::with('transaksi')->orderBy('id','asc')->paginate(10);//select * from transaksis
        $data['pembayaran'] = $pembayaran;
        return view('pembayaran.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['transaksi']=Transaksi::all();
        $data['pembayaran']=Pembayaran::all();
        return view('pembayaran.create',$data);
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
            "jumlah_bayar" => "required",
            "metode_bayar" => "required",
        ]);
        $pembayaran = new pembayaran();
        $pembayaran->transaksi_id = $request->transaksi_id;
        $pembayaran->jumlah_bayar = $request->jumlah_bayar;
        $pembayaran->metode_bayar = $request->metode_bayar;
        $pembayaran->save();

        return redirect()->action([PembayaranController::class, 'index']);
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
        $data['pembayaran'] = Pembayaran::findOrFail($id);
        return view('pembayaran.edit', $data);
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
            "jumlah_bayar" => "required",
            "metode_bayar" => "required",
        ]);
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->transaksi_id = $request->transaksi_id;
        $pembayaran->jumlah_bayar = $request->jumlah_bayar;
        $pembayaran->metode_bayar = $request->metode_bayar;
        $pembayaran->update();

        return redirect()->action([PembayaranController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembayaran= Pembayaran::findOrFail($id);
        $pembayaran->delete();
        return redirect()->action([PembayaranController::class, 'index']);
    }
}
