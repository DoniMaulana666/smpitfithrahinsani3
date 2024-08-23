<?php

namespace Modules\Grades\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;
use Modules\Grades\Models\Grade;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class GradesController extends Controller
{
    public function index()
    {
        $x['title']     = "Grade";
        $x['data']      = Grade::get();

        return view('grades::index', $x);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => ['required', 'string', 'max:255']
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();
        }
        try {
            $grade = Grade::create([
                'name'      => $request->name
            ]);
            Alert::success('Pemberitahuan', 'Data <b>' . $grade->name . '</b> berhasil dibuat')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $grade->name . '</b> gagal dibuat : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }

    public function show(Request $request)
    {
        $grade = Grade::find($request->id);
        return response()->json([
            'status'    => Response::HTTP_OK,
            'message'   => 'Data grade by id',
            'data'      => $grade
        ], Response::HTTP_OK);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => ['required', 'string', 'max:255']
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();
        }
        try {
            $grade = Grade::find($request->id);
            $grade->update([
                'name'  => $request->name
            ]);
            Alert::success('Pemberitahuan', 'Data <b>' . $grade->name . '</b> berhasil disimpan')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $grade->name . '</b> gagal disimpan : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }

    public function destroy(Request $request)
    {
        try {
            $grade = Grade::find($request->id);
            $grade->delete();
            Alert::success('Pemberitahuan', 'Data <b>' . $grade->name . '</b> berhasil dihapus')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $grade->name . '</b> gagal dihapus : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }
}
