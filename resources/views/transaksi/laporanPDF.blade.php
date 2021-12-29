<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
</head>
<body>
    <H4>Laporan Transaksi Peminjaman Buku</H4>

    <table width="100%" border="1px solid">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach ($pdf as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->anggota->nis }}</td>
                    <td>{{ $data->anggota->nama_anggota }}</td>
                    <td>{{ $data->buku->judul_buku }}</td>
                    <td>{{ $data->tanggal_pinjam }}</td>
                    <td>
                        @if ($data->status == 1)
                            Sudah Mengembalikan
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
