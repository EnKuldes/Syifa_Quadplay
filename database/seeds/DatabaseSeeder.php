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
	            'divisi' => 'Offering',
	            'level' => 'Agent',
	            'skill' => 'Quadplay',
	            'leader' => '',
	            'email' => 'email@dummy.com',
	            'handphone' => '08111111111',
	        ),array(
	            'name' => 'Tes QCO',
	            'username' => '222222',
	            'password' => bcrypt('222222'),
	            'divisi' => 'Offering',
	            'level' => 'QCO',
	            'skill' => '',
	            'leader' => '',
	            'email' => 'email@dummy.com',
	            'handphone' => '08111111111',
	        ),array(
	            'name' => 'Tes Inputter',
	            'username' => '333333',
	            'password' => bcrypt('333333'),
	            'divisi' => 'Offering',
	            'level' => 'Inputter',
	            'skill' => '',
	            'leader' => '',
	            'email' => 'email@dummy.com',
	            'handphone' => '08111111111',
	        ),array(
	            'name' => 'Admin',
	            'username' => '021022',
	            'password' => bcrypt('021022'),
	            'divisi' => 'Offering',
	            'level' => 'Admin',
	            'skill' => '',
	            'leader' => '',
	            'email' => 'email@dummy.com',
	            'handphone' => '08111111111',
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

        // Insert ke Dapros
        /*$dataDapros = array(
        	array('BRAND' => '748439', 'ROW_NUM' => '62811320***', 'MSISDN_MASK' => '62811320790', 'MSISDN' => 'YETT*************', 'NAME_MASK' => 'YETTY PUSPITAWATI', 'CUSTOMER_SUBTYPE' => 'kartuHALO', 'TOT_BILL_AMOUNT' => '322630', 'TOTAL_REVENUE' => '185130', 'DEVICE_TYPE' => 'SMARTPHONE', 'VOL_BROADBAND' => '11555488768', 'VOL_BROADBAND_PACKAGE' => '11555488768', 'CI' => '20301', 'KABUPATEN' => 'KOTA SURABAYA', 'LONGITUDE' => '11.269.446', 'LATITUDE' => '-726.407', 'ODP1' => 'ODP-TDS-FBB/20', 'ODP2' => '0', 'ODP3' => 'ODP-TDS-FBB/21'),
			array('BRAND' => '745703', 'ROW_NUM' => '62811356****', 'MSISDN_MASK' => '6,28114E+11', 'MSISDN' => 'ERWI*********', 'NAME_MASK' => 'ERWIN SUTIKNA', 'CUSTOMER_SUBTYPE' => 'kartuHALO', 'TOT_BILL_AMOUNT' => '202031', 'TOTAL_REVENUE' => '40018', 'DEVICE_TYPE' => 'SMARTPHONE', 'VOL_BROADBAND' => '3313975296', 'VOL_BROADBAND_PACKAGE' => '3313975296', 'CI' => '11', 'KABUPATEN' => 'KOTA SURABAYA', 'LONGITUDE' => '11.279.771', 'LATITUDE' => '-733.341', 'ODP1' => 'ODP-RKT-FGB/81', 'ODP2' => '0', 'ODP3' => 'ODP-RKT-FGB/82'),
			array('BRAND' => '740494', 'ROW_NUM' => '62811538****', 'MSISDN_MASK' => '6,28115E+11', 'MSISDN' => 'VEBI************', 'NAME_MASK' => 'VEBIANTI PERMADI', 'CUSTOMER_SUBTYPE' => 'kartuHALO', 'TOT_BILL_AMOUNT' => '288761', 'TOTAL_REVENUE' => '202273', 'DEVICE_TYPE' => 'SMARTPHONE', 'VOL_BROADBAND' => '2361024512', 'VOL_BROADBAND_PACKAGE' => '2361024512', 'CI' => '24', 'KABUPATEN' => 'KOTA SURABAYA', 'LONGITUDE' => '1.127.347', 'LATITUDE' => '-724.534', 'ODP1' => 'ODP-KBL-FCE/168', 'ODP2' => '0', 'ODP3' => 'ODP-KBL-FCE/126'),
			array('BRAND' => '1523249', 'ROW_NUM' => '62811600****', 'MSISDN_MASK' => '6,28116E+11', 'MSISDN' => 'H.  *******************', 'NAME_MASK' => 'H.  YAWAN SUKIAWAN  DRS', 'CUSTOMER_SUBTYPE' => 'kartuHALO', 'TOT_BILL_AMOUNT' => '314865', 'TOTAL_REVENUE' => '76326', 'DEVICE_TYPE' => 'SMARTPHONE', 'VOL_BROADBAND' => '3864966144', 'VOL_BROADBAND_PACKAGE' => '3864966144', 'CI' => '4884', 'KABUPATEN' => 'KOTA MEDAN', 'LONGITUDE' => '98.675.701', 'LATITUDE' => '3.596.151', 'ODP1' => 'ODP-MDC-FAW/032', 'ODP2' => '0', 'ODP3' => '0'),
			array('BRAND' => '1480405', 'ROW_NUM' => '62812111*****', 'MSISDN_MASK' => '6,28121E+12', 'MSISDN' => '', 'NAME_MASK' => '', 'CUSTOMER_SUBTYPE' => 'simPATI', 'TOT_BILL_AMOUNT' => '', 'TOTAL_REVENUE' => '272009', 'DEVICE_TYPE' => 'SMARTPHONE', 'VOL_BROADBAND' => '21423923200', 'VOL_BROADBAND_PACKAGE' => '21422694400', 'CI' => '42141', 'KABUPATEN' => 'KOTA BOGOR', 'LONGITUDE' => '106.782.731', 'LATITUDE' => '-6.556.531', 'ODP1' => 'ODP-SPL-FBH/17', 'ODP2' => 'ODP-SPL-FBH/19', 'ODP3' => 'ODP-SPL-FBH/04'),
			array('BRAND' => '1476229', 'ROW_NUM' => '62812117*****', 'MSISDN_MASK' => '6,28121E+12', 'MSISDN' => '', 'NAME_MASK' => '', 'CUSTOMER_SUBTYPE' => 'simPATI', 'TOT_BILL_AMOUNT' => '', 'TOTAL_REVENUE' => '248904', 'DEVICE_TYPE' => 'SMARTPHONE', 'VOL_BROADBAND' => '4136388608', 'VOL_BROADBAND_PACKAGE' => '4136388608', 'CI' => '45264', 'KABUPATEN' => 'JAKARTA UTARA', 'LONGITUDE' => '1.068.905', 'LATITUDE' => '-614.161', 'ODP1' => 'ODP-STR-FM/13', 'ODP2' => 'ODP-STR-FM/05', 'ODP3' => 'ODP-STR-FM/06'),
			array('BRAND' => '1471245', 'ROW_NUM' => '62812123*****', 'MSISDN_MASK' => '6,28121E+12', 'MSISDN' => '', 'NAME_MASK' => '', 'CUSTOMER_SUBTYPE' => 'simPATI', 'TOT_BILL_AMOUNT' => '', 'TOTAL_REVENUE' => '236887', 'DEVICE_TYPE' => 'SMARTPHONE', 'VOL_BROADBAND' => '5695311872', 'VOL_BROADBAND_PACKAGE' => '5692137472', 'CI' => '17517', 'KABUPATEN' => 'KOTA BEKASI', 'LONGITUDE' => '10.700.105', 'LATITUDE' => '-622.686', 'ODP1' => 'ODP-KRA-FFJ/08', 'ODP2' => 'ODP-KRA-FFJ/11', 'ODP3' => 'ODP-KRA-FFJ/02'),
			array('BRAND' => '634391', 'ROW_NUM' => '62812303*****', 'MSISDN_MASK' => '6,28123E+12', 'MSISDN' => '', 'NAME_MASK' => '', 'CUSTOMER_SUBTYPE' => 'simPATI', 'TOT_BILL_AMOUNT' => '', 'TOTAL_REVENUE' => '290526', 'DEVICE_TYPE' => 'SMARTPHONE', 'VOL_BROADBAND' => '16506591232', 'VOL_BROADBAND_PACKAGE' => '16506570752', 'CI' => '45978', 'KABUPATEN' => 'JAKARTA UTARA', 'LONGITUDE' => '10.679.941', 'LATITUDE' => '-612.312', 'ODP1' => 'ODP-MKR-FBK/201', 'ODP2' => 'ODP-MKR-FBK/228', 'ODP3' => 'ODP-MKR-FBK/281'),
			array('BRAND' => '1416490', 'ROW_NUM' => '62812313*****', 'MSISDN_MASK' => '6,28123E+12', 'MSISDN' => '', 'NAME_MASK' => '', 'CUSTOMER_SUBTYPE' => 'simPATI', 'TOT_BILL_AMOUNT' => '', 'TOTAL_REVENUE' => '487033', 'DEVICE_TYPE' => 'SMARTPHONE', 'VOL_BROADBAND' => '5076163584', 'VOL_BROADBAND_PACKAGE' => '5076081664', 'CI' => '20992', 'KABUPATEN' => 'KOTA SURABAYA', 'LONGITUDE' => '11.268.244', 'LATITUDE' => '-729.485', 'ODP1' => 'ODP-TDS-FNA/26', 'ODP2' => 'ODP-TDS-FNA/27', 'ODP3' => 'ODP-TDS-FNA/31')
        );
        DB::table('_dapros')->insert($dataDapros);*/
    }
}
