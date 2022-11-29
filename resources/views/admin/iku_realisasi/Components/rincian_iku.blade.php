@extends('admin.index')
@section('title', 'Rincian Iku Realisasi')
@section('menu-iku-realisasi', 'active')
@section('rincian-iku', 'active')
@section('css-additional')
    <link rel="stylesheet" href="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.css') }}">
@endsection
@section('content')
    <h3><a href="{{ route('rincian-iku-admin') }}"><i class="fas fa-info"></i> Rincian Iku Realisasi</a></h3>
    <hr />
    <div class="row mt">
        <div class="col-lg-11"></div>
        <div class="col-lg-1">
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ModalImport">
                <i class="fas fa-upload"></i> Import
            </button>
            @include('admin.iku_realisasi.Addons.RincianIku.import')
        </div><br /><br />
        <div class="col-lg-12">
            <div class="content-panel">
                @foreach ($KegiatanIku as $kegiatan)
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse{{ $loop->iteration }}" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        <i class="more-less fas fa-plus"></i> {{ $kegiatan->Divisi->nama_divisi }} [{{ Helpers::GetPersentase($kegiatan->kode_kegiatan) }} %]
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{ $loop->iteration }}" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <ol style="list-style-type:upper-roman">
                                        <li style="font-size: 18px; color: #000000;">
                                            <strong>{{ $kegiatan->nama_kegiatan }}</strong>  <sup>[ <strong class="label label-primary">KEGIATAN</strong> ]</sup>
                                        </li>
                                        @php $SubKegiatan = Helpers::GetSubKegiatan($kegiatan->kode_kegiatan) @endphp
                                        <ol type="a" start="a">
                                            @foreach ($SubKegiatan as $item)
                                                <li style="font-size: 16px; color: #161515;">{{ $item->sub_kegiatan }}
                                                   <sup>[ <strong class="label label-info">SUB KEGIATAN</strong> ]</sup></li>
                                                <ol style="list-style-type: inherit">
                                                    <li style="color: red; font-size: 14px;">{{ $item->indikator_kinerja }}
                                                    </li>
                                                    <li style="color: red; font-size: 14px;">{{ $item->target_kinerja }}
                                                        <button type="button" class="btn btn-link btn-xs" data-toggle="modal" data-target="#ModalUpload{{ $loop->iteration }}">
                                                            Unggah
                                                       </button>
                                                       <div class="modal fade" id="ModalUpload{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="modalimport" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <div class="row">
                                                                        <div class="col-md-8">
                                                                            <h5 class="modal-title"><i class="fas fa-upload"></i> Upload Bukti Pekerjaan</h5>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('rincian-iku-admin.import') }}" method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <input type="hidden" name="sub_kegiatan_id" value="{{ $item->id }}">
                                                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                            <span class="btn btn-theme02 btn-file">
                                                                                <span class="fileupload-new"><i class="fas fa-paperclip"></i> Pilih
                                                                                    File</span>
                                                                                <span class="fileupload-exists"><i class="fas fa-undo"></i> Ubah</span>
                                                                                <input type="file" class="default" name="file-iku">
                                                                            </span>
                                                                            <span class="fileupload-preview" style="margin-left: 5px;"></span>
                                                                            <a href="#" class="close fileupload-exists" data-dismiss="fileupload"
                                                                                style="float: none; margin-left: 5px;"></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-theme">Upload</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    </li>
                                                </ol>
                                                </table>
                                            @endforeach
                                        </ol>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('js-additional')
    <script src="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>
    <script>
        function toggleIcon(e) {
            $(e.target)
                .prev('.panel-heading')
                .find(".more-less")
                .toggleClass('fas fa-plus fas fa-minus');
        }
        $('.panel-group').on('hidden.bs.collapse', toggleIcon);
        $('.panel-group').on('shown.bs.collapse', toggleIcon);
    </script>
@endsection
