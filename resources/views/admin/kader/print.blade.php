<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Kader</title>
    <style>
        /* Tambahkan gaya cetak yang sesuai di sini */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Data Kader</h1>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Angkatan</th>
                <th>Tanggal Lahir</th>
                <th>Jurusan</th>
                <th>Jenis Kelamin</th>
                <th>No. Telp</th>
                <th>Alamat</th>
                <th>Nama Bapak</th>
                <th>Nama Ibu</th>
                <th>Tahun Berkader</th>
                <th>Jabatan</th>
                <th>Komisariat</th>
                <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
            </tr>
        </thead>
        <tbody>
            <?php $no=1 ?>
            @foreach ($kader as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->nim }}</td>
                    <td>{{ $item->angkatan }}</td>
                    <td>{{ $item->tempat_tanggal_lahir }}</td>
                    <td>{{ $item->jurusan->nama }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->no_telp }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->nama_bapak }}</td>
                    <td>{{ $item->nama_ibu }}</td>
                    <td>{{ $item->tahun_berkader }}</td>
                    <td>{{ $item->jabatan }}</td>
                    <td>{{ $item->komisariat->nama_komisariat }}</td>
                    <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
