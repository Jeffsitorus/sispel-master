const flashData = $('.flash-data').data('flashdata');
if (flashData) {
  Swal.fire({
    position: 'top-end',
    title: 'Berhasil',
    text: flashData,
    icon: 'success',
    showConfirmButton: false,
    showCancelButton: true,
    cancelButtonColor: '#3085d6',
    cancelButtonText: 'Ok',
    width: '26rem',
  });
}

// delete data 
$('.btn-delete').on('click', function (e) {
  e.preventDefault();
  const href = $(this).attr('href');
  Swal.fire({
    title: 'Warning!',
    text: 'Yakin menghapus data?',
    icon: 'warning',
    confirmButtonColor: '#3085d6',
    showCancelButton: true,
    cancelButtonColor: '#d33',
    cancelButtonText: 'Batal',
    confirmButtonText: 'Ya!',
  }).then((result) => {
    if (result.value) {
      document.location.href = href;
    } else {
      Swal.fire(
        'Dibatalkan!',
        'Data batal dihapus.',
        'info',
      )
    }
  });
});

"use strict"