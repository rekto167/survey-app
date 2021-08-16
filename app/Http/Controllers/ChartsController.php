<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Carbon\Carbon;
use Carbon\CarbonPeriod;


class ChartsController extends Controller
{
    public function index(){
        $reports = Report::all();
        $now = Carbon::now();
        $startMonth = $now->startOfWeek()->format('Y-m-d');
        $endMonth = $now->endOfWeek()->format('Y-m-d');
        $periodBulanan = CarbonPeriod::create($startMonth, $endMonth);
        $days = [];
        $datas = [];
        foreach($periodBulanan as $tampilkanHariBulanan){
            $days[] = $tampilkanHariBulanan->format('Y-m-d');
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
        return view('admin.charts', compact('reports', 'datas', 'dataEmotSatu', 'dataEmotDua', 'dataEmotTiga', 'dataEmotEmpat', 'dataEmotLima', 'days', 'periodBulanan'));
    }

    public function bulanan(){
        $weeks=[];
        for($a=1;$a<=now()->daysInMonth;$a++){
            $mingguIni = now()->days($a);
            $weeks[$mingguIni->weekOfMonth][] = $mingguIni->format('Y-m-d');
        }
        $data1=[];
        $data2=[];
        $data3=[];
        $data4=[];
        $data5=[];
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
        foreach($weeks as $week){
            $data5[] =Report::whereBetween('created_at', [current($week), end($week)])->get('emot5')->sum('emot5');
        }
        return view('admin.chart-bulanan', compact('weeks', 'data1', 'data2', 'data3', 'data4', 'data5'));
    }

    public function tahunan(){
        $now = Carbon::now();
        $awalBulan = $now->startOfMonth()->format('Y-m-d');
        $akhirBulan = $now->endOfMonth()->format('Y-m-d');

        $rangeBulan = CarbonPeriod::create($awalBulan, $akhirBulan);

        $tampungHariBulan=[];
        foreach($rangeBulan as $rb){
            $tampungHariBulan[] =$rb->format('Y-m-d');
        }

        $dataBulan=[];
        foreach($tampungHariBulan as $thb){
            $dataBulan[]=Report::orderBy('created_at')->where('created_at', 'like', $thb.'%')->get();
        }
        $dataBulanEmotSatu=[];
        $dataBulanEmotDua=[];
        $dataBulanEmotTiga=[];
        $dataBulanEmotEmpat=[];
        $dataBulanEmotLima=[];
        foreach($dataBulan as $db){
            $dataBulanEmotSatu[]=$db->sum('emot1');
            $dataBulanEmotDua[]=$db->sum('emot2');
            $dataBulanEmotTiga[]=$db->sum('emot3');
            $dataBulanEmotEmpat[]=$db->sum('emot4');
            $dataBulanEmotLima[]=$db->sum('emot5');
        }
        // dd($dataBulanEmotSatu);
        return view('admin.chart-tahunan', compact('tampungHariBulan', 'dataBulanEmotSatu', 'dataBulanEmotDua', 'dataBulanEmotTiga', 'dataBulanEmotEmpat', 'dataBulanEmotLima'));
    }
}
