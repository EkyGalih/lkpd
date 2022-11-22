@extends('admin.index')
@section('title', 'Profile')
@section('css-additional')
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.css') }}">
@endsection
@section('content')
    <div class="row mt">
        <div class="col-lg-12">
            <div class="row content-panel">
                <div class="col-md-4 profile-text mt mb centered">
                    <div class="right-divider hidden-sm hidden-xs">
                        <h4>1922</h4>
                        <h6>FOLLOWERS</h6>
                        <h4>290</h4>
                        <h6>FOLLOWING</h6>
                        <h4>$ 13,980</h4>
                        <h6>MONTHLY EARNINGS</h6>
                    </div>
                </div>
                <!-- /col-md-4 -->
                <div class="col-md-4 profile-text">
                    <h3>{{ $Profile->nama }}</h3>
                    @if ($Profile->jenis_pegawai == 'admin')
                        <h6><label class="badge bg-important"><i class="fas fa-user-secret"></i> Administrator</label></h6>
                    @elseif ($Profile->jenis_pegawai == 'pimpinan')
                        <h6><label class="badge bg-important"><i class="fas fa-user-tie"></i> Pimpinan</label></h6>
                    @elseif ($Profile->jenis_pegawai == 'pegawai')
                        <h6><label class="badge bg-important"><i class="fas fa-user"></i> Staff</label></h6>
                    @endif
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                        classical Latin literature from 45 BC.</p>
                    <br>
                    <p><button class="badge bg-inverse"><i class="fa fa-building"></i> {{ $Profile->Divisi->nama_divisi }}
                            ({{ $Profile->Divisi->alias_divisi }})</button></p>
                </div>
                <!-- /col-md-4 -->
                <div class="col-md-4 centered">
                    <div class="profile-pic">
                        <p><img src="{{ $Profile->foto == null ? asset('images/no-image.PNG') : asset($Profile->foto) }}"
                                class="img-circle"></p>
                        <p>
                            <button class="btn btn-theme" data-toggle="modal" data-target="#ModalFoto"><i
                                    class="fa fa-upload"></i> Ganti Foto</button>
                        </p>
                    </div>
                </div>
                @include('admin.Profile.Addons.upload-foto')
                <!-- /col-md-4 -->
            </div>
            <!-- /row -->
        </div>
        <!-- /col-lg-12 -->
        <div class="col-lg-12 mt">
            <div class="row content-panel">
                <div class="panel-heading">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active">
                            <a data-toggle="tab" href="#overview">Overview</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#contact" class="contact-map">Contact</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#ubahPass">Ubah Password</a>
                        </li>
                    </ul>
                </div>
                <!-- /panel-heading -->
                <div class="panel-body">
                    <div class="tab-content">
                        <div id="overview" class="tab-pane active">
                            <div class="row">
                                <div class="col-md-6">
                                    <textarea rows="3" class="form-control" placeholder="Whats on your mind?"></textarea>
                                    <div class="grey-style">
                                        <div class="pull-left">
                                            <button class="btn btn-sm btn-theme"><i class="fa fa-camera"></i></button>
                                            <button class="btn btn-sm btn-theme"><i class="fa fa-map-marker"></i></button>
                                        </div>
                                        <div class="pull-right">
                                            <button class="btn btn-sm btn-theme03">POST</button>
                                        </div>
                                    </div>
                                    <div class="detailed mt">
                                        <h4>Recent Activity</h4>
                                        <div class="recent-activity">
                                            <div class="activity-icon bg-theme"><i class="fa fa-check"></i></div>
                                            <div class="activity-panel">
                                                <h5>1 HOUR AGO</h5>
                                                <p>Purchased: Dashio Admin Panel & Front-end theme.</p>
                                            </div>
                                            <div class="activity-icon bg-theme02"><i class="fa fa-trophy"></i></div>
                                            <div class="activity-panel">
                                                <h5>5 HOURS AGO</h5>
                                                <p>Task Completed. Resolved issue with Disk Space.</p>
                                            </div>
                                            <div class="activity-icon bg-theme04"><i class="fa fa-rocket"></i></div>
                                            <div class="activity-panel">
                                                <h5>3 DAYS AGO</h5>
                                                <p>Launched a new product: Flat Pack Heritage.</p>
                                            </div>
                                        </div>
                                        <!-- /recent-activity -->
                                    </div>
                                    <!-- /detailed -->
                                </div>
                                <!-- /col-md-6 -->
                                <div class="col-md-6 detailed">
                                    <h4>User Stats</h4>
                                    <div class="row centered mt mb">
                                        <div class="col-sm-4">
                                            <h1><i class="fa fa-money"></i></h1>
                                            <h3>$22,980</h3>
                                            <h6>LIFETIME EARNINGS</h6>
                                        </div>
                                        <div class="col-sm-4">
                                            <h1><i class="fa fa-trophy"></i></h1>
                                            <h3>37</h3>
                                            <h6>COMPLETED TASKS</h6>
                                        </div>
                                        <div class="col-sm-4">
                                            <h1><i class="fa fa-shopping-cart"></i></h1>
                                            <h3>1980</h3>
                                            <h6>ITEMS SOLD</h6>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    <h4>My Friends</h4>
                                    <div class="row centered mb">
                                        <ul class="my-friends">
                                            <li>
                                                <div class="friends-pic"><img class="img-circle" width="35"
                                                        height="35" src="img/friends/fr-01.jpg"></div>
                                            </li>
                                        </ul>
                                        <div class="row mt">
                                            <div class="col-md-4 col-md-offset-4">
                                                <h6><a href="#">VIEW ALL</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    <h4>Pending Tasks</h4>
                                    <div class="row centered">
                                        <div class="col-md-8 col-md-offset-2">
                                            <h5>Dashboard Update (40%)</h5>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-info" role="progressbar"
                                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: 40%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                            <h5>Unanswered Messages (80%)</h5>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-info" role="progressbar"
                                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: 80%">
                                                    <span class="sr-only">80% Complete (success)</span>
                                                </div>
                                            </div>
                                            <h5>Product Review (60%)</h5>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-info" role="progressbar"
                                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: 60%">
                                                    <span class="sr-only">60% Complete (success)</span>
                                                </div>
                                            </div>
                                            <h5>Friend Requests (90%)</h5>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-info" role="progressbar"
                                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: 90%">
                                                    <span class="sr-only">90% Complete (success)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /col-md-8 -->
                                    </div>
                                    <!-- /row -->
                                </div>
                                <!-- /col-md-6 -->
                            </div>
                            <!-- /OVERVIEW -->
                        </div>
                        <!-- /tab-pane -->
                        <div id="contact" class="tab-pane">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="map"></div>
                                </div>
                                <!-- /col-md-6 -->
                                <div class="col-md-6 detailed">
                                    <h4>Location</h4>
                                    <div class="col-md-8 col-md-offset-2 mt">
                                        <p>
                                            Postal Address<br /> PO BOX 12988, Sutter Ave<br /> Brownsville, New York.
                                        </p>
                                        <br>
                                        <p>
                                            Headquarters<br /> 844 Sutter Ave,<br /> 9003, New York.
                                        </p>
                                    </div>
                                    <h4>Contacts</h4>
                                    <div class="col-md-8 col-md-offset-2 mt">
                                        <p>
                                            Phone: +33 4898-4303<br /> Cell: 48 4389-4393<br />
                                        </p>
                                        <br>
                                        <p>
                                            Email: hello@dashiotheme.com<br /> Skype: UseDashio<br /> Website:
                                            http://Alvarez.is
                                        </p>
                                    </div>
                                </div>
                                <!-- /col-md-6 -->
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /tab-pane -->
                        <div id="ubahPass" class="tab-pane">
                            <div class="row">
                                <div class="col-lg-6 col-lg-offset-2 detailed">
                                    <h4 class="mb">Ubah Kata Sandi</h4>
                                    <form role="form" class="form-horizontal" method="POST"
                                        action="{{ route('admin-pengguna.password', $Profile->user_id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Sandi Baru</label>
                                            <div class="input-group col-lg-6">
                                                <input type="password" name="password" placeholder="Masukkan Sandi Baru"
                                                    id="newSandi" class="form-control">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default" id="showSandi">
                                                        <i class="fas fa-eye" id="icon"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Ulang Sandi Baru</label>
                                            <div class="input-group col-lg-6">
                                                <input type="password" placeholder="Masukkan Ulang Sandi Baru"
                                                    id="confSandi" class="form-control">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default" id="showSandi2">
                                                        <i class="fas fa-eye" id="icon2"></i>
                                                    </button>
                                                </span>
                                            </div>
                                            <p class="text-danger" id="message" style="margin-left: 186px;"></p>
                                        </div>
                                        <div class="btn-group pull-right">
                                            <button type="submit" class="btn btn-theme03 btn-sm" id="simpan"
                                                disabled>
                                                <i class="fas fa-save"></i> Simpan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /col-lg-8 -->
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /tab-pane -->
                    </div>
                    <!-- /tab-content -->
                </div>
                <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
    </div>
