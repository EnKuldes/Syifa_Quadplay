<?php

namespace App\Exports;

use DB;
// Bikin file berdasarkan Collection. DB::Table->get() hasilnya collection
use Maatwebsite\Excel\Concerns\FromCollection;
// Biar dapat nerima variabel yang di pass kan
use Maatwebsite\Excel\Concerns\Exportable;
// Biar ada Header nya
use Maatwebsite\Excel\Concerns\WithHeadings;

class DaprosExport implements FromCollection, WithHeadings
{
	use Exportable;

	protected $from_date;
	protected $to_date;

	public function __construct($from_date, $to_date)
	{
		$this->from_date = $from_date;
		$this->to_date = $to_date;
	}

	public function headings(): array
    {
        return [
            'msisdn_mask',
            'name_mask',
            'kabupaten',
            'longitude',
            'latitude',
            'odp1',
            'odp2',
            'odp3',
            'call status',
            'detail',
            'reason',
            'k_kontak',
            'cp',
            'atas nama',
            'am_datetime',
            'fu_datetime',
            'regional',
            'witel',
            'paket',
            'alamat pemasangan',
            'email',
            'via by',
            'call info',
            'call attempts',
            'agent call',
            'agent call name',
            'consumed',
            'status tapping',
            'tapping info',
            'agent tapping',
            'agent tapping name',
            'tapping consumed',
        ];
    }

	public function collection()
	{
		return DB::table('_dapros_statistics as ds')
		->join('_dapros as da', 'ds.dapros_id', '=', 'da.id')
		->leftJoin('_call_statuses as cs', 'ds.call_status_id', '=', 'cs.id')
		->leftJoin('_call_status_details as sd', 'ds.call_status_detail_id', '=', 'sd.id')
		->leftJoin('_call_status_detail_reasons as dr', 'ds.call_status_detail_reason_id', '=', 'dr.id')
		->leftJoin('users as ua', 'ds.call_agent_username', '=', 'ua.username')
		->leftJoin('_tapping_statuses as ts', 'ds.tapping_status_id', '=', 'ts.id')
		->leftJoin('users as uq', 'ds.tapping_agent_username', '=', 'uq.username')
        ->leftJoin('_regionals as r', 'r.id', '=', 'ds.call_regional')
        ->leftJoin('_witels as w', 'w.id', '=', 'ds.call_witel')
        ->leftJoin('_pakets as p', 'p.id', '=', 'ds.call_paket')
		->select('da.MSISDN_MASK as msisdn_mask'
            , 'da.NAME_MASK as name_mask'
            , 'da.KABUPATEN as kabupaten'
            , 'da.LONGITUDE as longitude' 
            , 'da.LATITUDE as latitude'
            , 'da.ODP1 as odp1'
            , 'da.ODP2 as odp2'
            , 'da.ODP3 as odp3'
            , 'cs.value_call_status as "call status"'
            , 'sd.value_call_status_detail as detail'
            , 'dr.value_call_status_detail_reason as reason'
            
            , 'ds.call_input_k_kontak as k_kontak'
            , 'ds.call_input_cp_marshanda as cp'
            , 'ds.call_input_an_pemasangan as "atas nama"'

            , 'ds.call_am_datetime as am_datetime'
            , 'ds.call_fu_datetime as fu_datetime'
            
            , 'r.regional_desc as regional'
            , 'w.witel_desc as witel'
            , 'p.paket_desc as paket'
            , 'ds.call_alamat_pemasangan as "alamat pemasangan"'
            , 'ds.call_email as email'
            , 'ds.call_via_by as "via by"'

            , 'ds.call_information as "call info"'
            , 'ds.call_attempts as "call attempts"'
            , 'ds.call_agent_username as "agent call"'
            , 'ua.name as "agent call name"'
            , 'ds.call_consume_datetime as consumed'
            , 'ts.value_tapping_status as "status tapping"'
            , 'ds.tapping_information as "tapping info"'
            , 'ds.tapping_agent_username as agent tapping'
            , 'uq.name as "agent tapping name"'
            , 'ds.tapping_consume_datetime as "tapping consumed"')
		->orderBy('ds.created_at', 'asc')
		//->whereBetween('DATE(ds.created_at)', array($this->from_date, $this->to_date))
        ->whereRaw('DATE(ds.created_at) between ? and ?', array($this->from_date, $this->to_date))
		->get();
	}
}
