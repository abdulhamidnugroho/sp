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

    public function create()
    {
        return view('evidence.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        // Database Transaction
        \DB::beginTransaction();

        try {
            $disease = new Evidence;

            $disease->name = $request->name;
            $disease->save();

            $redirect = 'evidence';
            $status = 'success';
            $message = 'Berhasil Menambahkan Data Gejala!';
        } catch(\Exception $e) {
            \DB::rollback();
            \Log::error($request->route()->getName()." : ".$e->getMessage());

            $redirect = 'evidence/create';
            $status = 'failed';
            $message = 'Gagal Menambahkan Data Gejala!';
        }

        // End Database Transaction
        \DB::commit();

        return redirect($redirect)->with($status, $message);
    }
}
