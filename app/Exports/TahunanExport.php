<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Report;
use Carbon\CarbonPeriod;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class TahunanExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $month = [];
        $monthNumber = [];
        for ($m=1; $m<=12; $m++) {
             $month[] = date('F', mktime(0,0,0,$m, 1, date('Y')));
             $monthNumber[] = date('m', mktime(0,0,0,$m, 1, date('Y')));
        }
        $datas=[];
        foreach($monthNumber as $mn){
            $bulan = (int)$mn;
            $datas[] = Report::orderBy('created_at')->where('created_at', 'like', $bulan . '%')->get();
        }
        return view('admin.cetak.view.xlsx.tahunan',[
            'datas' => $datas,
            'month' => $month
        ]);
    }
}
