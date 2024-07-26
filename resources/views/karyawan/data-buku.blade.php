<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku | Perpustakaan lampung</title>
    <!-- <link rel="stylesheet" href="/css/<NAMA CSS>.css"> -->
    @include('view.broilerplate')
</head>


<body style="background-color: #E8EDF2">
    @include('view.navbar')
    @include('view.sidebar')
    <!-- main content -->
    <div id="mainContent" class="main-content overflow-auto ">
        <div class="card d-flex flex-row p-3 mb-3">
            <a class="btn btn-primary m-2" href="{{ route('tambah-buku') }}">Tambah</a>

            <div class="input-group m-2">
                <input type="text" class="form-control" placeholder="Cari Judul Buku, ISBN, Penerbit"
                    aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-secondary" type="button" id="button-addon2">Search</button>
            </div>


        </div>
        <div class="card">

            <table class="table w-100">
                <thead>
                    <tr>
                        {{-- <th scope="col">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </th> --}}
                        <th scope="col">Cover Buku</th>
                        <th scope="col">ISBN</th>
                        <th scope="col" style="width: 25%">Judul Buku</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col" style="width: 0">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($container as $data)
                    <tr>
                        {{-- <th scope="row">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </th> --}}
                        <td><img class="cover-buku" src="/storage/cover_buku/{{ $data->ISBN }}.jpeg" /></td>
                        <td>{{ $data->ISBN }}</td>
                        <td>{{ $data->judul }}</td>
                        <td>{{ $data->jumlah }}</td>
                        <td>{{ $data->tahun }}</td>
                        <td>{{ $data->penerbit }}</td>
                        <td>{{ $data->pengarang }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('hapus-buku', ['id'=>$data->id]) }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger rounded-start delete-button" data-id="0">Hapus</a>
                                <a href="{{ route('edit-buku', ['id'=>$data->id]) }}" class="btn btn-secondary rounded-end" data-id="0">Edit</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <style>
                .cover-buku {
                    width: 100px;
                    height: 160px;
                    object-fit: conver;
                }
            </style>
        </div>
    </div>
    <!-- main content -->
</body>

</html>