@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @can('create attendances')
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target="#modal-tambah" data-backdrop="static" data-keyboard="false"><i
                                        class="fas fa-plus"></i> Tambah</a>
                            </h3>
                        </div>
                        @endcan
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table class="table table-bordered table-hover datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Guru</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Kelas</th>
                                        <th>Tanggal</th>
                                        @canany(['update attendances', 'delete attendances', 'detail attendances'])
                                        <th>Action</th>
                                        @endcanany
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $i)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $i->teacher_name }}</td>
                                        <td>{{ $i->subject_name }}</td>
                                        <td>{{ $i->grade_name }}</td>
                                        <td>{{ $i->created_at->format('Y-m-d H:i') }}</td>
                                        @canany(['update attendances', 'delete attendances', 'detail attendances'])
                                        <td>
                                            <div class="btn-group">
                                                @can('delete attendances')
                                                <button class="btn btn-sm btn-danger btn-delete"
                                                    data-id="{{ $i->id }}" data-name="{{ $i->id }}"><i
                                                        class="fas fa-trash"></i></button>
                                                @endcan
                                                @can('detail attendances')
                                                <button class="btn btn-sm btn-success btn-detail"
                                                    data-id="{{ $i->id }}"><i class="fas fa-eye"></i></button>
                                                @endcan
                                            </div>
                                        </td>
                                        @endcanany
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </section>
    <!-- /.content -->
</div>

<!-- Modal Tambah -->
@section('modal')
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Absensi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('attendances.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="attendances_student_id">
                    <input type="hidden" name="attendances_status">
                    <div class="input-group">
                        <label>Name</label>
                        <div class="input-group">
                            <select class="custom-select" name="attendances_teacher_id">
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}" @if ($user->id == $auth_user_id) selected @endif>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-group">
                        <label>Subject</label>
                        <div class="input-group">
                            <select class="custom-select" name="attendances_subject_id">
                                @foreach ($subjects as $subjek)
                                <option value="{{ $subjek->id }}" @if ($subjek->id == $auth_subject_id) selected @endif>{{ $subjek->name_subjects }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-group">
                        <label>Kelas</label>
                        <div class="input-group">
                            <select class="custom-select" id="grade-select" name="attendances_grade_id">
                                <option value="" disabled selected>Pilih Kelas</option>
                                @foreach ($grades as $grade)
                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div id="student-attendance" style="display: none;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Siswa</th>
                                    <th>Kehadiran</th>
                                </tr>
                            </thead>
                            <tbody id="student-list">
                                <!-- Data siswa akan ditampilkan di sini -->
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Hapus -->
<div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('attendances.destroy') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <p class="modal-text">Apakah anda yakin akan menghapus? <b></b></p>
                    <input type="hidden" name="id" id="did">
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- Modal Detail -->
<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Attendance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Teacher</th>
                        <td>{{ $i->teacher_name }}</td>
                    </tr>
                    <tr>
                        <th>Subject</th>
                        <td>{{ $i->subject_name }}</td>
                    </tr>
                    <tr>
                        <th>Grade</th>
                        <td>{{ $i->grade_name }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $i->created_at }}</td>
                    </tr>
                </table>
                <h5>Detail Siswa dan Keterangan:</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="detail_student_status">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    $(document).ready(function() {
        $(document).on("click", '.btn-edit', function() {
            let id = $(this).attr("data-id");
            $('#modal-loading').modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
            $.ajax({
                url: "{{ route('attendances.show') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    var data = data.data;
                    $("#attendances_teacher_id").val(data.attendances_teacher_id);
                    $("#attendances_subject_id").val(data.attendances_subject_id);
                    $("#attendances_grade_id").val(data.attendances_grade_id);
                    $("#attendances_student_id").val(data.attendances_student_id);
                    $("#attendances_status").val(data.attendances_status);
                    $("#id").val(data.id);
                    $('#modal-loading').modal('hide');
                    $('#modal-edit').modal({
                        backdrop: 'static',
                        keyboard: false,
                        show: true
                    });
                },
            });
        });

        $(document).on("click", '.btn-delete', function() {
            let id = $(this).attr("data-id");
            let name = $(this).attr("data-name");
            $("#did").val(id);
            $("#delete-data").html(name);
            $('#modal-delete').modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        });
    });

    $(document).ready(function() {
        $(document).on("click", '.btn-detail', function() {
            let id = $(this).attr("data-id");
            $.ajax({
                url: "{{ route('attendances.show') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    var attendanceData = data.data;
                    var students = data.students;
                    var statuses = data.statuses;
                    var studentStatusHtml = '';

                    for (var i = 0; i < students.length; i++) {
                        var statusText = getStatusText(statuses[i]);
                        studentStatusHtml += '<tr><td>' + students[i].student_name + '</td><td>' + statusText + '</td></tr>';
                    }

                    $("#detail_teacher_name").text(attendanceData.teacher_name);
                    $("#detail_subject_name").text(attendanceData.subject_name);
                    $("#detail_grade_name").text(attendanceData.grade_name);
                    $("#detail_updated_at").text(attendanceData.updated_at);
                    $("#detail_student_status").html(studentStatusHtml);
                    $('#modal-detail').modal('show');
                },
            });
        });

        function getStatusText(status) {
            switch (status) {
                case '1':
                    return 'Hadir';
                case '2':
                    return 'Sakit';
                case '3':
                    return 'Alfa';
                default:
                    return 'Tidak diketahui';
            }
        }

        $('#grade-select').change(function() {
            let gradeId = $(this).val();
            $.ajax({
                url: "{{ route('students.byGrade') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    grade_id: gradeId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    let students = data.students;
                    let studentTable = '';
                    students.forEach((student, index) => {
                        studentTable += `<tr>
                            <td>${index + 1}</td>
                            <td>${student.student_name}</td>
                            <td>
                                <input type="hidden" name="attendances_student_id[]" value="${student.id}">
                                <input type="radio" name="attendances_status[${student.id}]" value="1"> Hadir
                                <input type="radio" name="attendances_status[${student.id}]" value="2"> Sakit
                                <input type="radio" name="attendances_status[${student.id}]" value="3"> Alfa
                            </td>
                        </tr>`;
                    });
                    $('#student-list').html(studentTable);
                    $('#student-attendance').show();
                }
            });
        });
    });
</script>
@endsection
