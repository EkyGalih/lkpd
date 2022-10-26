<div class="modal fade" id="modalShow{{ $loop->iteration }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document" style="margin-top: 14%;">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fas fa-envelope"></i> Detail Undangan
                    {{ $jadwal->jenis_acara }}</h3>
            </div>
            <div class="modal-body">
                <h4>
                    <strong style="font-size: 20px;">{{ $jadwal->acara_dari }}</strong>
                    <span style="font-size: 14px; margin-bottom: 10px;">{{ "<Undangan ".$jadwal->jenis_acara .">"}}</span>
                </h4>
                <p style="margin-left: 10px; font-size: 12px;">to {{ $jadwal->user->nama }}</p>
                <hr/>
                <p>
                    {{ $jadwal->redaksi_acara }}
                    <ul>
                        <li>Jadwal : <u>{{ App\Helper\HelperFunction::getDate($jadwal->tgl_acara) }} - {{ App\Helper\HelperFunction::getTime($jadwal->jam_acara) }}</u></li>
                        <li>Lokasi : <u>{{ $jadwal->lokasi_acara }}</u></li>
                    </ul>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-theme04"
                    data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
