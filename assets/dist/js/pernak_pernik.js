$(function(){

    if($.fn.DataTable.isDataTable('#tabelPernak')){
        return;
    }

    $('#tabelPernak').DataTable({
        responsive:true,
        autoWidth:false,
        order:[]
    });


    $(document).on('click','.tombol-hapus',function(e){

        e.preventDefault();

        let href=$(this).attr('href');


        Swal.fire({
            title:'Konfirmasi Hapus',
            text:'Apakah Anda yakin ingin menghapus data ini?',
            icon:'warning',
            showCancelButton:true,
            confirmButtonText:'Ya, Hapus',
            cancelButtonText:'Batal'
        }).then((result)=>{

            if(result.isConfirmed){
                window.location.href=href;
            }

        });

    });

});