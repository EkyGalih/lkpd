@extends('admin.index')
@section('title', 'Beranda')
@section('menu-dashboard', 'active')
@section('css-additional')
    <script src="{{ asset('lib/chart-master/Chart.js') }}"></script>
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-9 main-chart">
            <!--CUSTOM CHART START -->
            <div id="morris">
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="content-panel">
                            <h4><i class="fa fa-angle-right"></i> APBD BPKAD NTB</h4>
                            <div class="panel-body">
                                <input type="hidden" id="get_ta" value="{{ date('Y') }}">
                                <input type="hidden" id="pad_anggaran" value="{{ $PadAnggaran }}">
                                <input type="hidden" id="pad_perubahan" value="{{ $PadPerubahan }}">
                                <input type="hidden" id="pad_selisih" value="{{ $PadSelisih }}">
                                <input type="hidden" id="belanja_anggaran" value="{{ $BelanjaAnggaran }}">
                                <input type="hidden" id="belanja_perubahan" value="{{ $BelanjaPerubahan }}">
                                <input type="hidden" id="belanja_selisih" value="{{ $BelanjaSelisih }}">
                                <input type="hidden" id="biaya_anggaran" value="{{ $BiayaAnggaran }}">
                                <input type="hidden" id="biaya_perubahan" value="{{ $BiayaPerubahan }}">
                                <input type="hidden" id="biaya_selisih" value="{{ $BiayaSelisih }}">
                                <canvas id="beranda-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--custom chart end-->
            <div class="row mt">
                <div class="col-md-12">
                    <div class="showback">
                        <h2>CAPAIAN IKU & REALISASI</h2>
                        <hr/>
                        @foreach ($iku as $item)
                            <h4>{{ $loop->iteration }}. {{ $item->IK->indikator_kinerja }}</h4>
                            <div class="progress active">
                                <div class="progress-bar progress-bar-{{ $item->target_tercapai < 50 ? 'warning' : 'success' }}" role="progressbar" aria-valuenow="{{ $item->target_tercapai }}" aria-valuemin="0"
                                    aria-valuemax="{{ $item->target }}" style="width: {{ $item->target_tercapai }}%">
                                   {{ $item->target_tercapai }}% Terealisasi
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /col-md-4-->
                {{-- <div class="col-md-4 col-sm-4 mb">
                    <div class="white-panel pn">
                        <div class="white-header">
                            <h5>Pendapatan Asli Daerah (PAD)</h5>
                        </div>
                        <div class="chart mt">
                            <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%"
                                data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color=""
                                data-highlight-line-color="#fff" data-spot-radius="4"
                                data-data="[200,135,667,333,526,996,111,123,890,464,655]"></div>
                        </div>
                        <p class="mt"><b>Rp. 3,015,108,541,624</b><br /></p>
                    </div>
                    <!--  /darkblue panel -->
                </div>
                <div class="col-md-4 col-sm-4 mb">
                    <div class="red-panel pn">
                        <div class="red-header">
                            <h5>Belanja</h5>
                        </div>
                        <div class="chart mt">
                            <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%"
                                data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color=""
                                data-highlight-line-color="#fff" data-spot-radius="4"
                                data-data="[200,135,667,333,526,996,111,123,890,464,655]"></div>
                        </div>
                        <p class="mt"><b>Rp. 815,108,541,624</b><br /></p>
                    </div>
                    <!--  /darkblue panel -->
                </div>
                <div class="col-md-4 col-sm-4 mb">
                    <div class="green-panel pn">
                        <div class="green-header">
                            <h5>Pembiayaan</h5>
                        </div>
                        <div class="chart mt">
                            <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%"
                                data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color=""
                                data-highlight-line-color="#fff" data-spot-radius="4"
                                data-data="[200,135,667,333,526,996,111,123,890,464,655]"></div>
                        </div>
                        <p class="mt"><b>Rp. 315,108,541,624</b><br /></p>
                    </div>
                    <!--  /darkblue panel -->
                </div> --}}
                <!-- /col-md-4 -->
            </div>
            <!-- /row -->
        </div>
        <!-- /col-lg-9 END SECTION MIDDLE -->
        <!-- **********************************************************************************************************************************************************
                                    RIGHT SIDEBAR CONTENT
                                    *********************************************************************************************************************************************************** -->
        <div class="col-lg-3 ds">
            <!-- RECENT ACTIVITIES SECTION -->
            <h4 class="centered mt">Jadwal Anda Hari Ini</h4>
            <hr>
            <!-- First Activity -->
            @foreach ($jadwals as $jadwal)
                <div class="desc">
                    <div class="thumb">
                        <span class="badge bg-info"><i class="fa fa-clock"></i>
                            <muted>{{ $jadwal->jam_acara }}</muted>
                        </span>
                    </div>
                    <div class="details">
                        <p>
                            <br />
                            <br />
                            From : <a href="#">{{ $jadwal->acara_dari }}</a>
                        <p>
                            {{ $jadwal->redaksi_acara }}
                            <span style="float: right; margin-top: 20px; font-size: 12px"><i class="fas fa-map-marker"></i>
                                {{ $jadwal->lokasi_acara }}</span>
                        </p>
                        </p>
                    </div>
                </div>
            @endforeach
            {{ $jadwals->links() }}
        </div>
        <!-- /col-lg-3 -->
    </div>
@endsection
@section('js-additional')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- <script src="{{ asset('lib/raphael/raphael.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('lib/morris/morris.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('lib/sparkline-chart.js') }}"></script> --}}
    <script src="{{ asset('lib/zabuto_calendar.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // data table

            var unique_id = $.gritter.add({
                // (string | mandatory) the heading of the notification
                title: 'Selamat Datang di LKPD BPKAD!',
                // (string | mandatory) the text inside the notification
                text: 'Sistem Informasi yang menampilkan data apbd dan realisasi apbd.',
                // (string | optional) the image to display on the left
                image: '{{ asset('images/favicon.png') }}',
                // (bool | optional) if you want it to fade out on its own or just sit there
                sticky: false,
                // (int | optional) the time you want it to be alive for before fading out
                time: 4000,
                // (string | optional) the class name you want to apply to that specific message
                class_name: 'my-sticky-class'
            });

            return false;
        });
        tahun_anggaran = $('#get_ta').val();

        // data pad
        PadAnggaran = $('#pad_anggaran').val();
        PadPerubahan = $('#pad_perubahan').val();
        PadSelisih = $('#pad_selisih').val();

        // data belanja
        BelanjaAnggaran = $('#belanja_anggaran').val();
        BelanjaPerubahan = $('#belanja_perubahan').val();
        BelanjaSelisih = $('#belanja_selisih').val();

        // data pad
        BiayaAnggaran = $('#biaya_anggaran').val();
        BiayaPerubahan = $('#biaya_perubahan').val();
        BiayaSelisih = $('#biaya_selisih').val();
    </script>
    @include('layouts.admin.Script.chart-beranda')
@endsection
