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
        $data = Disease::query();

        return $dt->eloquent($data)
            ->addIndexColumn()
            ->toJson();
    }

    public function create()
    {
        return view('disease.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        // Database Transaction
        \DB::beginTransaction();

        try {
            $disease = new Disease;

            // directory image
            // $dir = 'images/disease/';
            // if(!file_exists($dir)){
            //     mkdir($dir, 0777, true);
            // }

            // if ($request->hasFile('image')) {
            //     $image     = $request->file('image');
            //     $file_name = Carbon::now()->toDateString().'-'.uniqid().'.'. $image->getClientOriginalExtension();
            //     $image->move($dir, $file_name);
            //     $disease->image = $dir.$file_name;
            // } else {
            //     $disease->image = 'images/disease/disease-default.png';
            // }

            $disease_codes = Disease::pluck('code')->toArray();
            $codes = array_map(function ($value) {
                return (int) substr($value, 1);
            }, $disease_codes);

            $code = max($codes) < 10 ? "P0" . strval(max($codes) + 1) : "P" . strval(max($codes) + 1);

            // Save data
            $disease->code = $code;
            $disease->name = $request->name;
            $disease->description = $request->description;
            $disease->save();

            $redirect = 'disease';
            $status = 'success';
            $message = 'Berhasil Menambahkan Data Penyakit!';
        } catch(\Exception $e) {
            \DB::rollback();
            \Log::error($request->route()->getName()." : ".$e->getMessage());

            $redirect = 'disease/create';
            $status = 'failed';
            $message = 'Gagal Menambahkan Data Penyakit!';
        }

        // End Database Transaction
        \DB::commit();

        return redirect($redirect)->with($status, $message);
    }
}
