<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Inventaris;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class InventarisExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Inventaris::all();
        $ar_inventaris = DB::table('inventaris')
        ->join('kategori', 'kategori.id', '=', 'inventaris.kategori_id')
        ->select('inventaris.nama_barang', 'kategori.nama AS kategori', 'inventaris.jumlah', 'inventaris.harga', 'inventaris.kondisi')->get(); 
        return $ar_inventaris;
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Kategori',
            'Jumlah',
            'Harga',
            'Kondisi',
        ];
    }
}
