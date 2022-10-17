<script>
    function getKodeRekening() {
    var kode_rekening = $('#kode_rekening').val();
    $.ajax({
        type: 'GET',
        async: true,
        url: '{{ url('api/kode-rekening/getRekening') }}/' + kode_rekening,
        dataType: 'json',
        success: function(data) {
            var uraian = "<option>Pilih</option>";

            for (a = 0; a < data.length; a++) {
                if (data[a].kode_rekening.length == 3)
                {
                    uraian += ["<option value='"+data[a].kode_rekening+"'>["+data[a].kode_rekening+"] "+data[a].nama_rekening+"</option>"];
                }
            }
            $('#kode_rekening2').html("Pilih");
            $('#kode_rekening2').append(uraian);
            $('#nama_rekening').val(data[0].nama_rekening);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function getSubKode() {
    var uraian = $('#kode_rekening2').val();
    $.ajax({
        type: 'GET',
        async: true,
        url: '{{ url('api/kode-rekening/getRekening') }}/' + uraian,
        dataType: 'json',
        success: function(data) {
            var sub_uraian = "<option>Pilih</option>";

            for (a = 0; a < data.length; a++) {
                if (data[a].kode_rekening.length == 6)
                {
                    sub_uraian += ["<option value='"+data[a].kode_rekening+"'>["+data[a].kode_rekening+"] "+data[a].nama_rekening+"</option>"];
                }
            }
            $('#kode_rekening3').html("Pilih");
            $('#kode_rekening3').append(sub_uraian);
            $('#uraian').val(data[0].nama_rekening);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function getSubUraian() {
    var sub_uraian = $('#kode_rekening3').val();
    $.ajax({
        type: 'GET',
        async: true,
        url: '{{ url('api/kode-rekening/getSubRekening') }}/' + sub_uraian,
        dataType: 'json',
        success: function(data) {
            $('#sub_uraian').val(data['nama_rekening']);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

</script>
