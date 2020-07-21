<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Info Lowongan SISPEL</title>
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
  <h2>Data Info Lowongan Kerja SISPEL</h2>
  <table>
    <tr>
      <th>No</th>
      <th>Judul Info</th>
      <th>Kategori Lowongan</th>
      <th>Tanggal Mulai</th>
      <th>Tanggal Selesai</th>
      <th>Status</th>
    </tr>
    <?php foreach ($info as $key => $in) : ?>
      <tr>
        <td><?= $key + 1; ?></td>
        <td><?= $in['judul_info']; ?></td>
        <td><?= $in['keterangan']; ?></td>
        <td><?= tgl_indo($in['tgl_mulai']); ?></td>
        <td><?= tgl_indo($in['tgl_selesai']); ?></td>
        <td>
          <?php if($in['status']) : ?>
            <span>Dipublikasikan</span>
          <?php else: ?>
            <span>Tidak Dipublikasikan</span>
          <?php endif; ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body></html>