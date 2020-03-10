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
	            'name' => 'Tes Agent Quadplay',
	            'username' => '111111',
	            'password' => bcrypt('111111'),
	            'divisi' => 'Offering',
	            'level' => 'Agent',
	            'skill' => 'Quadplay',
	            'leader' => '',
	            'email' => 'email@dummy.com',
	            'handphone' => '08111111111',
	        ),array(
	            'name' => 'Tes Agent Regional',
	            'username' => '111112',
	            'password' => bcrypt('111112'),
	            'divisi' => 'Offering',
	            'level' => 'Agent',
	            'skill' => 'Regional',
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
        	// Skill Quadplay
        	array(
	        	'id' => 1,
	            'value_call_status' => 'Contacted',
	            'id_skill' => 1,
	        ),array(
	        	'id' => 2,
	            'value_call_status' => 'Not Contacted',
	            'id_skill' => 1,
	        )
	        // Skill Regional
	        ,array(
	        	'id' => 3,
	            'value_call_status' => 'Contacted',
	            'id_skill' => 2,
	        ),array(
	        	'id' => 4,
	            'value_call_status' => 'Not Contacted',
	            'id_skill' => 2,
	        ),array(
	        	'id' => 5,
	            'value_call_status' => 'Not Call',
	            'id_skill' => 2,
	        )
        );
        DB::table('_call_statuses')->insert($listStatusCall);

        // Insert ke Tabel Detail Status Call
        $listDetalStatusCall = array(
        	// Skill Quadplay
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
	        // Skill Regional
	        ,array(
	        	'id' => 11,
	            'value_call_status_detail' => 'Agree',
	            'id_call_status' => 3,
	        ),array(
	        	'id' => 12,
	            'value_call_status_detail' => 'Follow Up',
	            'id_call_status' => 3,
	        ),array(
	        	'id' => 13,
	            'value_call_status_detail' => 'Decline',
	            'id_call_status' => 3,
	        ),array(
	        	'id' => 14,
	            'value_call_status_detail' => 'Call Rejected',
	            'id_call_status' => 4,
	        ),array(
	        	'id' => 15,
	            'value_call_status_detail' => 'Fax - Modem',
	            'id_call_status' => 4,
	        ),array(
	        	'id' => 16,
	            'value_call_status_detail' => 'Invalid Phone Number',
	            'id_call_status' => 4,
	        ),array(
	        	'id' => 17,
	            'value_call_status_detail' => 'Line Busy',
	            'id_call_status' => 4,
	        ),array(
	        	'id' => 18,
	            'value_call_status_detail' => 'Mail Box - Memo',
	            'id_call_status' => 4,
	        ),array(
	        	'id' => 19,
	            'value_call_status_detail' => 'Telepon Tidak Diangkat - RNA',
	            'id_call_status' => 4,
	        ),array(
	        	'id' => 20,
	            'value_call_status_detail' => 'Telepon Tulalit',
	            'id_call_status' => 5,
	        ),array(
	        	'id' => 21,
	            'value_call_status_detail' => 'Telepon Isolir',
	            'id_call_status' => 5,
	        ),array(
	        	'id' => 22,
	            'value_call_status_detail' => 'Sudah Agree Ad On Use Tv',
	            'id_call_status' => 5,
	        ),array(
	        	'id' => 23,
	            'value_call_status_detail' => 'Sudah Agree Produk Lain',
	            'id_call_status' => 5,
	        ),array(
	        	'id' => 24,
	            'value_call_status_detail' => 'Sudah Indihome 10Mbps',
	            'id_call_status' => 5,
	        ),array(
	        	'id' => 25,
	            'value_call_status_detail' => 'Pelanggan Divisi Enterprise',
	            'id_call_status' => 5,
	        ),array(
	        	'id' => 26,
	            'value_call_status_detail' => 'Tidak Ada Penawaran',
	            'id_call_status' => 5,
	        ),array(
	        	'id' => 27,
	            'value_call_status_detail' => 'Pelanggan DBS',
	            'id_call_status' => 5,
	        )
        );
		DB::table('_call_status_details')->insert($listDetalStatusCall);

        // Insert ke Tabel Reason Detail Status Call
        $listReasonDetailStatusCall = array(
        	// Skill Quadplay
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
	        // Skill Regional
	        ,array(
	        	'id' => 17,
	            'value_call_status_detail_reason' => 'Bersedia Berlangganan',
	            'id_call_status_detail' => 11,
	        ),array(
	        	'id' => 18,
	            'value_call_status_detail_reason' => 'In Progress',
	            'id_call_status_detail' => 12,
	        ),array(
	        	'id' => 19,
	            'value_call_status_detail_reason' => 'Tidak Bertemu PIC',
	            'id_call_status_detail' => 12,
	        ),array(
	        	'id' => 20,
	            'value_call_status_detail_reason' => 'Layanan dan Produk Tidak Memuaskan',
	            'id_call_status_detail' => 13,
	        ),array(
	        	'id' => 21,
	            'value_call_status_detail_reason' => 'Pelanggan Hendak Cabut Fastel',
	            'id_call_status_detail' => 13,
	        ),array(
	        	'id' => 22,
	            'value_call_status_detail_reason' => 'Pelanggan Melakukan Efisiensi',
	            'id_call_status_detail' => 13,
	        ),array(
	        	'id' => 23,
	            'value_call_status_detail_reason' => 'Produk Tidak Pernah Digunakan',
	            'id_call_status_detail' => 13,
	        ),array(
	        	'id' => 24,
	            'value_call_status_detail_reason' => 'Sudah Menggunakan Provider Lain',
	            'id_call_status_detail' => 13,
	        ),array(
	        	'id' => 25,
	            'value_call_status_detail_reason' => 'Salah Sambung',
	            'id_call_status_detail' => 13,
	        ),array(
	        	'id' => 26,
	            'value_call_status_detail_reason' => 'Sudah Menggunakan Indihome',
	            'id_call_status_detail' => 13,
	        ),array(
	        	'id' => 27,
	            'value_call_status_detail_reason' => 'Tarif Mahal',
	            'id_call_status_detail' => 13,
	        ),array(
	        	'id' => 28,
	            'value_call_status_detail_reason' => 'Reject Up Front',
	            'id_call_status_detail' => 13,
	        ),array(
	        	'id' => 29,
	            'value_call_status_detail_reason' => 'Reject Up Front Lansia',
	            'id_call_status_detail' => 13,
	        ),array(
	        	'id' => 30,
	            'value_call_status_detail_reason' => '-',
	            'id_call_status_detail' => 14,
	        ),array(
	        	'id' => 31,
	            'value_call_status_detail_reason' => '-',
	            'id_call_status_detail' => 15,
	        ),array(
	        	'id' => 32,
	            'value_call_status_detail_reason' => '-',
	            'id_call_status_detail' => 16,
	        ),array(
	        	'id' => 33,
	            'value_call_status_detail_reason' => '-',
	            'id_call_status_detail' => 17,
	        ),array(
	        	'id' => 34,
	            'value_call_status_detail_reason' => '-',
	            'id_call_status_detail' => 18,
	        ),array(
	        	'id' => 35,
	            'value_call_status_detail_reason' => '-',
	            'id_call_status_detail' => 19,
	        ),array(
	        	'id' => 36,
	            'value_call_status_detail_reason' => '-',
	            'id_call_status_detail' => 20,
	        ),array(
	        	'id' => 37,
	            'value_call_status_detail_reason' => '-',
	            'id_call_status_detail' => 21,
	        ),array(
	        	'id' => 38,
	            'value_call_status_detail_reason' => '-',
	            'id_call_status_detail' => 22,
	        ),array(
	        	'id' => 39,
	            'value_call_status_detail_reason' => '-',
	            'id_call_status_detail' => 23,
	        ),array(
	        	'id' => 40,
	            'value_call_status_detail_reason' => '-',
	            'id_call_status_detail' => 24,
	        ),array(
	        	'id' => 41,
	            'value_call_status_detail_reason' => '-',
	            'id_call_status_detail' => 25,
	        ),array(
	        	'id' => 42,
	            'value_call_status_detail_reason' => '-',
	            'id_call_status_detail' => 26,
	        ),array(
	        	'id' => 43,
	            'value_call_status_detail_reason' => '-',
	            'id_call_status_detail' => 27,
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

        // Insert ke Tabel Regional
        $listRegional = array(
        	array(
        		'id' => 1,
	            'regional_desc' => 'REG 1',
	        ),array(
	        	'id' => 2,
	            'regional_desc' => 'REG 2',
	        ),
	        array(
	        	'id' => 3,
	            'regional_desc' => 'REG 3',
	        ),array(
	        	'id' => 4,
	            'regional_desc' => 'REG 4',
	        ),
	        array(
	        	'id' => 5,
	            'regional_desc' => 'REG 5',
	        ),array(
	        	'id' => 6,
	            'regional_desc' => 'REG 6',
	        ),
	        array(
	        	'id' => 7,
	            'regional_desc' => 'REG 7',
	        )
        );
        DB::table('_regionals')->insert($listRegional);

        // Insert ke Tabel Witel
        $listWitel = array(
        	array('id' => '1', 'witel_desc' => 'MEDAN', 'id_regional' => '1'),
        	array('id' => '2', 'witel_desc' => 'RIDAR', 'id_regional' => '1'),
        	array('id' => '3', 'witel_desc' => 'RIKEP', 'id_regional' => '1'),
        	array('id' => '4', 'witel_desc' => 'SUMBAR', 'id_regional' => '1'),
        	array('id' => '5', 'witel_desc' => 'SUMSEL', 'id_regional' => '1'),
        	array('id' => '6', 'witel_desc' => 'SUMUT', 'id_regional' => '1'),
        	array('id' => '7', 'witel_desc' => 'ACEH', 'id_regional' => '1'),
        	array('id' => '8', 'witel_desc' => 'BABEL', 'id_regional' => '1'),
        	array('id' => '9', 'witel_desc' => 'BENGKULU', 'id_regional' => '1'),
        	array('id' => '10', 'witel_desc' => 'JAMBI', 'id_regional' => '1'),
        	array('id' => '11', 'witel_desc' => 'LAMPUNG', 'id_regional' => '1'),
        	array('id' => '12', 'witel_desc' => 'BEKASI', 'id_regional' => '2'),
        	array('id' => '13', 'witel_desc' => 'BOGOR', 'id_regional' => '2'),
        	array('id' => '14', 'witel_desc' => 'JAKBAR', 'id_regional' => '2'),
        	array('id' => '15', 'witel_desc' => 'JAKPUS', 'id_regional' => '2'),
        	array('id' => '16', 'witel_desc' => 'JAKSEL', 'id_regional' => '2'),
        	array('id' => '17', 'witel_desc' => 'JAKTIM', 'id_regional' => '2'),
        	array('id' => '18', 'witel_desc' => 'JAKUT', 'id_regional' => '2'),
        	array('id' => '19', 'witel_desc' => 'TANGERANG', 'id_regional' => '2'),
        	array('id' => '20', 'witel_desc' => 'BANTEN', 'id_regional' => '2'),
        	array('id' => '21', 'witel_desc' => 'BANDUNG', 'id_regional' => '3'),
        	array('id' => '22', 'witel_desc' => 'BANDUNG BARAT', 'id_regional' => '3'),
        	array('id' => '23', 'witel_desc' => 'CIREBON', 'id_regional' => '3'),
        	array('id' => '24', 'witel_desc' => 'KARAWANG', 'id_regional' => '3'),
        	array('id' => '25', 'witel_desc' => 'SUKABUMI', 'id_regional' => '3'),
        	array('id' => '26', 'witel_desc' => 'TASIKMALAYA', 'id_regional' => '3'),
        	array('id' => '27', 'witel_desc' => 'SEMARANG', 'id_regional' => '4'),
        	array('id' => '28', 'witel_desc' => 'YOGYAKARTA', 'id_regional' => '4'),
        	array('id' => '29', 'witel_desc' => 'SOLO', 'id_regional' => '4'),
        	array('id' => '30', 'witel_desc' => 'KUDUS', 'id_regional' => '4'),
        	array('id' => '31', 'witel_desc' => 'MAGELANG', 'id_regional' => '4'),
        	array('id' => '32', 'witel_desc' => 'PEKALONGAN', 'id_regional' => '4'),
        	array('id' => '33', 'witel_desc' => 'PURWOKERTO', 'id_regional' => '4'),
        	array('id' => '34', 'witel_desc' => 'DENPASAR', 'id_regional' => '5'),
        	array('id' => '35', 'witel_desc' => 'SURABAYA SELATAN', 'id_regional' => '5'),
        	array('id' => '36', 'witel_desc' => 'SURABAYA UTARA', 'id_regional' => '5'),
        	array('id' => '37', 'witel_desc' => 'MALANG', 'id_regional' => '5'),
        	array('id' => '38', 'witel_desc' => 'SIDOARJO', 'id_regional' => '5'),
        	array('id' => '39', 'witel_desc' => 'JEMBER', 'id_regional' => '5'),
        	array('id' => '40', 'witel_desc' => 'KEDIRI', 'id_regional' => '5'),
        	array('id' => '41', 'witel_desc' => 'MADIUN', 'id_regional' => '5'),
        	array('id' => '42', 'witel_desc' => 'MADURA', 'id_regional' => '5'),
        	array('id' => '43', 'witel_desc' => 'NTB', 'id_regional' => '5'),
        	array('id' => '44', 'witel_desc' => 'NTT', 'id_regional' => '5'),
        	array('id' => '45', 'witel_desc' => 'PASURUAN', 'id_regional' => '5'),
        	array('id' => '46', 'witel_desc' => 'SINGARAJA', 'id_regional' => '5'),
        	array('id' => '47', 'witel_desc' => 'BALIKPAPAN', 'id_regional' => '6'),
        	array('id' => '48', 'witel_desc' => 'KALBAR', 'id_regional' => '6'),
        	array('id' => '49', 'witel_desc' => 'KALSEL', 'id_regional' => '6'),
        	array('id' => '50', 'witel_desc' => 'SAMARINDA', 'id_regional' => '6'),
        	array('id' => '51', 'witel_desc' => 'KALTARA', 'id_regional' => '6'),
        	array('id' => '52', 'witel_desc' => 'KALTENG', 'id_regional' => '6'),
        	array('id' => '53', 'witel_desc' => 'MAKASAR', 'id_regional' => '7'),
        	array('id' => '54', 'witel_desc' => 'SULUTMALUT', 'id_regional' => '7'),
        	array('id' => '55', 'witel_desc' => 'GORONTALO', 'id_regional' => '7'),
        	array('id' => '56', 'witel_desc' => 'MALUKU', 'id_regional' => '7'),
        	array('id' => '57', 'witel_desc' => 'PAPUA', 'id_regional' => '7'),
        	array('id' => '58', 'witel_desc' => 'PAPUA BARAT', 'id_regional' => '7'),
        	array('id' => '59', 'witel_desc' => 'SULSELBAR', 'id_regional' => '7'),
        	array('id' => '60', 'witel_desc' => 'SULTENG', 'id_regional' => '7'),
        	array('id' => '61', 'witel_desc' => 'SULTRA', 'id_regional' => '7'),
        );
        DB::table('_witels')->insert($listWitel);

        // Insert ke Tabel Paket
        $listPaket = array(
        	array(
        		'id' => 1,
	            'paket_desc' => 'New Entry 300K',
	            'skill' => 'Quadplay',
	        ),
	        array(
        		'id' => 2,
	            'paket_desc' => 'New Entry 380K',
	            'skill' => 'Quadplay',
	        ),
	        array(
        		'id' => 3,
	            'paket_desc' => 'Paket IH Fit Regular 3p Paket Fit - Non Benefit dengan speed 10 Mbps - Rp. 330.000',
	            'skill' => 'Regional',
	        ),
	        array(
        		'id' => 4,
	            'paket_desc' => 'Paket IH Fit Regular 3p Paket Fit - Non Benefit dengan speed 20 Mbps - Rp. 365.000',
	            'skill' => 'Regional',
	        ),
	        array(
        		'id' => 5,
	            'paket_desc' => 'Paket IH Fit Regular 3p Paket Fit - Non Benefit dengan speed 30 Mbps - Rp. 450.000',
	            'skill' => 'Regional',
	        ),
	        array(
        		'id' => 6,
	            'paket_desc' => 'Paket IH Fit Regular 3p Paket Fit - Non Benefit dengan speed 40 Mbps - Rp. 530.000',
	            'skill' => 'Regional',
	        ),
	        array(
        		'id' => 7,
	            'paket_desc' => 'Paket IH Fit Regular 3p Paket Fit - Non Benefit dengan speed 50 Mbps - Rp. 595.000',
	            'skill' => 'Regional',
	        ),
	        array(
        		'id' => 8,
	            'paket_desc' => 'Paket IH Phoenix Regular 2P Paket Phoenix dengan speed 10 Mbps - Rp. 280.000',
	            'skill' => 'Regional',
	        ),
	        array(
        		'id' => 9,
	            'paket_desc' => 'Paket IH Phoenix Regular 2P Paket Phoenix dengan speed 20 Mbps - Rp. 345.000',
	            'skill' => 'Regional',
	        ),
	        array(
        		'id' => 10,
	            'paket_desc' => 'Paket IH Phoenix Regular 2P Paket Phoenix dengan speed 50 Mbps - Rp. 575.000',
	            'skill' => 'Regional',
	        ),
	        array(
        		'id' => 11,
	            'paket_desc' => 'Paket IH Phoenix Regular 2P Paket Phoenix dengan speed 100 Mbps - Rp. 935.000',
	            'skill' => 'Regional',
	        ),
	        array(
        		'id' => 12,
	            'paket_desc' => 'Paket IH Kuota IH Kuota 5 Gb Free Trial 3 Bulan - Harga Normal Rp. 50.000',
	            'skill' => 'Regional',
	        )
        );
        DB::table('_pakets')->insert($listPaket);

        // Insert ke Tabel Skill
        $listSkill = array(
        	array(
        		'id' => 1,
	            'skill_desc' => 'Quadplay',
	        ),
	        array(
        		'id' => 2,
	            'skill_desc' => 'Regional',
	        )
        );
        DB::table('_skills')->insert($listSkill);

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
