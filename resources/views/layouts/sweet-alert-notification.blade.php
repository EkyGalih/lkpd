@if ($message = Session::get('success'))
<script>
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '{{ $message }}',
        showConfirmButton: false,
        timer: 3000
    });
</script>
@endif

@if ($message = Session::get('info'))
<script>
    Swal.fire({
        position: 'top-end',
        title: 'Informasi!',
        text: '{{$message}}',
        icon: "info",
        showConfirmButton: false,
        timer: 3000
    });
</script>
@endif

@if ($message = Session::get('warning'))
<script>
    Swal.fire({
        position: 'top-end',
        icon: 'warning',
        title: 'Oopss...',
        text: '{{ $message }}',
        showConfirmButton: false,
        timer: 3000
    })
</script>
@endif

@if ($message = Session::get('error'))
<script>
    Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Terjadi Kesalahan!',
        text: '{{ $message }}'
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif


<script>
    function deleteData(url){
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data yang dihapus tidak akan bisa kembali!",
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            showCancelButton: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            } else {
                swal.close();
            }
        })
    }

    function isInputNumber(event) {
        var char = String.fromCharCode(event.which);
        if (!(/[0-9]/).test(char)) {
            event.preventDefault();
        }
    }
</script>
