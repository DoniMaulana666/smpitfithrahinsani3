<?php

namespace Modules\Subjects\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;
use Modules\Subjects\Models\Subject;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class SubjectsController extends Controller
{
    public function index()
    {
        $x['title'] = "Subject";
        $x['data'] = Subject::get();

        return view('subjects::index', $x);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_subjects' => ['required', 'string', 'max:255']
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();
        }
        try {
            $subject = Subject::create([
                'name_subjects' => $request->name_subjects
            ]);
            Alert::success('Pemberitahuan', 'Data <b>' . $subject->name_subjects . '</b> berhasil dibuat')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $subject->name_subjects . '</b> gagal dibuat : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }

    public function show(Request $request)
    {
        $subject = Subject::find($request->id);
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Data subject by id',
            'data' => $subject
        ], Response::HTTP_OK);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_subjects' => ['required', 'string', 'max:255']
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();
        }
        try {
            $subject = Subject::find($request->id);
            $subject->update([
                'name_subjects' => $request->name_subjects
            ]);
            Alert::success('Pemberitahuan', 'Data <b>' . $subject->name_subjects . '</b> berhasil disimpan')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $subject->name_subjects . '</b> gagal disimpan : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }

    public function destroy(Request $request)
    {
        try {
            $subject = Subject::find($request->id);
            $subject->delete();
            Alert::success('Pemberitahuan', 'Data <b>' . $subject->name_subjects . '</b> berhasil dihapus')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $subject->name_subjects . '</b> gagal dihapus : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }
}
