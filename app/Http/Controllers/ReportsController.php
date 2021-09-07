<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Report;
use Carbon\CarbonPeriod;
use App\Exports\ExcelExport;
use Illuminate\Http\Request;
use App\Exports\BulananExport;
use App\Exports\TahunanExport;
use App\Exports\MingguanExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class ReportsController extends Controller
{
    public function getvalue(Request $request)
    {
        $report = Report::create([
            'emot1' => $request->emot1 ?? [0],
            'emot2' => $request->emot2 ?? [0],
            'emot3' => $request->emot3 ?? [0],
            'emot4' => $request->emot4 ?? [0],
        ]);
        echo $request->emot1;
        return ['message' => 'data sudah masuk'];
    }
    public function mingguanindex(Report $report){
        return view('admin.cetak.cetak-mingguan');
    }
    public function bulananindex(Report $report){
        return view('admin.cetak.cetak-bulanan');
    }
    public function tahunanindex(Report $report){
        return view('admin.cetak.cetak-tahunan');
    }
    /*
    ========EXPORT XLSX FORMAT============
    =======1. MINGGUAN====================
    =======2. BULANAN=====================
    =======3. TAHUNAN====================
    */
    // Export XLSX Mingguan
    public function cetakmingguanxlsx(Request $request){
        $now = Carbon::now()->format('d-m-Y');
        return Excel::download(new MingguanExport, "$now-mingguan.xlsx");
    }
    // Export XLSX Bulanan
    public function cetakbulananxlsx(Request $request){
        $now = Carbon::now()->format('d-m-Y');
        return Excel::download(new BulananExport, "$now-bulanan.xlsx");
    }
    // Export XLSX Tahunan
    public function cetaktahunanxlsx(Request $request){
        $now = Carbon::now()->format('d-m-Y');
        return Excel::download(new TahunanExport, "$now-tahunan.xlsx");
    }

    /*
    ========EXPORT PDF FORMAT============
    =======1. MINGGUAN====================
    =======2. BULANAN=====================
    =======3. TAHUNAN====================
    */
    // Export PDF Mingguan
    public function cetakmingguanpdf(){
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
        foreach($datas as $data){
            $dataEmotSatu[] = $data->sum('emot1');
            $dataEmotDua[] = $data->sum('emot2');
            $dataEmotTiga[] = $data->sum('emot3');
            $dataEmotEmpat[] = $data->sum('emot4');
        }
        return view('admin.cetak.view.pdf.mingguan', compact('datas', 'weekStartDate','weekEndDate','dataEmotSatu','dataEmotDua','dataEmotTiga','dataEmotEmpat', 'days'));
    }

    public function cetakbulananpdf(Request $request)
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
        $weeks=[];
        for($a=1;$a<=now()->daysInMonth;$a++){
            $mingguIni = now()->days($a);
            $weeks[$mingguIni->weekOfMonth][] = $mingguIni->format('Y-m-d');
        }
        $data1=[];
        $data2=[];
        $data3=[];
        $data4=[];
        foreach($weeks as $week){
            $data1[] =Report::whereBetween('created_at', [current($week), end($week)])->get('emot1')->sum('emot1');
        }
        foreach($weeks as $week){
            $data2[] =Report::whereBetween('created_at', [current($week), end($week)])->get('emot2')->sum('emot2');
        }
        foreach($weeks as $week){
            $data3[] =Report::whereBetween('created_at', [current($week), end($week)])->get('emot3')->sum('emot3');
        }
        foreach($weeks as $week){
            $data4[] =Report::whereBetween('created_at', [current($week), end($week)])->get('emot4')->sum('emot4');
        }
        foreach ($monthly as $month) {
            $datas[] = Report::orderBy('created_at')->where('created_at', 'like', $month . '%')->get();
        }
        return view('admin.cetak.view.pdf.bulanan', compact('datas','startMonth','endMonth','data1','data2','data3','data4', 'weeks'));
    }

    public function cetaktahunanpdf(Request $request)
    {
        $month = [];
        $monthNumber = [];
        for ($m=1; $m<=12; $m++) {
             $month[] = date('F', mktime(0,0,0,$m, 1, date('Y')));
             $monthNumber[] = date('m', mktime(0,0,0,$m, 1, date('Y')));
        }
        $datas=[];
        $dataMonthem1 = [];
        $dataMonthem2 = [];
        $dataMonthem3 = [];
        $dataMonthem4 = [];
        foreach($monthNumber as $mn){
            $bulan = (int)$mn;
            $datas[] = Report::orderBy('created_at')->where('created_at', 'like', $bulan . '%')->get();
            $dataMonthem1[]=Report::whereYear('created_at', 'like', now()->year)
                                ->whereMonth('created_at', '=', $bulan)->get('emot1')->sum('emot1');
            $dataMonthem2[]=Report::whereYear('created_at', 'like', now()->year)
            ->whereMonth('created_at', '=', $bulan)->get('emot2')->sum('emot2');
            $dataMonthem3[]=Report::whereYear('created_at', 'like', now()->year)
            ->whereMonth('created_at', '=', $bulan)->get('emot3')->sum('emot3');
            $dataMonthem4[]=Report::whereYear('created_at', 'like', now()->year)
            ->whereMonth('created_at', '=', $bulan)->get('emot4')->sum('emot4');
        }

        return view('admin.cetak.view.pdf.tahunan', compact('datas', 'month', 'dataMonthem1','dataMonthem2','dataMonthem3','dataMonthem4'));
    }
}
