@extends('Pegawai.index')
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
                  <h4><i class="fa fa-angle-right"></i> PAGU BPKAD NTB</h4>
                  <div class="panel-body">
                    <div id="hero-area" class="graph"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!--custom chart end-->
        <div class="row mt">
            <!-- /col-md-4-->
            <div class="col-md-4 col-sm-4 mb">
                <div class="white-panel pn">
                    <div class="white-header">
                        <h5>TOTAL PAGU 2022</h5>
                    </div>
                    <div class="chart mt">
                        <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,111,123,890,464,655]"></div>
                    </div>
                    <p class="mt"><b>Rp. 3,015,108,541,624</b><br/></p>
                </div>
                <!--  /darkblue panel -->
            </div>
            <div class="col-md-4 col-sm-4 mb">
                <div class="red-panel pn">
                    <div class="red-header">
                        <h5>Total Belanja 2022 Q2</h5>
                    </div>
                    <div class="chart mt">
                        <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,111,123,890,464,655]"></div>
                    </div>
                    <p class="mt"><b>Rp. 815,108,541,624</b><br/></p>
                </div>
                <!--  /darkblue panel -->
            </div>
            <div class="col-md-4 col-sm-4 mb">
                <div class="green-panel pn">
                    <div class="green-header">
                        <h5>Total Pemasukan 2021</h5>
                    </div>
                    <div class="chart mt">
                        <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,111,123,890,464,655]"></div>
                    </div>
                    <p class="mt"><b>Rp. 315,108,541,624</b><br/></p>
                </div>
                <!--  /darkblue panel -->
            </div>
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
            <!-- First Activity -->
            <div class="desc">
                <div class="thumb">
                    <span class="badge bg-info"><i class="fa fa-clock"></i></span>
                </div>
                <div class="details">
                    <p>
                        <muted>09.00 WITA</muted>
                        <br/>
                        <a href="#">Rapat</a> Dengan Kominfo di ruang rapat.<br/>
                    </p>
                </div>
            </div>
            <!-- Second Activity -->
            <div class="desc">
                <div class="thumb">
                    <span class="badge bg-info"><i class="fa fa-clock"></i></span>
                </div>
                <div class="details">
                    <p>
                        <muted>10.00 WITA</muted>
                        <br/>
                        <a href="#">Laporan</a> Keuangan kas daerah ke gubernur.<br/>
                    </p>
                </div>
            </div>
            <!-- Third Activity -->
            <div class="desc">
                <div class="thumb">
                    <span class="badge bg-info"><i class="fa fa-clock"></i></span>
                </div>
                <div class="details">
                    <p>
                        <muted>14.00 WITA</muted>
                        <br/>
                        <a href="#">Bertemu</a> Pak yul untuk membahas realisasi anggaran.<br/>
                    </p>
                </div>
            </div>
            <!-- Fourth Activity -->
            <div class="desc">
                <div class="thumb">
                    <span class="badge bg-info"><i class="fa fa-clock"></i></span>
                </div>
                <div class="details">
                    <p>
                        <muted>16.00 WITA</muted>
                        <br/>
                        <a href="#">Buat Laporan</a> Terkait Kegiatan bulanan pegawai.<br/>
                    </p>
                </div>
            </div>
        </div>
        <!-- /col-lg-3 -->
    </div>
    @endsection
    @section('js-additional')
    <script src="{{ asset('lib/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('lib/morris/morris.min.js') }}"></script>
    <script src="{{ asset('lib/sparkline-chart.js') }}"></>
    <script src="{{ asset('lib/zabuto_calendar.js') }}"></script>
    <script src="{{ asset('lib/morris-conf.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // data table

            var unique_id = $.gritter.add({
                // (string | mandatory) the heading of the notification
                title: 'Selamat Datang di LKPD BPKAD!',
                // (string | mandatory) the text inside the notification
                text: 'Sistem Informasi yang menampilkan data apbd dan realisasi apbd.',
                // (string | optional) the image to display on the left
                image: '{{ asset("images/favicon.png") }}',
                // (bool | optional) if you want it to fade out on its own or just sit there
                sticky: false,
                // (int | optional) the time you want it to be alive for before fading out
                time: 4000,
                // (string | optional) the class name you want to apply to that specific message
                class_name: 'my-sticky-class'
            });

            return false;
        });
    </script>
    @endsection
