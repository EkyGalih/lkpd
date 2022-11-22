<div class="modal fade" id="ModalView{{ $loop->iteration }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="well profile">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-8">
                    <h2>{{ $user->nama }}</h2>
                    <p><strong>Jabatan: </strong> {{ $user->Pegawai->jabatan ?? '-' }} </p>
                    <p><strong>Diklat: </strong> {{ $user->Pegawai->diklat ?? '-' }}
                    </p>
                    <p>
                        <span class="tags">{{ $user->Pegawai->usia ?? '-' }} Thn</span>
                        <span class="tags">{{ $user->Pegawai->jenis_kelamin ?? '-' }}</span>
                        <span class="tags">{{ $user->Pegawai->agama ?? '-' }}</span>
                        <span class="tags">{{ $user->Pegawai->Divisi->nama_divisi ?? '-' }}</span>
                    </p>
                </div>
                <div class="col-xs-12 col-sm-4 text-center">
                    <figure>
                        <img src="{{ $user->foto == null ? asset('profile/default/user.png') : asset($user->foto) }}"
                            alt="" class="img-circle img-responsive">
                        <figcaption class="ratings">
                            <p>{{ $user->Pegawai->Pangkat->nama_pangkat ?? '-' }} [{{ $user->Pegawai->Golongan->nama_golongan ?? '-' }}]</p>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="col-xs-12 divider text-center">
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h4><strong> {{ $user->Pegawai->masa_kerja_golongan ?? '-' }} </strong></h4>
                    <p><small style="font-size: 14px;">Masa Kerja</small></p>
                    {{-- <button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Follow </button> --}}
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h4><strong>{{ $user->Pegawai->kenaikan_pangkat_tahun_berikutnya ?? '-' }}</strong></h4>
                    <p><small style="font-size: 14px;">Promosi</small></p>
                    {{-- <button class="btn btn-info btn-block"><span class="fa fa-user"></span> View Profile </button> --}}
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h4><strong>{{ $user->Pegawai->batas_pensiun ?? '-' }}</strong></h4>
                    <p><small style="font-size: 14px;">Pensiun</small></p>
                    {{-- <div class="btn-group dropup btn-block">
                        <button type="button" class="btn btn-primary"><span class="fa fa-gear"></span> Options
                        </button>
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu text-left" role="menu">
                            <li><a href="#"><span class="fa fa-envelope pull-right"></span> Send an email </a>
                            </li>
                            <li><a href="#"><span class="fa fa-list pull-right"></span> Add or remove from a list
                                </a></li>
                            <li class="divider"></li>
                            <li><a href="#"><span class="fa fa-warning pull-right"></span>Report this user for
                                    spam</a></li>
                            <li class="divider"></li>
                            <li><a href="#" class="btn disabled" role="button"> Unfollow </a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
