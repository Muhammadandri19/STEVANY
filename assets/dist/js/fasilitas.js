$(function () {

    // ==========================================
    // DATATABLE
    // ==========================================

    $('#tabelFasilitas').DataTable({
        responsive: true,
        autoWidth: false,
        order: []
    });


    // ==========================================
    // KONFIRMASI HAPUS
    // ==========================================

    $(document).on('click', '.tombol-hapus', function (e) {

        e.preventDefault();

        let href = $(this).attr('href');

        Swal.fire({

            title: 'Konfirmasi Hapus',

            html: `
                <p>Apakah Anda yakin ingin menghapus data fasilitas ini?</p>
                <small class="text-danger">
                    Data yang dihapus tidak dapat dikembalikan.
                </small>
            `,

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#dc3545',

            cancelButtonColor: '#6c757d',

            confirmButtonText: '<i class="fas fa-trash"></i> Ya, Hapus',

            cancelButtonText: '<i class="fas fa-times"></i> Batal',

            reverseButtons: true,

            allowOutsideClick: false

        }).then((result) => {

            if (result.isConfirmed) {

                window.location.href = href;

            }

        });

    });


    // ==========================================
    // PREVIEW FOTO TAMBAH
    // ==========================================

    $('#fotoTambah').change(function () {

        let file = this.files[0];

        if (file) {

            let reader = new FileReader();

            reader.onload = function (e) {

                $('#previewTambah')
                    .attr('src', e.target.result)
                    .show();

            }

            reader.readAsDataURL(file);

        }

    });



    // ==========================================
    // PREVIEW FOTO EDIT
    // ==========================================

    $(document).on('change', '.fotoEdit', function () {

        let id = $(this).data('id');

        let file = this.files[0];

        if (file) {

            let reader = new FileReader();

            reader.onload = function (e) {

                $('#previewEdit' + id)
                    .attr('src', e.target.result);

            }

            reader.readAsDataURL(file);

        }

    });


});