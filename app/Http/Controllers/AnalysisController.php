<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\DiseaseEvidence;
use App\Models\Evidence;
use App\Models\Solution;
use Illuminate\Http\Request;

class AnalysisController extends Controller
{
    public function index()
    {
        $evidences  = Evidence::all();
        $user_rule  = [
            "Tidak Tahu" => 0,
            "Ada Kemungkinan" => 0.2,
            "Mungkin" => 0.4,
            "Kemungkinan Besar" => 0.6,
            "Hampir Pasti" => 0.8,
            "Pasti" => 1
        ];

        return view('analysis.index', compact('evidences', 'user_rule'));
    }

    public function analysis(Request $request)
    {
        // dd($request->evidences);
        $evidences = [];

        foreach ($request->evidences as $key => $evidence) {
            $temp = [];

            $id = $key < 9 ? (int) substr($evidence, 0, 1) : (int) substr($evidence, 0, 2);
            $user_rule = $key < 9 ? floatval(substr($evidence, 2)) : floatval(substr($evidence, 3));

            if ($user_rule != 0.0) {
                $temp["id"] = $id;
                $temp["user_rule"] = $user_rule;

                $evidences[] = $temp;
            }
        }

        $evidence_ids = array_map(function ($value){
            return $value["id"];
        }, $evidences);


        $disease_evidence = DiseaseEvidence::whereIn('evidence_id', $evidence_ids)->pluck('disease_id')->toArray();
        $disease_ids = array_unique($disease_evidence);

        $results = [];

        // Penyakit yang termasuk gejala nya dimasukkan oleh user
        foreach ($disease_ids as $disease) {
            $res_temp = [];
            $evidence_analysis = DiseaseEvidence::where('disease_id', $disease)->get();
            $cf = [];

            foreach ($evidence_analysis as $value) {
                foreach ($evidences as $user) {
                    if ($value->evidence_id == $user["id"]) {
                        $cf[] = $value->cf_rule * $user["user_rule"];
                    }
                }
            }

            // CF.combine(CF1,CF2)     = CF1 + CF2* (1 - CF1)
            // Final = CF.combine * 100 (%)

            $res_temp["disease"] = Disease::where('id', $disease)
                ->with(['solutions' => function ($query) {
                    $query->select('id', 'solution');
                }])
                ->first();

            if (count($cf) > 2) {

                // CF(A) = CF(1) + CF(2) * [ 1 – CF(1) ] = 0.16 + 0.24 * (1 – 0.16) = 0.3616
                // CF(B) = CF(3) + CF(A) * [ 1 – CF(3) ] = 0.32 + 0.3616 * (1 – 0.32) = 0.565888

                $cf_old = 0;

                for ($i = 0; $i < count($cf) - 1; $i++) {
                    if ($cf_old == 0) {
                        $cf_old = $cf[$i] + ($cf[$i + 1] * (1 - $cf[0]));
                    } else {
                        $cf_old = $cf[$i + 1] + ($cf_old * (1 - $cf[$i + 1]));
                    }
                }
                $res_temp["percentage"] = intval($cf_old * 100);

            } elseif (count($cf) == 2) {
                $res_temp["percentage"] = intval($cf[0] + ($cf[1] * (1 - $cf[0])) * 100);
            } elseif (count($cf) == 1) {
                $res_temp["percentage"] = intval($cf[0] * 100);
            }
            $res_temp["solutions"] = Solution::where('disease_id', $disease)->get();
            $results[] = $res_temp;
        }

        return response()->json([
            'modal' => view('analysis.result', compact('results'))->toHtml(),
        ]);
    }
}
