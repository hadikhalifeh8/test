<?php

namespace App\Exports;

use App\order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrderExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('Pages.Order.Exports.order_export', [
            'orrder' => order::all()
        ]);
    }
}
