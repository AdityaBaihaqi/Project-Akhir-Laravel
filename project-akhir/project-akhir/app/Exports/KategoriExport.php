<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Kategori;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class KategoriExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Kategori::all();
        $ar_kategori = DB::table('kategori')
        ->select('kategori.nama')->get();
        return $ar_kategori;
    }

    public function headings(): array
    {
        return [
            'Kategori',
        ];
    }
}
