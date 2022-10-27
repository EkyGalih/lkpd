<?php

namespace App\Imports;

use App\Models\Apbd as ModelsApbd;
use App\Models\LaporanRealisasiAnggaran;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class APBD implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            ModelsApbd::create([
                'kode_rekening'         => $row['kode_rekening'],
                'nama_rekening'         => $row['nama_rekening'],
                'uraian'                => $row['uraian'],
                'sub_uraian'            => $row['sub_uraian'],
                'jml_anggaran_sebelum'  => \App\Helper\UserAccess::CurrencyConvert($row['sebelum_perubahan']),
                'jml_anggaran_setelah'  => \App\Helper\UserAccess::CurrencyConvert($row['setelah_perubahan']),
                'selisih_anggaran'      => \App\Helper\UserAccess::CurrencyConvert($row['bertambahberkurang']),
                'persen'                => $row['persen'],
                'user_id'               => Auth::user()->id,
                'tahun_anggaran'        => date('Y')
            ]);

            LaporanRealisasiAnggaran::create([
                'kode_rekening'         => $row['kode_rekening'],
                'anggaran_terealisasi'  => 0,
                'user_id'               => Auth::user()->id
            ]);
        }
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
