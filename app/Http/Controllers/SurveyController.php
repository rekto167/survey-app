<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = Survey::all();
        return view('admin.pengaturan', compact('surveys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tambah');
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
        $request->validate([
            'nama_instansi' => 'required',
            'alamat_instansi' => 'required',
            'logo_kiri' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo_kanan' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'emot_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'emot_2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'emot_3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'emot_4' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'emot_5' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner_static' => 'required',
            'running_text' => 'required',
        ]);

        $input = $request->all();
        if($logoKiri = $request->file('logo_kiri'))
        {
            $destPathLogokiri = 'image/';
            $pmLogoKiri = date('YmdHis')."logo_kiri".".". $logoKiri->getClientOriginalExtension();
            $logoKiri->move($destPathLogokiri, $pmLogoKiri);
            $input['logo_kiri'] = "$pmLogoKiri";
        }
        if ($logoKanan = $request->file('logo_kanan'))
        {
            $destPathLogoKanan = 'image/';
            $pmLogoKanan = date('YmdhHis')."logo_kanan".".".$logoKanan->getClientOriginalExtension();
            $logoKanan->move($destPathLogoKanan, $pmLogoKanan);
            $input['logo_kanan'] = "$pmLogoKanan";
        }
        if ($emotsatu = $request->file('emot_1'))
        {
            $destPathEmotSatu = 'image/';
            $pmEmotSatu = date('YmdhHis'). "emot_1".".".$emotsatu->getClientOriginalExtension() ;
            $emotsatu->move($destPathEmotSatu, $pmEmotSatu);
            $input['emot_1'] = "$pmEmotSatu";
        }
        if ($emotdua = $request->file('emot_2'))
        {
            $destPathEmotDua = 'image/';
            $pmEmotDua = date('YmdhHis'). "emot_2".".".$emotdua->getClientOriginalExtension() ;
            $emotdua->move($destPathEmotDua, $pmEmotDua);
            $input['emot_2'] = "$pmEmotDua";
        }
        if ($emottiga = $request->file('emot_3'))
        {
            $destPathEmotTiga = 'image/';
            $pmEmotTiga = date('YmdhHis'). "emot_3".".".$emottiga->getClientOriginalExtension() ;
            $emottiga->move($destPathEmotTiga, $pmEmotTiga);
            $input['emot_3'] = "$pmEmotTiga";
        }
        if ($emotempat = $request->file('emot_4'))
        {
            $destPathEmotEmpat = 'image/';
            $pmEmotEmpat = date('YmdhHis'). "emot_4".".".$emotempat->getClientOriginalExtension() ;
            $emotempat->move($destPathEmotEmpat, $pmEmotEmpat);
            $input['emot_4'] = "$pmEmotEmpat";
        }
        if ($emotlima = $request->file('emot_5'))
        {
            $destPathEmotLima = 'image/';
            $pmEmotLima = date('YmdhHis'). "emot_5".".".$emotlima->getClientOriginalExtension() ;
            $emotlima->move($destPathEmotLima, $pmEmotLima);
            $input['emot_5'] = "$pmEmotLima";
        }
        Survey::create($input);
        return redirect('/pengaturan')->with('success', 'Add Profile Survey Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey)
    {
        //
        return view('admin.ubah', compact('survey'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Survey $survey)
    {
        //
        $request->validate([
            'nama_instansi' => 'required',
            'alamat_instansi' => 'required',
        ]);

        $input = $request->all();
        if($logoKiri = $request->file('logo_kiri'))
        {
            $destPathLogokiri = 'image/';
            $pmLogoKiri = date('YmdHis')."logo_kiri".".".$logoKiri->getClientOriginalExtension();
            $logoKiri->move($destPathLogokiri, $pmLogoKiri);
            $input['logo_kiri'] = "$pmLogoKiri";
        } else
        {
            unset($input['logo_kiri']);
        }
        if ($logoKanan = $request->file('logo_kanan'))
        {
            $destPathLogoKanan = 'image/';
            $pmLogoKanan = date('YmdhHis')."logo_kanan".".".$logoKanan->getClientOriginalExtension();
            $logoKanan->move($destPathLogoKanan, $pmLogoKanan);
            $input['logo_kanan'] = "$pmLogoKanan";
        } else
        {
            unset($input['logo_kanan']);
        }
        if ($emotsatu = $request->file('emot_1'))
        {
            $destPathEmotSatu = 'image/';
            $pmEmotSatu = date('YmdhHis')."emot_1".".".$emotsatu->getClientOriginalExtension();
            $emotsatu->move($destPathEmotSatu, $pmEmotSatu);
            $input['emot_1'] = "$pmEmotSatu";
        } else
        {
            unset($input['emot_1']);
        }
        if ($emotdua = $request->file('emot_2'))
        {
            $destPathEmotDua = 'image/';
            $pmEmotDua = date('YmdhHis')."emot_2".".".$emotdua->getClientOriginalExtension();
            $emotdua->move($destPathEmotDua, $pmEmotDua);
            $input['emot_2'] = "$pmEmotDua";
        } else
        {
            unset($input['emot_2']);
        }
        if ($emottiga = $request->file('emot_3'))
        {
            $destPathEmotTiga = 'image/';
            $pmEmotTiga = date('YmdhHis')."emot_3".".".$emottiga->getClientOriginalExtension();
            $emottiga->move($destPathEmotTiga, $pmEmotTiga);
            $input['emot_3'] = "$pmEmotTiga";
        } else
        {
            unset($input['emot_3']);
        }
        if ($emotempat = $request->file('emot_4'))
        {
            $destPathEmotEmpat = 'image/';
            $pmEmotEmpat = date('YmdhHis')."emot_4".".".$emotempat->getClientOriginalExtension();
            $emotempat->move($destPathEmotEmpat, $pmEmotEmpat);
            $input['emot_4'] = "$pmEmotEmpat";
        } else
        {
            unset($input['emot_4']);
        }
        if ($emotlima = $request->file('emot_5'))
        {
            $destPathEmotLima = 'image/';
            $pmEmotLima = date('YmdhHis')."emot_5".".".$emotlima->getClientOriginalExtension();
            $emotlima->move($destPathEmotLima, $pmEmotLima);
            $input['emot_5'] = "$pmEmotLima";
        } else
        {
            unset($input['emot_5']);
        }

        $survey->update($input);

        return redirect('/pengaturan')->with('success', 'Survey updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey)
    {
        //
    }
}
