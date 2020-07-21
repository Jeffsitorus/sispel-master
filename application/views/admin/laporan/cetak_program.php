<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Program Pelatihan</title>
  <style>
    body, table {
      margin: 10px auto;
    }
    h1,h2 {
      text-align: center;
    }
    h2 {
      margin-top: -10px;
    }
    table {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
    }
    table> th {
      font-weight: bold;
      font-size: 14px;
    } 
    table >td {
      font-size: 12px;
      font-weight: 400;
    }
    table, tr, th, td {
      padding: 5px;
      border: 1px solid #333;
    }
  </style>
</head><body>
  <h1>SISPEL | Sistem Informasi Pelatihan Kerja</h1>
  <h2>Data Program Pelatihan Kerja SISPEL</h2>
  <table>
    <tr>
      <th>No</th>
      <th>Nama Program</th>
      <th>Kode Program</th>
      <th>Kategori Pelatihan</th>
      <th>Lama Pelaksanaan</th>
      <th>Batas Kuota</th>
      <th>Kategori Peserta</th>
    </tr>
    <?php foreach($pelatihan as $key => $pel) : ?>
      <tr>
        <td><?= $key+1; ?></td>
        <td><?= $pel['judul_program']; ?></td>
        <td><?= $pel['kode_program']; ?></td>
        <td><?= $pel['keterangan']; ?></td>
        <td><?= $pel['lama_pelaksanaan'] ?> hari</td>
        <td><?= $pel['batas_kuota']; ?> orang</td>
        <td><?= $pel['nama_kategori']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body></html>