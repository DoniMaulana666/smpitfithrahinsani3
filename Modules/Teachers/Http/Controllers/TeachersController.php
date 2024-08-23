<?php

namespace Modules\Teachers\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;
use Modules\Teachers\Models\Teacher;
use Modules\Subjects\Models\Subject;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class TeachersController extends Controller
{
    // TeacherController.php
    public function index()
    {
        $title = "Teacher";
        $data = Teacher::select('teachers.*', 'subjects.name_subjects', 'users.name as user_name')
            ->join('subjects', 'subjects.id', '=', 'teachers.subjects_id')
            ->join('users', 'users.id', '=', 'teachers.teachers_name')
            ->get();
        $subjects = Subject::all();
        $users = User::all();

        return view('teachers::index', compact('title', 'data', 'subjects', 'users'));
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subjects_id' => ['required', 'string', 'max:255'],
            'teachers_name' => ['required', 'string', 'max:255']
        ]);
        // dd($request->all());
        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();
        }
        try {
            $teacher = Teacher::create([
                'subjects_id' => $request->subjects_id,
                'teachers_name' => $request->teachers_name
            ]);
            Alert::success('Pemberitahuan', 'Data <b>' . $teacher->teachers_name . '</b> berhasil dibuat')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $teacher->teachers_name . '</b> gagal dibuat : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }

    public function show(Request $request)
    {
        $teacher = Teacher::find($request->id);
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Data teacher by id',
            'data' => $teacher
        ], Response::HTTP_OK);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subjects_id' => ['required', 'string', 'max:255'],
            'teachers_name' => ['required', 'string', 'max:255']
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();
        }
        try {
            $teacher = Teacher::find($request->id);
            $teacher->update([
                'subjects_id' => $request->subjects_id,
                'teachers_name' => $request->teachers_name
            ]);
            Alert::success('Pemberitahuan', 'Data <b>' . $teacher->teachers_name . '</b> berhasil disimpan')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $teacher->teachers_name . '</b> gagal disimpan : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }

    public function destroy(Request $request)
    {
        try {
            $teacher = Teacher::find($request->id);
            $teacher->delete();
            Alert::success('Pemberitahuan', 'Data <b>' . $teacher->teachers_name . '</b> berhasil dihapus')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $teacher->teachers_name . '</b> gagal dihapus : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }
}
