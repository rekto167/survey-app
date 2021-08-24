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

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getvalue(Request $request)
    {
        $report = Report::create([
            'emot1' => $request->emot1 ?? [0],
            'emot2' => $request->emot2 ?? [0],
            'emot3' => $request->emot3 ?? [0],
            'emot4' => $request->emot4 ?? [0],
        ]);
        return ['message' => 'data sudah masuk'];
    }

    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
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
}
