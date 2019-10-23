<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // Insert ke Tabel Users
        $dataUsers = array(
        	array(
	            'name' => 'Tes Agent',
	            'username' => '111111',
	            'password' => bcrypt('111111'),
	            'divisi' => 'Agent',
	            'leader' => '',
	        ),array(
	            'name' => 'Tes QCO',
	            'username' => '222222',
	            'password' => bcrypt('222222'),
	            'divisi' => 'QCO',
	            'leader' => '',
	        ),array(
	            'name' => 'Tes Inputter',
	            'username' => '333333',
	            'password' => bcrypt('333333'),
	            'divisi' => 'Inputter',
	            'leader' => '',
	        )
        );
        DB::table('users')->insert($dataUsers);

        // Insert ke Tabel Status Call
        $listStatusCall = array(
        	array(
	        	'id' => 1,
	            'value_call_status' => 'Contacted',
	        ),array(
	        	'id' => 2,
	            'value_call_status' => 'Not Contacted',
	        )
        );
        DB::table('_call_statuses')->insert($listStatusCall);

        // Insert ke Tabel Detail Status Call
        $listDetalStatusCall = array(
        	array(
				'id' => 1,
	            'value_call_status_detail' => 'Agree',
	            'id_call_status' => 1,
	        ),array(
	        	'id' => 2,
	            'value_call_status_detail' => 'Follow Up',
	            'id_call_status' => 1,
	        ),array(
	        	'id' => 3,
	            'value_call_status_detail' => 'Decline',
	            'id_call_status' => 1,
	        ),array(
	        	'id' => 4,
	            'value_call_status_detail' => 'Call Rejected',
	            'id_call_status' => 2,
	        ),array(
	        	'id' => 5,
	            'value_call_status_detail' => 'Fax - Modem',
	            'id_call_status' => 2,
	        ),array(
	        	'id' => 6,
	            'value_call_status_detail' => 'Invalid Phone Number',
	            'id_call_status' => 2,
	        ),array(
	        	'id' => 7,
	            'value_call_status_detail' => 'Line Busy',
	            'id_call_status' => 2,
	        ),array(
	        	'id' => 8,
	            'value_call_status_detail' => 'Mail Box - Memo',
	            'id_call_status' => 2,
	        ),array(
	        	'id' => 9,
	            'value_call_status_detail' => 'Telepon Tulalit',
	            'id_call_status' => 2,
	        ),array(
	        	'id' => 10,
	            'value_call_status_detail' => 'Telepon Tidak Diangkat - RNA',
	            'id_call_status' => 2,
	        )
        );
		DB::table('_call_status_details')->insert($listDetalStatusCall);

        // Insert ke Tabel Reason Detail Status Call
        $listReasonDetailStatusCall = array(
        	array(
				'id' => 1,
	            'value_call_status_detail_reason' => 'Bersedia Berlanggan',
	            'id_call_status_detail' => 1,
	        ),array(
	        	'id' => 2,
	            'value_call_status_detail_reason' => '-',
	            'id_call_status_detail' => 2,
	        ),array(
	        	'id' => 3,
	            'value_call_status_detail_reason' => 'Harga Produk Mahal',
	            'id_call_status_detail' => 3,
	        ),array(
	        	'id' => 4,
	            'value_call_status_detail_reason' => 'Menolak Diawal Pembicaraan',
	            'id_call_status_detail' => 3,
	        ),array(
	        	'id' => 5,
	            'value_call_status_detail_reason' => 'Kecewa Atas Layanan',
	            'id_call_status_detail' => 3,
	        ),array(
	        	'id' => 6,
	            'value_call_status_detail_reason' => 'Melakukan Efisiensi',
	            'id_call_status_detail' => 3,
	        ),array(
	        	'id' => 7,
	            'value_call_status_detail_reason' => 'Sudah Memiliki Provider Lain',
	            'id_call_status_detail' => 3,
	        ),array(
	        	'id' => 8,
	            'value_call_status_detail_reason' => 'Pelanggan Ingin Cabut',
	            'id_call_status_detail' => 3,
	        ),array(
	        	'id' => 9,
	            'value_call_status_detail_reason' => 'Pelanggan Sudah Menggunakna Indihome di PSTN Lain',
	            'id_call_status_detail' => 3,
	        ),array(
	        	'id' => 10,
	            'value_call_status_detail_reason' => '-',
	            'id_call_status_detail' => 4,
	        ),array(
	        	'id' => 11,
	            'value_call_status_detail_reason' => '-',
	            'id_call_status_detail' => 5,
	        ),array(
	        	'id' => 12,
	            'value_call_status_detail_reason' => '-',
	            'id_call_status_detail' => 6,
	        ),array(
	        	'id' => 13,
	            'value_call_status_detail_reason' => '-',
	            'id_call_status_detail' => 7,
	        ),array(
	        	'id' => 14,
	            'value_call_status_detail_reason' => '-',
	            'id_call_status_detail' => 8,
	        ),array(
	        	'id' => 15,
	            'value_call_status_detail_reason' => '-',
	            'id_call_status_detail' => 9,
	        ),array(
	        	'id' => 16,
	            'value_call_status_detail_reason' => '-',
	            'id_call_status_detail' => 10,
	        )
        );
        DB::table('_call_status_detail_reasons')->insert($listReasonDetailStatusCall);

        // Insert ke Tabel Tapping Call
        $listStatusTapping = array(
        	array(
	            'value_tapping_status' => 'Approved',
	        ),array(
	            'value_tapping_status' => 'Return',
	        )
        );
        DB::table('_tapping_statuses')->insert($listStatusTapping);
    }
}
