<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333;
            margin: 0;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            page-break-inside: auto;
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        th, td {
            page-break-inside: avoid;
            page-break-after: auto;
            border: 1px solid black;
            padding: 8px 12px;
            text-align: left;
            color: black;
        }
        
        .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .col {
            width: 50%; /* Adjust as needed */
        }

    </style>
</head>
<body>
    <h2><?= $title; ?></h2>
    <table>
        <thead>
            <tr>
                <th style="width: 5px;">No.</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th style="width: 65px;">Tanggal Pinjam</th>
                <th style="width: 65px;">Tanggal Wajib Kembali</th>
                <th style="width: 65px;">Tanggal Kembali</th>
                <th>Status</th>
                <th style="width: 80px;">Denda</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $i = 1;
                $total_denda = 0;
             ?>
            <?php foreach ($transaksi as $dt): ?>
                <?php $total_denda += $dt['denda']; ?>
                <tr>
                    <td><?= $i++; ?>.</td>
                    <td><?= $dt['nama_anggota']; ?></td>
                    <td><?= $dt['judul_buku']; ?></td>
                    <td><?= date('d-m-Y, H:i', strtotime($dt['tanggal_pinjam'])); ?></td>
                    <td><?= date('d-m-Y, H:i', strtotime($dt['tanggal_wajib_kembali'])); ?></td>
                    <?php if ($dt['tanggal_kembali'] != null): ?>
                        <td><?= date('d-m-Y, H:i', strtotime($dt['tanggal_kembali'])); ?></td>
                    <?php else: ?>
                        <td class="align-middle">-</td>
                    <?php endif ?>
                    <td><?= ucwords($dt['status']); ?></td>
                    <td>Rp. <?= number_format($dt['denda']); ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="7">Total Denda:</th>
                <th>Rp. <?= number_format($total_denda); ?></th>
            </tr>
        </tfoot>
    </table>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
