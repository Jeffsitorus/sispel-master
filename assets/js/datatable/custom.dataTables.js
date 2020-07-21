$('#tableProgram').DataTable({
  "language": {
    "lengthMenu": "Tampilkan _MENU_ baris per halaman",
    "zeroRecords": "Maaf - Data tidak ada yang ditemukan",
    "info": "Menampilkan halaman _PAGE_ of _PAGES_",
    "infoEmpty": "Data tidak tersedia",
    "infoFiltered": "(filtered from _MAX_ total records)"
  },
  "columnDefs": [
    {
      "targets": [-1, 6],
      "orderable": false,
      "searchable": false,
    },
  ]
});

$('#tableJadwal').DataTable({
  "language": {
    "lengthMenu": "Tampilkan _MENU_ baris per halaman",
    "zeroRecords": "Maaf - Data tidak ada yang ditemukan",
    "info": "Menampilkan halaman _PAGE_ of _PAGES_",
    "infoEmpty": "Data tidak tersedia",
    "infoFiltered": "(filtered from _MAX_ total records)"
  },
  "columnDefs": [
    {
      "targets": [-1, 5, 7],
      "orderable": false,
      "searchable": false,
    },
    {
      "targets": [-1],
      "className": "text-center",
    },
  ]
});

$('#tableInfo').DataTable({
  "language": {
    "lengthMenu": "Tampilkan _MENU_ baris per halaman",
    "zeroRecords": "Maaf - Data tidak ada yang ditemukan",
    "info": "Menampilkan halaman _PAGE_ of _PAGES_",
    "infoEmpty": "Data tidak tersedia",
    "infoFiltered": "(filtered from _MAX_ total records)"
  },
  "columnDefs": [
    {
      "targets": [-1, 2, 6],
      "orderable": false,
      "searchable": false,
    },
    {
      "targets": [-1],
      "className": "text-center",
    },
  ]
});

$('#tableKategoriInfo').DataTable({
  "language": {
    "lengthMenu": "Tampilkan _MENU_ baris per halaman",
    "zeroRecords": "Maaf - Data tidak ada yang ditemukan",
    "info": "Menampilkan halaman _PAGE_ of _PAGES_",
    "infoEmpty": "Data tidak tersedia",
    "infoFiltered": "(filtered from _MAX_ total records)"
  },
  "columnDefs": [
    {
      "targets": [-1, 2],
      "orderable": false,
      "searchable": false,
    },
    {
      "targets": [-1],
      "className": "text-center",
    },
  ]
});

$('#tablePerusahaan').DataTable({
  "language": {
    "lengthMenu": "Tampilkan _MENU_ baris per halaman",
    "zeroRecords": "Maaf - Data tidak ada yang ditemukan",
    "info": "Menampilkan halaman _PAGE_ of _PAGES_",
    "infoEmpty": "Data tidak tersedia",
    "infoFiltered": "(filtered from _MAX_ total records)"
  },
  "columnDefs": [
    {
      "targets": [-1],
      "orderable": false,
      "searchable": false,
    },
    {
      "targets": [-1],
      "className": "text-center",
    },
  ]
});

$('#tablePeserta').DataTable({
  "language": {
    "lengthMenu": "Tampilkan _MENU_ baris per halaman",
    "zeroRecords": "Maaf - Data tidak ada yang ditemukan",
    "info": "Menampilkan halaman _PAGE_ of _PAGES_",
    "infoEmpty": "Data tidak tersedia",
    "infoFiltered": "(filtered from _MAX_ total records)"
  },
  "columnDefs": [
    {
      "targets": [-1, 4],
      "orderable": false,
      "searchable": false,
    },
    {
      "targets": [-1],
      "className": "text-center",
    },
  ]
});

$('#tableSubmenu').DataTable({
  "language": {
    "lengthMenu": "Tampilkan _MENU_ baris per halaman",
    "zeroRecords": "Maaf - Data tidak ada yang ditemukan",
    "info": "Menampilkan halaman _PAGE_ of _PAGES_",
    "infoEmpty": "Data tidak tersedia",
    "infoFiltered": "(filtered from _MAX_ total records)"
  },
  "columnDefs": [
    {
      "targets": [-1, 3, 4, 5,],
      "orderable": false,
      "searchable": false,
    },
    {
      "targets": [-1],
      "className": "text-center",
    },
  ]
});