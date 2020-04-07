<?php

namespace App\Http\Controllers;

use App\Subak;
use Illuminate\Http\Request;

class SubakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='Subak';
        $subak=subak::paginate(5);
        return view('admin.subak',compact('title','subak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='Input Subak';
        return view('admin.inputsubak',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
        'required'=> 'Kolom :attribute Harus di isi dengan lengkap',
        'date'    => 'Kolom :attribute Harus Tanggal.',
        'numeric' => 'Kolom :attribute Harus di isi dengan Angka.',
        ];
        $validasi = $request->validate([
            'nama_anggota'=>'required',
            'no_telp'=>'numeric',
            'alamat_anggota'=>'required'
        ],$messages);
        //dd($validasi);
        Subak::create($validasi);
        return redirect('subak')->with('success', 'Data Berhasil di update');
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
        $title='Input Subak';
        $subak=Subak::find($id);
        return view('admin.inputsubak',compact('title','subak'));
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
        $messages = [
            'required'=> 'Kolom :attribute Harus di isi dengan lengkap',
            'date'    => 'Kolom :attribute Harus Tanggal.',
            'numeric' => 'Kolom :attribute Harus di isi dengan Angka.',
            ];
            $validasi = $request->validate([
                'nama_anggota'=>'required',
                'no_telp'=>'numeric',
                'alamat_anggota'=>'required'
            ],$messages);
            //dd($validasi);
            Subak::whereid_subak($id)->update($validasi);
            return redirect('subak')->with('success', 'Data Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subak::whereid_subak($id)->delete();
        return redirect('subak')->with('success', 'Data Berhasil di Hapus');
    }
}