@endsection
@section('js-additional')
    <script type="text/javascript" src="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>
    <script>
        function validateForm() {
            if ($('#foto').val() == "") {
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'Harap menambahkan foto terlebih dahulu',
                    showConfirmButton: false,
                    timer: 3000
                });
                return false;
            }
        }

        $('#showSandi').on('click', function() {
            const type = $('#newSandi').attr('type');
            if (type === 'password') {
                $('#newSandi').prop("type", "text");
                $('#icon').prop("class", "fas fa-eye-slash");
            } else {
                $('#newSandi').prop("type", "password");
                $('#icon').prop("class", "fas fa-eye");
            }
        });

        $('#showSandi2').on('click', function() {
            const type2 = $('#confSandi').attr('type');
            if (type2 === 'password') {
                $('#confSandi').prop("type", "text");
                $('#icon2').prop("class", "fas fa-eye-slash");
            } else {
                $('#confSandi').prop("type", "password");
                $('#icon2').prop("class", "fas fa-eye");
            }
        });

        $('#newSandi, #confSandi').on('keyup', function() {
            if ($('#newSandi').val() == $('#confSandi').val()) {
                $('#message').html('').css('color', 'green');
                $('#simpan').prop("disabled", false);
            } else
                $('#message').html('kata Sandi Tidak Sama').css('color', 'red');
        });
    </script>
@endsection
