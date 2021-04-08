<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GeneralController extends Controller
{
    public function index()
    {
        return view('base.index');
    }

    public function getData(DataTables $dt)
    {
        $data = Disease::has('evidence_rules')->withCount('evidence_rules');

        return $dt->eloquent($data)
            ->addIndexColumn()
            ->toJson();
    }

}
