<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Peserta Pelatihan</title>
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
      margin-top: -10px;
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
  <h2>Data Peserta Pelatihan Kerja SISPEL</h2>
  <table>
    <tr>
      <th>No</th>
      <th>Nama Lengkap</th>
      <th>NO KTP</th>
      <th>Jenis Kelamin</th>
      <th>Tanggal Lahir</th>
      <th>Email</th>
      <th>No Telepon</th>
      <th>Alamat</th>
    </tr>
    <?php foreach ($peserta as $key => $ps) : ?>
      <tr>
        <td><?= $key + 1; ?></td>
        <td><?= $ps['nama']; ?></td>
        <td><?= $ps['no_ktp']; ?></td>
        <td><?= $ps['jk']; ?></td>
        <td><?= tgl_indo($ps['tgl_lahir']); ?></td>
        <td><?= $ps['email']; ?></td>
        <td><?= $ps['no_hp']; ?></td>
        <td><?= $ps['alamat']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body></html>