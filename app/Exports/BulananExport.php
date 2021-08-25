<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class BulananExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $monthly = [];
        $datas = [];
        $now = Carbon::now();
        $startMonth = $now->startOfMonth()->format('Y-m-d');
        $endMonth = $now->endOfMonth()->format('Y-m-d');
        $periodMonth = CarbonPeriod::create($startMonth, $endMonth);
        foreach ($periodMonth as $pm) {
            $monthly[] = $pm->format('Y-m-d');
        }
        foreach ($monthly as $month) {
            $datas[] = Report::orderBy('created_at')->where('created_at', 'like', $month . '%')->get();
        }
        return view('admin.cetak.view.xlsx.bulanan', [
            'datas' => $datas,
            'monthly' => $monthly,
            'startMonth' => $startMonth,
            'endMonth' => $endMonth,
            'report' => Report::all()
        ]);
    }
}
