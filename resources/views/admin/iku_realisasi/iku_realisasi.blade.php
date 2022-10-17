@extends('admin.index')
@section('title', 'IKU & Realisasi')
@section('menu-iku-realisasi', 'active')
@section('iku-realisasi', 'active')
@section('content')
<h3><a href="{{ route('iku-realisasi.index') }}"><i class="fas fa-book"></i> IKU & Realisasi BPKAD</a></h3>
<hr/>
<div class="row mt">
    <div class="col-lg-12">
        <div class="content-panel">
            <div class="row">
                <div class="col-lg-10">
                    <h4 class="title"><i class="fas fa-list"></i> Capaian Iku & Realisasi</h4>
                </div>
                <div class="col-lg-2">
                    <button type="button" class="btn btn-theme btn-sm" data-toggle="modal" data-target="#TambahData">
                        <i class="fas fa-plus"></i> Tambah Data
                    </button>
                    <div class="modal fade" id="TambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="modal-title"><i class="fas fa-plus-square"></i> Tambah IKU</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('iku-realisasi.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="sasaran_strategis">Sasaran Strategis</label>
                                        <textarea name="sasaran_strategis" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="indikator_kinerja">Indikator Kinerja</label>
                                        <textarea name="indikator_kinerja" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="penjelasan">Penjelasan <br/>(Formulasi Pengukuran, Tipe Perhitungan, Sumber Data, Alasan)</label>
                                        <textarea name="penjelasan" class="form-control"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="target">Target</label>
                                                <input type="text" name="target" class="form-control" onkeypress="isInputNumber(event)">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="target_tercapai">Target Tercapai</label>
                                                <input type="text" name="target_tercapai" class="form-control" onkeypress="isInputNumber(event)">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-theme04" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                                <button type="submit" class="btn btn-theme"><i class="fas fa-plus"></i> Tambah</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                </div>
            </div>
            <hr />
            <table class="table table-hover table-striped table-bordered auto">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Sasaran Strategis</td>
                        <td>Indikator Kinerja</td>
                        <td>Penjelasan <br/>(Formulasi Pengukuran, Tipe Perhitungan, Sumber Data, Alasan)</td>
                        <td>Target</td>
                        <td>Target Tercapai</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($IkuRealisasi as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->sasaran_strategis }}</td>
                        <td>{{ $data->indikator_kinerja }}</td>
                        <td>{{ $data->penjelasan }}</td>
                        <td>{{ $data->target }}%</td>
                        <td>{{ $data->target_tercapai }}%</td>
                        <td>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
