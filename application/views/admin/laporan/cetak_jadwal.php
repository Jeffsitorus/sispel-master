<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Jadwal Pelatihan</title>
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
  <h2>Data Jadwal Pelatihan Kerja SISPEL</h2>
  <table>
    <tr>
      <th>No</th>
      <th>Program Pelatihan</th>
      <th>Tanggal Pendaftaran</th>
      <th>Tutup Pendaftaran</th>
      <th>Tanggal Pelaksanaan</th>
      <th>Selesai Pelaksanaan</th>
      <th>Hari</th>
      <th>Lokasi</th>
    </tr>
    <?php foreach ($jadwal as $key => $jdl) : ?>
      <tr>
        <td><?= $key + 1; ?></td>
        <td><?= $jdl['judul_program']; ?></td>
        <td><?= tgl_indo($jdl['tgl_pendaftaran']); ?></td>
        <td><?= tgl_indo($jdl['tutup_pendaftaran']); ?></td>
        <td><?= tgl_indo($jdl['tgl_pelaksanaan']); ?></td>
        <td><?= tgl_indo($jdl['selesai_pelaksanaan']); ?></td>
        <td><?= $jdl['hari']; ?></td>
        <td><?= $jdl['lokasi']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body></html>