<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Gedung;
use PDF;
use App\Exports\GedungExport;
use Maatwebsite\Excel\Facades\Excel;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Tampilkan seluruh data Gedung
        $ar_gedung = DB::table('gedung')
        ->join('kategori', 'kategori.id', '=', 'gedung.inventaris_kategori_id')
        ->join('inventaris', 'inventaris.id', '=', 'gedung.inventaris_id')
        ->select('gedung.*', 'kategori.nama AS kategori', 'inventaris.nama_barang AS inventaris')->get(); 
        return view('gedung.index',compact('ar_gedung'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //mengarahkan ke hal form gedung
        return view('gedung.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //proses validasi data
        $validasi = $request->validate(
            [
                'nama'=>'required|max:45',  
                'jumlah'=>'required|max:45',
                'inventaris'=>'required',
                'kategori'=>'required',
            ],
            //menampilkan pesan kesalahan
            [
                'nama.required'=>'Nama Wajib di Isi',  
                'jumlah.required'=>'Jumlah Wajib di Isi',  
                'inventaris.required'=>'Nama Barang Wajib di Isi',
                'kategori.required'=>'Kategori Wajib di Isi',  
            ],
            );
            //proses input data tangkap request dari form input
            DB::table('gedung')->insert(
            [
                'nama'=>$request->nama,
                'jumlah'=>$request->jumlah,
                'inventaris_id'=>$request->inventaris,
                'inventaris_kategori_id'=>$request->kategori,
            ]
            );
            //landing page
            return redirect('/gedung');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //menampilkan detail gedung
        $ar_gedung = DB::table('gedung') //join tabel dengan Query Builder Laravel
        ->join('kategori', 'kategori.id', '=', 'gedung.inventaris_kategori_id')
        ->join('inventaris', 'inventaris.id', '=', 'gedung.inventaris_id')
        ->select('gedung.*', 'kategori.nama AS kategori', 'inventaris.nama_barang AS inventaris')
        ->where('gedung.id','=',$id)->get(); 
        return view('gedung.show',compact('ar_gedung'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mengarahkan ke halaman form edit gedung
        $data = DB::table('gedung')
                        ->where('id','=',$id)->get();
        return view('gedung.form_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses edit data, tangkap request dari form gedung
        DB::table('gedung')->where('id','=',$id)->update(
            [
                'nama'=>$request->nama,
                'jumlah'=>$request->jumlah,
                'inventaris_id'=>$request->inventaris,
                'inventaris_kategori_id'=>$request->kategori,
            ]
        );
        //landing page
        return redirect('/gedung'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //menghapus data
        DB::table('kategori')->where('id',$id)->delete(); 
        return redirect('/kategori');
    }

    public function gedungPDF()
    {
        //Tampilkan seluruh data Gedung
        $ar_gedung = DB::table('gedung')
        ->join('kategori', 'kategori.id', '=', 'gedung.inventaris_kategori_id')
        ->join('inventaris', 'inventaris.id', '=', 'gedung.inventaris_id')
        ->select('gedung.*', 'kategori.nama AS kategori', 'inventaris.nama_barang AS inventaris')->get();
        $pdf = PDF::loadView('gedung.gedungPDF',['ar_gedung'=>$ar_gedung]);
        return $pdf->download('dataGedung.pdf');
    }

    public function gedungcsv()
    {
        return Excel::download(new GedungExport, 'gedung.xlsx');
    }
}
