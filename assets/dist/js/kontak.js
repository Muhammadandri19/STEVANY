$(function () {

    $('#tabelKontak').DataTable({
        responsive: true,
        autoWidth: false,
        order: []
    });

    $(document).on('click', '.tombol-hapus', function (e) {

        e.preventDefault();

        let href = $(this).attr('href');

        Swal.fire({
            title: 'Konfirmasi Hapus',
            html: `
                <p>Apakah Anda yakin ingin menghapus pesan kontak ini?</p>
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

});