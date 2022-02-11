<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::with('user')->orderBy('id','asc')->paginate(10);//select * from transaksis
        $data['transaksi'] = $transaksi;
        return view('transaksi.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['transaksi']=Transaksi::all();
        $data['user']=User::all();
        return view('transaksi.create', $data);
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
            "nomor" => "required",
            "tanggal" => "required",
            "total_harga" => "required",
            "status" => "required",
        ]);
        $transaksi = new transaksi();
        $transaksi->user_id = $request->user_id;
        $transaksi->nomor = $request->nomor;
        $transaksi->tanggal = $request->tanggal;
        $transaksi->total_harga = $request->total_harga;
        $transaksi->status = $request->status;
        $transaksi->save();

        return redirect()->action([TransaksiController::class, 'index']);
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
        $data['transaksi'] = Transaksi::findOrFail($id);
        $data['user'] = User::all();
        return view('transaksi.edit', $data);
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
            "user_id" => "required",
            "nomor" => "required",
            "tanggal" => "required",
            "total_harga" => "required",
            "status" => "required",
        ]);
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->user_id = $request->user_id;
        $transaksi->nomor = $request->nomor;
        $transaksi->tanggal = $request->tanggal;
        $transaksi->total_harga = $request->total_harga;
        $transaksi->status = $request->status;
        $transaksi->update();

        return redirect()->action([TransaksiController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->action([TransaksiController::class, 'index']);
    }
}
