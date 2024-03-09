<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Kategori;
use PDF;
use App\Exports\KategoriExport;
use Maatwebsite\Excel\Facades\Excel;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dapatkan seluruh data kategori dengan query builder
        $ar_kategori = DB::table('kategori')->get();
        //arahkan ke data kategori
        return view('kategori.index',compact('ar_kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //mengarahkan ke hal form kategori
        return view('kategori.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //proses validasi data
        $validasi = $request->validate(
        [
            'nama'=>'required|max:50', 
        ],
        //menampilkan pesan kesalahan
        [
            'nama.required'=>'Nama Wajib di Isi',
        ],
        );
        //proses input data, tangkap request dari form kategori
        DB::table('kategori')->insert(
            [
                'nama'=>$request->nama,
            ]
        );
        //landing page
        return redirect('/kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //dapatkan seluruh data kategori dengan query builder
        $ar_kategori = DB::table('kategori')
        ->where('id','=',$id)->get();
        //arahkan ke data kategori
        return view('kategori.show',compact('ar_kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mengarahkan ke halaman form edit kategori
        $data = DB::table('kategori')
                        ->where('id','=',$id)->get();
        return view('kategori.form_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses edit data, tangkap request dari form kategori
        DB::table('kategori')->where('id','=',$id)->update(
            [
                'nama'=>$request->nama,
            ]
        );
        //landing page
        return redirect('/kategori'.'/'.$id);
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

    public function kategoriPDF()
    {
        //Tampilkan seluruh data Kategori
        $ar_kategori = DB::table('kategori')->get();
        $pdf = PDF::loadView('kategori.kategoriPDF',['ar_kategori'=>$ar_kategori]);
        return $pdf->download('dataKategori.pdf');
    }

    public function kategoricsv()
    {
        return Excel::download(new KategoriExport, 'kategori.xlsx');
    }
}
