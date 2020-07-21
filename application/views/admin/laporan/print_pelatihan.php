<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Pendaftar Pelatihan Kerja SISPEL</title>
  <style>
    body,
    table {
      margin: 10px auto;
    }

    h1,
    h2 {
      text-align: center;
    }

    h2 {
      margin-top: -7px;
    }

    table {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
    }

    table>th {
      font-weight: bold;
      font-size: 14px;
    }

    table>td {
      font-size: 10px;
      font-weight: 400;
    }

    table,
    tr,
    th,
    td {
      padding: 5px;
      border: 1px solid #333;
    }
  </style>
</head><body>
  <h1>SISPEL | Sistem Informasi Pelatihan Kerja</h1>
  <h2>Data Pendaftar Pelatihan Kerja SISPEL</h2>
  <table>
    <tr>
      <th>No</th>
      <th>No Pelatihan</th>
      <th>Nama Peserta</th>
      <th>Email</th>
      <th>Jenis Kelamin</th>
      <th>Tanggal Daftar</th>
      <th>Kode Program</th>
      <th>Pelatihan yang Diikuti</th>
    </tr>
    <?php foreach ($pelatihan as $key => $pel) : ?>
      <tr>
        <td><?= $key + 1; ?></td>
        <td><?= $pel['no_pelatihan']; ?></td>
        <td><?= $pel['nama']; ?></td>
        <td><?= $pel['email']; ?></td>
        <td><?= $pel['jk']; ?></td>
        <td><?= tgl_indo($pel['tgl_pendaftaran']); ?></td>
        <td><?= $pel['kode_program']; ?></td>
        <td><?= $pel['judul_program']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body></html>