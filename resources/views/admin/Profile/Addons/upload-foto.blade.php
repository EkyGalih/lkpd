<div class="modal fade" id="ModalFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-8">
                        <h5 class="modal-title"><i class="fas fa-plus-square"></i> Upload Foto</h5>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin-pengguna.foto', $Profile->user_id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                    @csrf
                    @method('PUT')
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                            <img src="{{ asset('images/no-image.PNG') }}" alt="" />
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail"
                            style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <span class="btn btn-theme02 btn-file">
                                <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Foto</span>
                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Ganti</span>
                                <input type="file" id="foto" name="foto" class="default" />
                            </span>
                            <a href="#" class="btn btn-theme04 fileupload-exists"
                                data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Hapus</a>
                        </div>
                    </div>
                    <span class="label label-info">NOTE!</span>
                    <span>
                        Hanya File Extensi PNG, JPG dan JPEG yang berukuran MAX 200 KB di izinkan
                    </span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-theme04" data-dismiss="modal"><i class="fas fa-times"></i>
                    Batal</button>
                <button type="submit" class="btn btn-theme03"><i class="fas fa-save"></i>
                    Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
