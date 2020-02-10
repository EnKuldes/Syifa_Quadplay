<?php

namespace App\Imports;

use App\_dapros;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DaprosImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            _dapros::create([
                'BRAND' => $row['brand'],
                'ROW_NUM' => $row['row_num'],
                'MSISDN_MASK' => $row['msisdn_mask'],
                'MSISDN' => $row['msisdn'],
                'NAME_MASK' => $row['name_mask'],
                'CUSTOMER_SUBTYPE' => $row['customer_subtype'],
                'TOT_BILL_AMOUNT' => $row['tot_bill_amount'],
                'TOTAL_REVENUE' => $row['total_revenue'],
                'DEVICE_TYPE' => $row['device_type'],
                'VOL_BROADBAND' => $row['vol_broadband'],
                'VOL_BROADBAND_PACKAGE' => $row['vol_broadband_package'],
                'CI' => $row['ci'],
                'KABUPATEN' => $row['kabupaten'],
                'LONGITUDE' => $row['longitude'],
                'LATITUDE' => $row['latitude'],
                'ODP1' => $row['odp1'],
                'ODP2' => $row['odp2'],
                'ODP3' => $row['odp3']
            ]);
        }
    }
}
