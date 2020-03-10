<?php

namespace App\Imports;

use App\_dapros_regional;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DaprosRegionalImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            _dapros_regional::create([
                'pots' => $row['pots'],
                'witel' => $row['witel'],
                'nama_customer' => $row['nama_customer'],
                'klasifikasi_revenue' => $row['klasifikasi_revenue'],
                'prioritas_1' => $row['prioritas_1'],
                'prioritas_2' => $row['prioritas_2'],
                'prioritas_3' => $row['prioritas_3']
            ]);
        }
    }
}
