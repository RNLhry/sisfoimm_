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
    <h1>Data Komisariat</h1>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode Komisariat</th>
                <th>Nama komisariat</th>
                <th>Ketua Komisariat</th>
                <th>Media Sosial</th>
                <th>Asal Fakultas</th>
                <th>Logo</th>
               
                <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
            </tr>
        </thead>
        <tbody>
            <?php $no=1 ?>
            @foreach ($komisariat as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->kode_komisariat }}</td>
                    <td>{{ $item->nama_komisariat }}</td>
                    <td>{{ $item->kader->first()->nama }}</td>
                    <td>{{ $item->akun_media_sosial }}</td>
                    <td>{{ $item->asal_fakultas}}</td>
                    <td> @if($item->foto)
                        <img src="{{ url('images/' .$item->foto) }}" style="width: 50px; height: 50px;object-fit: cover; display: block;">   
                                                @else
                                                <img src="{{ asset('assets/img/product/avatar.png') }}"
                                                        alt="img" style="width: 50px; height: 50px;object-fit: cover; display: block;">
                                                </a>
                                                @endif</td>
                   
                    <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
