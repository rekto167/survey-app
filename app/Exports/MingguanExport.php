<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Report;
use Carbon\CarbonPeriod;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class MingguanExport implements FromView
{

    public function view(): View
    {
        $reports = Report::all();
        $now = Carbon::now();
        $weekStartDate = $now->startOfWeek()->format('Y-m-d');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d');
        $periodMingguan = CarbonPeriod::create($weekStartDate, $weekEndDate);
        $days = [];
        $datas = [];
        foreach($periodMingguan as $tampilkanHariMingguan){
            $days[] = $tampilkanHariMingguan->format('Y-m-d');
        }
        foreach($days as $day){
            $datas[] = Report::orderBy('created_at')->where('created_at', 'like', $day . '%')->get();
        }
        return view('admin.cetak.view.xlsx.mingguan',[
            'datas' => $datas,
            'weekStartDate' => $weekStartDate,
            'weekEndDate' => $weekEndDate
        ]);
    }
}
