<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan | Perpustakaan lampung</title>
    <!-- <link rel="stylesheet" href="/css/<NAMA CSS>.css"> -->
    @include('view.broilerplate')
</head>


<body>
    @include('view.navbar')
    @include('view.sidebar')
    <!-- main content -->
    <div id="mainContent" class="main-content overflow-auto ">
        <div class="card d-flex flex-row p-3 mb-3">
            <a class="btn btn-primary m-2" href="{{ route('tambah-karyawan') }}">Tambah</a>

            <div class="input-group m-2">
                <input type="text" class="form-control" placeholder="Cari berdasarkan nama"
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
                        <th scope="col" width="100%">Nama</th>
                        <th scope="col" width="100%">Email</th>
                        <th scope="col" width="100%">No. Telepon</th>
                        <th scope="col" style="width: 0">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data as $d)
                    
                    <tr>
                        {{-- <th scope="row"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </th> --}}
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->email }}</td>
                        <td>{{ $d->noTelp }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="data-karyawan/hapus-karyawan/{{ $d->id }}" class="btn btn-danger rounded-start delete-button" data-id="0">Hapus</a>
                                <a href="data-karyawan/reset-karyawan/{{ $d->id }}" class="btn btn-secondary rounded-end reset-button" data-id="0">Reset</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <script>
            document.querySelectorAll('.delete-button').forEach(element => {
                element.addEventListener('click', (s, e) => {
                    alert('Anda yakin ingin menghapus data ini?');
                });
            });
            document.querySelectorAll('.reset-button').forEach(element => {
                element.addEventListener('click', (s, e) => {
                    alert('Anda yakin ingin mereset password akun ini?');
                });
            });
        </script>
    </div>
    <!-- main content -->
</body>

</html>