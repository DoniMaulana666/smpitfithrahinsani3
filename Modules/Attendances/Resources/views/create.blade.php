<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Attendance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('app.attendances.create') }}" method="post">
                        @csrf
                        <input class="border" name="attendances_teacher_id" value="{{ old('attendances_teacher_id') }}" />
                        <input class="border" name="attendances_subject_id"
                            value="{{ old('attendances_subject_id') }}" />
                        <input class="border" name="attendances_grade_id" value="{{ old('attendances_grade_id') }}" />
                        <input class="border" name="attendances_student_id"
                            value="{{ old('attendances_student_id') }}" />
                        <input class="border" name="attendances_status" value="{{ old('attendances_status') }}" />
                        <button>Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
