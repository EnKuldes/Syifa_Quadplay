<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToCollection, WithHeadingRow
{

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            User::updateOrCreate([
                'username' => $row['id_prener'],
            ], [
                'name' => $row['name'],
                'divisi' => $row['user_level'],
                'password' => bcrypt('infomedia2020'),
                'leader' => ''
            ]);
        }
    }
}
