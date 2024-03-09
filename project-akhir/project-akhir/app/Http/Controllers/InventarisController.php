<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Inventaris;
use PDF;
use App\Exports\InventarisExport;
use Maatwebsite\Excel\Facades\Excel;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Tampilkan seluruh data Inventaris
        $ar_inventaris = DB::table('inventaris')
        ->join('kategori', 'kategori.id', '=', 'inventaris.kategori_id')
        ->select('inventaris.*', 'kategori.nama AS kategori')->get(); 
        return view('inventaris.index',compact('ar_inventaris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //mengarahkan ke hal form inventaris
        return view('inventaris.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //proses validasi data
        $validasi = $request->validate(
        [
            'nama_barang'=>'required|max:50',
            'kategori'=>'required',  
            'jumlah'=>'required',
            'harga'=>'required',
            'kondisi'=>'required|max:20',
        ],
        //menampilkan pesan kesalahan
        [
            'nama_barang.required'=>'Nama Wajib di Isi',
            'kategori.required'=>'Kategori Wajib di Isi',
            'jumlah.required'=>'Jumlah Wajib di Isi',  
            'harga.required'=>'Harga Wajib di Isi',  
            'kondisi.required'=>'Kondisi Wajib di Isi',
        ],
        );
        //proses input data tangkap request dari form input
        DB::table('inventaris')->insert(
        [
            'nama_barang'=>$request->nama_barang,
            'kategori_id'=>$request->kategori_id,
            'jumlah'=>$request->jumlah,
            'harga'=>$request->harga,
            'kondisi'=>$request->kondisi,
        ]
        );
        //landing page
        return redirect('/inventaris');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //menampilkan detail inventaris
        $ar_inventaris = DB::table('inventaris') //join tabel dengan Query Builder Laravel
        ->join('kategori', 'kategori.id', '=', 'inventaris.kategori_id')
        ->select('inventaris.*', 'kategori.nama AS kategori')
        ->where('inventaris.id','=',$id)->get(); 
        return view('inventaris.show',compact('ar_inventaris'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mengarahkan ke halaman form edit inventaris
        $data = DB::table('inventaris')
                        ->where('id','=',$id)->get();
        return view('inventaris.form_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses edit data, tangkap request dari form inventaris
        DB::table('inventaris')->where('id','=',$id)->update(
            [
                'nama_barang'=>$request->nama_barang,
                'kategori_id'=>$request->kategori_id,
                'jumlah'=>$request->jumlah,
                'harga'=>$request->harga,
                'kondisi'=>$request->kondisi,
            ]
        );
        //landing page
        return redirect('/inventaris'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //menghapus data
        DB::table('inventaris')->where('id',$id)->delete(); 
        return redirect('/inventaris');
    }

    public function inventarisPDF()
    {
        //Tampilkan seluruh data Inventaris
        $ar_inventaris = DB::table('inventaris')
        ->join('kategori', 'kategori.id', '=', 'inventaris.kategori_id')
        ->select('inventaris.*', 'kategori.nama AS kategori')->get(); 
        $pdf = PDF::loadView('inventaris.inventarisPDF',['ar_inventaris'=>$ar_inventaris]);
        return $pdf->download('dataInventaris.pdf');
    }

    public function inventariscsv()
    {
        return Excel::download(new InventarisExport, 'inventaris.xlsx');
    }
}
