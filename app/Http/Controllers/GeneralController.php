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
        $diseases_id = array_unique(
            DiseaseEvidence::pluck('disease_id')->filter(function ($value, $key) {
            return $value != NULL;
        })->toArray());

        $diseases = Disease::select('id', 'name')->whereNotIn('id', $diseases_id)->get();
        $evidences = Evidence::all();

        return view('base.form', compact('diseases', 'evidences'));
    }

    public function store(Request $request)
    {
        $ev_cf = json_decode($request->ev_cf);

        if (empty($ev_cf)) {
            return redirect('base/create')->with('failed', 'Data tidak boleh kosong');
        }

        // Database Transaction
        \DB::beginTransaction();

        try {
            foreach ($ev_cf as $rule) {
                $data = [
                    'disease_id'   => $request->disease_id,
                    'evidence_id'   => $rule->ev_id,
                    'cf_rule'       => $rule->cf_rule
                ];

                DiseaseEvidence::insert($data);
            }

            $response = [
                'url'   => 'base',
                'status'    => 'success',
                'message'   => 'Berhasil Menambahkan Data Basis Pengetahuan!'
            ];
        } catch(\Exception $e) {
            \DB::rollback();
            \Log::error($request->route()->getName()." : ".$e->getMessage());

            $response = [
                'url'   => 'base/create',
                'status'    => 'failed',
                'message'   => 'Gagal Menambahkan Data Basis Pengetahuan!'
            ];
        }

        // End Database Transaction
        \DB::commit();

        return response()->json($response);
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

    public function edit($id)
    {
        $diseases_id = array_unique(
            DiseaseEvidence::pluck('disease_id')->filter(function ($value, $key) {
            return $value != NULL;
        })->toArray());

        $key = array_search((int) $id, $diseases_id);

        unset($diseases_id[$key]);

        $reindex = array_values($diseases_id);
        $base = $id;

        $diseases = Disease::select('id', 'name')->whereNotIn('id', $reindex)->get();

        $di_ev = DiseaseEvidence::where('disease_id', $id)->get();

        $evidences = Evidence::all();

        foreach ($evidences as $evidence) {
            foreach ($di_ev as $ev) {
                if ($evidence->id == $ev->evidence_id) {
                    $evidence["set"] = true;
                } else {
                    $evidence["set"] = false;
                }
            }
        }

        return view('base.form', compact('base', 'diseases', 'evidences', 'di_ev'));
    }

    public function update(Request $request)
    {

    }

}
