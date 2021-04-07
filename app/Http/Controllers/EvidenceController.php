<?php

namespace App\Http\Controllers;

use App\Models\Evidence;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EvidenceController extends Controller
{
    public function index()
    {
        return view('evidence.index');
    }

    public function getData(DataTables $dt)
    {
        $data = Evidence::query();

        return $dt->eloquent($data)
            ->addIndexColumn()
            ->toJson();
    }
}
