<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Gedung;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class GedungExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Gedung::all();
        $ar_gedung = DB::table('gedung')
        ->join('kategori', 'kategori.id', '=', 'gedung.inventaris_kategori_id')
        ->join('inventaris', 'inventaris.id', '=', 'gedung.inventaris_id')
        ->select('gedung.nama','gedung.jumlah', 'kategori.nama AS kategori', 'inventaris.nama_barang AS inventaris')->get(); 
        return $ar_gedung;
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Jumlah',
            'Nama Barang',
            'Kategori',
        ];
    }
}
