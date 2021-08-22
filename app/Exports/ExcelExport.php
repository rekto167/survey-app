<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Report;
use Carbon\CarbonPeriod;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class ExcelExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
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
        $dataEmotSatu = [];
        $dataEmotDua = [];
        $dataEmotTiga = [];
        $dataEmotEmpat = [];
        $dataEmotLima = [];
        foreach($datas as $data){
            $dataEmotSatu[] = $data->sum('emot1');
            $dataEmotDua[] = $data->sum('emot2');
            $dataEmotTiga[] = $data->sum('emot3');
            $dataEmotEmpat[] = $data->sum('emot4');
            $dataEmotLima[] = $data->sum('emot5');
        }
        return view('admin.cetak.cetak-mingguan', [
            'reports' => $reports,
            'datas' => $datas,
            'dataEmotSatu' => $dataEmotSatu,
            'dataEmotDua' => $dataEmotDua,
            'dataEmotTiga' => $dataEmotTiga,
            'dataEmotEmpat' => $dataEmotEmpat,
            'dataEmotLima' => $dataEmotLima,
            'days' => $days,
            'periodMingguan' => $periodMingguan,
        ]);
    }
}
