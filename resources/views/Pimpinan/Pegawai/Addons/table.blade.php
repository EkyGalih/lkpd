<div class="table-responsive">
    @foreach ($Pegawai as $user)
        <div class="col-md-3 col-sm-6">
            <div class="our-team">
                <div class="pic">
                    <img src="{{ $user->foto == null ? asset('profile/default/user.png') : asset($user->foto) }}" alt="Image Profile">
                </div>
                <div class="team-content">
                    <h3 class="title">{{ $user->nama }}</h3>
                    <span class="post">{{ Helpers::NIP($user->Pegawai->nip ?? '-') }}</span>
                </div>
                <ul class="social">
                    <li><a href="#" class="fas fa-eye" data-toggle="modal" data-target="#ModalView{{ $loop->iteration }}"> Detail</a></li>
                    {{-- <li><a href="" class="fab fa-facebook-f"></a></li>
                    <li><a href="" class="fab fa-instagram"></a></li>
                    <li><a href="" class="fab fa-linkedin-in"></a></li>
                    <li><a href="" class="fab fa-twitter"></a></li> --}}
                </ul>
            </div>
        </div>
        @include('Pimpinan.Pegawai.Addons.detail')
    @endforeach
</div>
