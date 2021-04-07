<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DiseaseController extends Controller
{
    public function index()
    {
        return view('disease.index');
    }

    public function getData(DataTables $dt)
    {
        $columns = [
            "announcement.id",
            "announcement.title",
            "announcement.content",
            "announcement.status",
            "announcement.type",
            "announcement.push",
        ];

        $data = Disease::select($columns);

        return $dt->eloquent($data)
            ->addIndexColumn()
            ->toJson();
    }
}
