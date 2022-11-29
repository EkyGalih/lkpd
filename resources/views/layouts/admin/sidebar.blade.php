<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="{{ route('admin-pengguna.profile', Auth::user()->id) }}"><img src="{{ Auth::user()->foto == null ? asset('profile/default/user.png') : asset(Auth::user()->foto) }}" class="img-circle" width="80"></a></p>
            <h5 class="centered">{{ Auth::user()->nama }}</h5>
            <li class="mt">
                <a class="@yield('menu-dashboard')" href="{{ route('admin') }}">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a class="@yield('menu-iku-realisasi')" href="javascript:'">
                    <i class="fas fa-book"></i>
                    <span>IKU & REALISASI</span>
                </a>
                <ul class="sub @yield('show-menu-iku')">
                    <li class="@yield('iku-realisasi')"><a href="{{ route('iku-realisasi.index') }}"><i class="fas fa-book"></i> Iku & Realisasi</a></li>
                    <li class="@yield('iku-sasaran')"><a href="{{ route('iku-sasaran') }}"><i class="fas fa-dot-circle"></i> Sasaran Strategis</a></li>
                    <li class="@yield('iku-indikator')"><a href="{{ route('iku-indikator') }}"><i class="fas fa-tachometer-alt"></i> Indikator Kinerja</a></li>
                    <li class="@yield('iku-formulasi')"><a href="{{ route('iku-formulasi') }}"><i class="fas fa-file-code"></i> Formulasi</a></li>`
                    <li class="divider"></li>
                    <li class="@yield('rincian-iku')"><a href="{{route('rincian-iku-admin')}}"><i class="fas fa-info"></i> Rincian Iku </a></li>
                </ul>
            </li>
            <li class="">
                <a class="@yield('menu-anggaran')" href="{{ route('apbd') }}">
                    <i class="fas fa-journal-whills"></i>
                    <span>APBD PROVINSI NTB</span>
                </a>
            </li>
            {{-- <li class="sub-menu">
                <a class="@yield('menu-laporan')" href="javascript:;">
                    <i class="fas fa-chart-line"></i>
                    <span>AKUNTABILITAS KEUANGAN</span>
                </a>
                <ul class="sub @yield('show-menu-laporan')">
                    <li class="@yield('realisasi-anggaran')"><a href="{{ route('realisasi-anggaran-admin') }}"><i class="fas fa-file-archive"></i> Realisasi Anggaran</a></li>
                    <li class="@yield('saldo-anggaran-lebih')"><a href="{{ route('saldo-anggaran-admin') }}"><i class="fas fa-wallet"></i> Saldo Anggaran Lebih</a></li>
                    <li class="@yield('neraca')"><a href="{{ route('neraca-admin') }}"><i class="fas fa-chart-bar"></i> Neraca</a></li>
                    <li class="@yield('operasional')"><a href="{{ route('operasional-admin') }}"><i class="fas fa-fax"></i> Operasional</a></li>
                    <li class="@yield('arus-kas')"><a href="{{ route('arus-kas-admin.index') }}"><i class="fas fa-cash-register"></i> Arus Kas</a></li>
                    <li class="@yield('perubahan-ekuitas')"><a href="{{ route('ekuitas-admin') }}"><i class="fas fa-exchange-alt"></i> Perubahan Ekuitas</a></li>
                </ul>
            </li> --}}
            <li class="">
                <a class="@yield('menu-realisasi-anggaran')" href="{{ route('realisasi-anggaran-admin') }}">
                    <i class="fas fa-book-open"></i>
                    <span>LAP. REALISASI ANGGARAN</span>
                </a>
            </li>
            <li class="">
                <a class="@yield('jadwal')" href="{{ route('admin.jadwal') }}">
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
                    <li class="@yield('kode-rekening')"><a href="{{ route('kode-rekening-admin') }}"><i class="fas fa-barcode"></i> Kode Rekening</a></li>
                    <li class="@yield('divisi')"><a href="{{ route('admin-divisi') }}"><i class="fas fa-building"></i> Divisi</a></li>
                    <li class="@yield('pengguna')"><a href="{{ route('admin-pengguna') }}"><i class="fas fa-users"></i> Pengguna</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
