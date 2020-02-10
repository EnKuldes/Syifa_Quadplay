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
            'brand',
            'row_number',
            'msisdn_mask',
            'msisdn',
            'name_mask',
            'customer_subtype',
            'kabupaten',
            'odp1',
            'odp2',
            'odp3',
            'am_datetime',
            'fu_datetime',
            'call_information',
            'call_attempts',
            'call_agent',
            'call_consume',
            'tapping_information',
            'tapping_agent_username',
            'tapping_consume',
            'call_status',
            'call_status_detail',
            'call_status_detail_reason',
            'call_agent_name',
            'tapping_status',
            'tapping_agent_name',
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
		->select('da.BRAND as brand' , 'da.ROW_NUM as row_number' , 'da.MSISDN_MASK as msisdn_mask' , 'da.MSISDN as msisdn' , 'da.NAME_MASK as name_mask' , 'da.CUSTOMER_SUBTYPE as customer_subtype' , 'da.KABUPATEN as kabupaten' , 'da.ODP1 as odp1' , 'da.ODP2 as odp2' , 'da.ODP3 as odp3' , 'ds.call_am_datetime as am_datetime' , 'ds.call_fu_datetime as fu_datetime' , 'ds.call_information as call_information' , 'ds.call_attempts as call_attempts' , 'ds.call_agent_username as call_agent' , 'ds.call_consume_datetime as call_consume' , 'ds.tapping_information as tapping_information' , 'ds.tapping_agent_username as tapping_agent_username' , 'ds.tapping_consume_datetime as tapping_consume' , 'cs.value_call_status as call_status' , 'sd.value_call_status_detail as call_status_detail' , 'dr.value_call_status_detail_reason as call_status_detail_reason' , 'ua.name as call_agent_name' , 'ts.value_tapping_status as tapping_status' , 'uq.name as tapping_agent_name')
		->orderBy('ds.created_at', 'asc')
		->whereBetween('ds.created_at', array($this->from_date, $this->to_date))
		->get();
	}
}
