<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\DiseaseEvidence;
use App\Models\Evidence;
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

    public function show($id)
    {
        $disease = Disease::findOrFail($id);
        $evidences = DiseaseEvidence::where('disease_id', $id)->with('evidence')->get();

        return response()->json([
            'modal' => view('base.detail', compact('disease', 'evidences'))->toHtml(),
            'disease' => $disease->name
        ]);
    }

}
