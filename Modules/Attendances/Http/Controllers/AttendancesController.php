<?php

namespace Modules\Attendances\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;
use Modules\Attendances\Models\Attendance;
use Modules\Grades\Models\Grade;
use Modules\Subjects\Models\Subject;
use Modules\Students\Models\Student;
use App\Models\User;
use Modules\Teachers\Models\Teacher;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use Illuminate\Support\Facades\DB;

class AttendancesController extends Controller
{
    public function index()
{
    $x['title'] = "Attendance";
    $x['data'] = Attendance::leftJoin('grades', 'grades.id', '=', 'attendances.attendances_grade_id')
        ->leftJoin('subjects', 'subjects.id', '=', 'attendances.attendances_subject_id')
        ->leftJoin('students', 'students.id', '=', 'attendances.attendances_student_id')
        ->leftJoin('teachers', 'teachers.id', '=', 'attendances.attendances_teacher_id')
        ->leftJoin('users', 'users.id', '=', 'attendances.attendances_teacher_id')
        ->select('attendances.*', 'grades.name as grade_name', 'subjects.name_subjects as subject_name', 'students.id as student_id', 'users.name as teacher_name')
        ->orderBy('attendances.created_at', 'asc')
        ->get();

    $x['grades'] = Grade::all();
    $x['subjects'] = Subject::all();
    $x['students'] = Student::all();
    $x['teachers'] = Teacher::all();
    $x['users'] = User::all();
    $x['auth_user_id'] = Auth::id();

    $teacher = Teacher::where('id', $x['auth_user_id'])->first();
    if ($teacher) {
        $x['auth_subject_id'] = $teacher->subjects_id;
    } else {
        $x['auth_subject_id'] = null;
    }

    return view('attendances::index', $x);
}

    public function getStudentsByGrade(Request $request)
    {
        $gradeId = $request->input('grade_id');
        $students = Student::where('grades_id', $gradeId)->get();
        return response()->json(['students' => $students]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'attendances_teacher_id' => ['required', 'integer'],
            'attendances_subject_id' => ['required', 'integer'],
            'attendances_grade_id' => ['required', 'integer'],
            'attendances_student_id' => ['required', 'array'],
            'attendances_status' => ['required', 'array']
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $student_ids = implode('|', $request->attendances_student_id);
            $statuses = implode('|', array_values($request->attendances_status));

            $attendance = Attendance::create([
                'attendances_teacher_id' => $request->attendances_teacher_id,
                'attendances_subject_id' => $request->attendances_subject_id,
                'attendances_grade_id' => $request->attendances_grade_id,
                'attendances_student_id' => $student_ids,
                'attendances_status' => $statuses
            ]);
            // dd($attendance);
            Alert::success('Pemberitahuan', 'Data berhasil dibuat')->toToast()->toHtml();
        } catch (\Throwable $th) {
            \Log::error('Error creating attendance: ' . $th->getMessage());

            Alert::error('Pemberitahuan', 'Data gagal dibuat: ' . $th->getMessage())->toToast()->toHtml();
        }

        return back();
    }
    public function show(Request $request)
{
    $attendance = Attendance::find($request->id);
    $studentIds = explode('|', $attendance->attendances_student_id);
    $students = Student::whereIn('id', $studentIds)->get(['id', 'student_name']); // Mengambil student_name
    $statuses = explode('|', $attendance->attendances_status);

    return response()->json([
        'status' => Response::HTTP_OK,
        'students' => $students,
        'statuses' => $statuses,
        'message' => 'Data attendance by id',
        'data' => $attendance
    ], Response::HTTP_OK);
}
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'attendances_teacher_id' => ['required', 'string', 'max:255'],
            'attendances_subject_id' => ['required', 'string', 'max:255'],
            'attendances_student_id' => ['required', 'string', 'max:255'],
            'attendances_grade_id' => ['required', 'string', 'max:255'],
            'attendances_status' => ['required', 'string', 'max:255']
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();
        }
        try {
            $attendance = Attendance::find($request->id);
            $attendance->update([
                'attendances_teacher_id' => $request->attendances_teacher_id,
                'attendances_subject_id' => $request->attendances_subject_id,
                'attendances_student_id' => $request->attendances_student_id,
                'attendances_grade_id' => $request->attendances_grade_id,
                'attendances_status' => $request->attendances_status
            ]);
            Alert::success('Pemberitahuan', 'Data <b>' . $attendance->attendances_status . '</b> berhasil disimpan')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $attendance->attendances_status . '</b> gagal disimpan : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }
    public function destroy(Request $request)
    {
        try {
            $attendance = Attendance::find($request->id);
            $attendance->delete();
            Alert::success('Pemberitahuan', 'Data <b>' . $attendance->attendances_status . '</b> berhasil dihapus')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $attendance->attendances_status . '</b> gagal dihapus : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }
}
