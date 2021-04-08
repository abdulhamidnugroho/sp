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

    public function create()
    {
        $diseases_id = array_unique(DiseaseEvidence::pluck('disease_id')->toArray());
        $diseases = Disease::select('id', 'name')->whereNotIn('id', $diseases_id)->get();
        $evidences = Evidence::all();

        return view('base.form', compact('diseases', 'evidences'));
    }

    public function store(Request $request)
    {

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

    public function edit()
    {

    }

    public function update(Request $request)
    {

    }

}
