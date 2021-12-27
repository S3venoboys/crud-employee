<?php

namespace App\Exports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class EmployeeExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('dataemployee-excel', [
            'data' => Pegawai::all()
        ]);
    }
}
