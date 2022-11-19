@extends('pegawai.index')
@section('title', 'Beranda')
@section('menu-dashboard', 'active')
@section('content')
<div class="row mt">
    <div class="col-lg-12">
      <div class="row content-panel">
        <div class="col-md-4 profile-text mt mb centered">
          <div class="right-divider hidden-sm hidden-xs">
            <h4>{{ $User->Pegawai->usia }} Tahun</h4>
            <h6>Usia</h6>
            <h4>{{ $User->Pegawai->masa_kerja_golongan }}</h4>
            <h6>Masa Kerja</h6>
            <h4>{{ $User->Pegawai->batas_pensiun }}</h4>
            <h6>Tahun Pensiun</h6>
          </div>
        </div>
        <!-- /col-md-4 -->
        <div class="col-md-4 profile-text">
          <h3>{{ $User->nama }}</h3>
          <h6>{{ $User->Pegawai->nip }}</h6>
          <p>{{ $User->Pegawai->jabatan }}</p>
          <br>
          <p><button class="btn btn-theme"><i class="fa fa-envelope"></i> {{ $User->email }}</button></p>
        </div>
        <!-- /col-md-4 -->
        <div class="col-md-4 centered">
          <div class="profile-pic">
            <p><img src="{{ $User->foto == null ? asset('profile/default/user.png') : asset($User->foto) }}" class="img-circle"></p>
            <p>
              <button class="btn btn-theme"><i class="fa fa-certificate"></i> {{ $User->Pegawai->Pangkat->nama_pangkat }} [{{ $User->Pegawai->Golongan->nama_golongan }}]</button>
            </p>
          </div>
        </div>
        <!-- /col-md-4 -->
      </div>
      <!-- /row -->
    </div>
  </div>
@endsection
