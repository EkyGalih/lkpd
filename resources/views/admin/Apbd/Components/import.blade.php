<div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document" style="margin-top: 14%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-upload"></i> Import APBD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('apbd.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <span class="btn btn-theme02 btn-file">
                            <span class="fileupload-new"><i class="fas fa-paperclip"></i> Pilih
                                File</span>
                            <span class="fileupload-exists"><i class="fas fa-undo"></i> Ubah</span>
                            <input type="file" class="default" name="data-apbd">
                        </span>
                        <span class="fileupload-preview" style="margin-left: 5px;"></span>
                        <a href="#" class="close fileupload-exists" data-dismiss="fileupload"
                            style="float: none; margin-left: 5px;"></a>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-theme04" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-theme">Upload</button>
            </div>
            </form>
        </div>
    </div>
</div>
