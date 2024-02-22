<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Alamat</th>
            <th>Nomor telepon</th>
        </tr>
        <?php $no = 1;
        foreach ($siswa as $ssw) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $ssw->nama_siswa ?></td>
                <td><?= $ssw->kelas_siswa ?></td>
                <td><?= $ssw->alamat_siswa ?></td>
                <td><?= $ssw->telp ?></td>
            </tr>
        <?php endforeach ?>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>