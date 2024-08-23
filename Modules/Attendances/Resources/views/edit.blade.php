<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Attendance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('app.attendances.update', $attendance->id) }}" method="post">
                        @csrf
                        @method('patch')

                        <input class="border" name="attendances_teacher_id"
                            value="{{ attendance('attendances_teacher_id', $attendance->name) }}" />
                        <input class="border" name="attendances_subject_id"
                            value="{{ attendance('attendances_subject_id', $attendance->attendances_subject_id) }}" />
                        <input class="border" name="attendances_grade_id"
                            value="{{ attendance('attendances_grade_id', $attendance->attendances_grade_id) }}" />
                        <input class="border" name="attendances_student_id"
                            value="{{ attendance('attendances_student_id', $attendance->attendances_student_id) }}" />
                        <input class="border" name="attendances_status"
                            value="{{ attendance('attendances_status', $attendance->attendances_status) }}" />
                        <button>{{ __('Submit') }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
