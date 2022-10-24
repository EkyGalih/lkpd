@extends('admin.index')
@section('title', 'Jadwal Pimpinan')
@section('jadwal', 'active')

@section('css-additional')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <h3><a href="{{ route('admin.jadwal') }}"> <i class="fas fa-calendar-alt"></i> Jadwal Pimpinan</a></h3>
    <hr />
    <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">
                @include('admin.Schedule.Components.table')
            </div>
        </div>
    </div>
@endsection

@section('js-additional')
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.table-jadwal').DataTable();
        });
    </script>
@endsection
