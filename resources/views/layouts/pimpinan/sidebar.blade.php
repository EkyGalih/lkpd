<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="{{ route('pegawai-pengguna.profile', Auth::user()->id) }}"><img
                        src="{{ Auth::user()->foto == null ? asset('profile/default/user.png') : asset(Auth::user()->foto) }}"
                        class="img-circle" width="80"></a></p>
            <h5 class="centered">{{ Auth::user()->nama }}</h5>
            <li class="mt">
                <a class="@yield('menu-dashboard')" href="{{ route('pimpinan') }}">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="">
                <a class="@yield('menu-iku-realisasi')" href="{{ route('iku-realisasi-pimpinan.index') }}">
                    <i class="fas fa-book"></i>
                    <span>IKU & REALISASI</span>
                </a>
            <li class="">
                <a class="@yield('menu-anggaran')" href="{{ route('apbdp') }}">
                    <i class="fas fa-journal-whills"></i>
                    <span>APBD PROVINSI NTB</span>
                </a>
            </li>
            <li class="">
                <a class="@yield('menu-realisasi-anggaran')" href="{{ route('realisasi-anggaran-pimpinan') }}">
                    <i class="fas fa-book-open"></i>
                    <span>REALISASI ANGGARAN</span>
                </a>
            </li>
            <li class="">
                <a class="@yield('jadwal')" href="{{ route('pimpinan.jadwal') }}">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Jadwal Anda</span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
