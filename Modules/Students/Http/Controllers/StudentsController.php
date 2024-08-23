<?php

namespace Modules\Students\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;
use Modules\Students\Models\Student;
use Modules\Grades\Models\Grade;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class StudentsController extends Controller
{
    public function index()
    {
        $x['title'] = "Student";
        $x['data'] = Student::join('grades', 'grades.id', '=', 'students.grades_id')->get();
        $x['grades'] = Grade::get();

        return view('students::index', $x);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'grades_id' => ['required', 'string', 'max:255'],
            'student_name' => ['required', 'string', 'max:255']
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();
        }
        try {
            $student = Student::create([
                'grades_id' => $request->grades_id,
                'student_name' => $request->student_name
            ]);
            Alert::success('Pemberitahuan', 'Data <b>' . $student->student_name . '</b> berhasil dibuat')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $student->student_name . '</b> gagal dibuat : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }

    public function show(Request $request)
    {
        $student = Student::find($request->id);
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Data student by id',
            'data' => $student
        ], Response::HTTP_OK);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'grades_id' => ['required', 'string', 'max:255'],
            'student_name' => ['required', 'string', 'max:255']
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();
        }
        try {
            $student = Student::find($request->id);
            $student->update([
                'grades_id' => $request->grades_id,
                'student_name' => $request->student_name
            ]);
            Alert::success('Pemberitahuan', 'Data <b>' . $student->student_name . '</b> berhasil disimpan')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $student->student_name . '</b> gagal disimpan : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }

    public function destroy(Request $request)
    {
        try {
            $student = Student::find($request->id);
            $student->delete();
            Alert::success('Pemberitahuan', 'Data <b>' . $student->student_name . '</b> berhasil dihapus')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $student->student_name . '</b> gagal dihapus : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }
}
