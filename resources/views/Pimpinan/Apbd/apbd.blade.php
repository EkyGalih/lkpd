@extends('admin.index')
@section('title', 'APBD')

@section('menu-anggaran', 'active')

@section('css-additional')
    <link rel="stylesheet" href="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.css') }}">
    {{-- <script src="{{ asset('lib/chart-master/Chart.js') }}"></script> --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection
@section('content')
    <h3><a href="{{ route('apbd') }}"><i class="fas fa-journal-whills"></i> APBD PROVINSI NUSA TENGGARA BARAT (NTB)</a></h3>
    <hr />
    <div class="row mt">
        <div class="col-lg-12">
            <div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#one-years" aria-controls="one-years" role="tab" data-toggle="tab">DATA PERTAHUN ({{ $tahun_anggaran }})</a></li>
                  <li role="presentation"><a href="#five-years" aria-controls="five-years" role="tab" data-toggle="tab">DATA 5 TAHUN TERAKHIR</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="one-years">
                      @include('pegawai.Apbd.Components.table')
                  </div>
                  <div role="tabpanel" class="tab-pane" id="five-years">
                    @include('pegawai.Apbd.Components.table-5-years')
                  </div>
                </div>
              </div>
        </div>
        @include('pegawai.Apbd.Components.import')
        @include('pegawai.Apbd.Components.add')
    </div>
    <div class="row mt">
        <div class="col-lg-6">
            <div class="content-panel">
                <canvas id="apbd-chart"></canvas>
            </div>
        </div>
    </div>
@endsection
@section('js-additional')
    <script src="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('lib/jquery-mask/jquery-mask.js') }}"></script>
    <script>

        $('apbd-table').dataTable();

        tahun_anggaran = $('#get_ta').val();

        function getApbd(){
            ta = $('#tahun_anggaran').val();
            window.location.href = window.location.origin + '/index.php/pegawai/apbd/' + ta
        }

        // get years

        years1 = $('#years1').val();
        years2 = $('#years2').val();
        years3 = $('#years3').val();
        years4 = $('#years4').val();

        // chart Apbd
        jumlah_pendapatan1 = $('#jumlah_pendapatan1').val();
        jumlah_pendapatan2 = $('#jumlah_pendapatan2').val();
        selisih_pendapatan = Math.abs(jumlah_pendapatan1 - jumlah_pendapatan2);
        data_pendapatan_years1 = $('#jumlah_pendapatan_'+years1).val();

        data_pendapatan_years2 = $('#jumlah_pendapatan_'+years2).val();
        data_pendapatan_years3 = $('#jumlah_pendapatan_'+years3).val();
        data_pendapatan_years4 = $('#jumlah_pendapatan_'+years4).val();

        jumlah_belanja1 = $('#jumlah_belanja1').val();
        jumlah_belanja2 = $('#jumlah_belanja2').val();
        selisih_belanja = Math.abs(jumlah_belanja1 - jumlah_belanja2);
        data_belanja_years1 = $('#jumlah_belanja_'+years1).val();
        data_belanja_years2 = $('#jumlah_belanja_'+years2).val();
        data_belanja_years3 = $('#jumlah_belanja_'+years3).val();
        data_belanja_years4 = $('#jumlah_belanja_'+years4).val();

        jumlah_pembiayaan1 = $('#jumlah_pembiayaan1').val();
        jumlah_pembiayaan2 = $('#jumlah_pembiayaan2').val();
        selisih_pembiayaan = Math.abs(jumlah_pembiayaan1 - jumlah_pembiayaan2);
        data_pembiayaan_years1 = $('#jumlah_pembiayaan_'+years1).val();
        data_pembiayaan_years2 = $('#jumlah_pembiayaan_'+years2).val();
        data_pembiayaan_years3 = $('#jumlah_pembiayaan_'+years3).val();
        data_pembiayaan_years4 = $('#jumlah_pembiayaan_'+years4).val();

        data_pembiayaan2_years1 = $('#jumlah_pembiayaan2_'+years1).val();
        data_pembiayaan2_years2 = $('#jumlah_pembiayaan2_'+years2).val();
        data_pembiayaan2_years3 = $('#jumlah_pembiayaan2_'+years3).val();
        data_pembiayaan2_years4 = $('#jumlah_pembiayaan2_'+years4).val();
    </script>
    @include('layouts.admin.Script.apbd.add-script')
    @include('layouts.admin.Script.apbd-chart')
@endsection
