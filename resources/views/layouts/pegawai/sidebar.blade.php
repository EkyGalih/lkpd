<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="{{ route('pegawai-pengguna.profile', Auth::user()->id) }}"><img
                        src="{{ Auth::user()->foto == null ? asset('profile/default/user.png') : asset(Auth::user()->foto) }}"
                        class="img-circle" width="80"></a></p>
            <h5 class="centered">{{ Auth::user()->nama }}</h5>
            <li class="mt">
                <a class="@yield('menu-dashboard')" href="{{ route('pegawai') }}">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a class="@yield('menu-iku-realisasi')" href="javascript:;">
                    <i class="fas fa-book"></i>
                    <span>IKU & REALISASI</span>
                </a>
                <ul class="sub @yield('show-menu-iku')">
                    <li class="@yield('iku-realisasi')"><a href="{{ route('iku-realisasi-pegawai.index') }}"><i class="fas fa-book"></i> Iku & Realisasi</a></li>
                    <li class="@yield('iku-sasaran')"><a href="{{ route('iku-sasaran-pegawai') }}"><i class="fas fa-dot-circle"></i> Sasaran Strategis</a></li>
                    <li class="@yield('iku-indikator')"><a href="{{ route('iku-indikator-pegawai') }}"><i class="fas fa-tachometer-alt"></i> Indikator Kinerja</a></li>
                    <li class="@yield('iku-formulasi')"><a href="{{ route('iku-formulasi-pegawai') }}"><i class="fas fa-file-code"></i> Formulasi</a></li>
                    <li class="divider"></li>
                    <li class="@yield('rincian-iku')"><a href="{{route('rincian-iku-pegawai')}}"><i class="fas fa-info"></i> Rincian Iku </a></li>
                </ul>
            <li class="">
                <a class="@yield('menu-anggaran')" href="{{ route('pegawai-apbd') }}">
                    <i class="fas fa-journal-whills"></i>
                    <span>APBD PROVINSI NTB</span>
                </a>
            </li>
            <li class="">
                <a class="@yield('menu-realisasi-anggaran')" href="{{ route('realisasi-anggaran-pegawai') }}">
                    <i class="fas fa-book-open"></i>
                    <span>REALISASI ANGGARAN</span>
                </a>
            </li>
            <li class="">
                <a class="@yield('jadwal')" href="{{ route('pegawai.jadwal') }}">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Jadwal Pimpinan</span>
                </a>
            </li>
            <li class="sub-menu">
                <a class="@yield('menu-tools')" href="javascript:;">
                    <i class="fas fa-cogs"></i>
                    <span>Tools</span>
                </a>
                <ul class="sub @yield('show-menu-tools')">
                    <li class="@yield('kode-rekening')"><a href="{{ route('kode-rekening-pegawai') }}"><i class="fas fa-barcode"></i> Kode Rekening</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
