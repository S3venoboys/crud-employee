<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Exports\EmployeeExport;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DB::table('employee')
            ->join('company', 'employee.company_id', '=', 'company.id')
            ->select('employee.*', 'company.nama as name')
            ->get();

        $data = Pegawai::all();

        return view('index', compact(
            'datas', 'data'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Pegawai;
        return view('create', compact(
            'model'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Pegawai;
        $model->nama = $request->nama;
        $model->atasan_id = $request->atasan_id;
        $model->company_id = $request->company_id;
        $model->save();

        return redirect('pegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Pegawai::find($id);
        return view('edit', compact(
            'model'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Pegawai::find($id);
        $model->nama = $request->nama;
        $model->atasan_id = $request->atasan_id;
        $model->company_id = $request->company_id;
        $model->save();

        return redirect('pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Pegawai::find($id);
        $model->delete();
        return redirect('pegawai');
    }

    public function exportpdf()
    {
        $data = Pegawai::all();
        view()->share('data', $data);
        $pdf = PDF::loadView('dataemployee-pdf');
        return $pdf->download('dataemployee.pdf');
    }

    public function exportexcel() 
    {
        return Excel::download(new EmployeeExport, 'dataemployee.xlsx');
    }
}
