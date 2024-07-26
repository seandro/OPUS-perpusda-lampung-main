<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Karyawan | Perpustakaan lampung</title>
    <link rel="stylesheet" href="/css/main.css">
    @include('view.broilerplate')
</head>


<body style="background-color: #E8EDF2">
    @include('view.navbar')
    @include('view.sidebar')
    <!-- main content -->
    <div id="mainContent" class="main-content overflow-auto ">
        <div class="page-link">
            <a href="{{route('data-karyawan')}}">Data Karyawan</a>
            <a>></a>
            <a>Tambah Karyawan</a>
        </div>

        <div class="card p-4">
            <h4>Tambah Karyawan</h4>
            <form method="POST" action="{{ route('tambah-karyawan') }}" enctype="multipart/form-data">
                @csrf
                <div class="d-flex flex-row flex-wrap">
                    <table class="flex-fill main-table">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td><input name="nama" required type="text" class="form-control" placeholder="Masukan nama lengkap" /></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input name="email" required type="email" class="form-control"
                                        placeholder="Masukan Email"></td>
                            </tr>
                            <tr>
                                <td>No .hp</td>
                                <td><input name="noTelp" required type="text" class="form-control" placeholder="Masukan no hand phone" /></td>
                            </tr>
                            <tr>
                                <td>Kata sandi</td>
                                <td><input name="password" required type="password" class="form-control" placeholder="Masukan kata sandi" /></td>
                            </tr>
                        </tbody>
                    </table>
                    <style>
                        table {
                            border-collapse: separate;
                            border-spacing: 0 15px;
                            row-gap: 32px;
                        }
                    </style>
                    {{-- <div class="m-3 d-flex flex-column">
                        <div class="d-flex flex-column align-items-center justify-content-center" style="min-width: 225px; height: 400px; background-color: #e0e0e0; user-select: none">
                            <p>Foto 16:9</p>
                            <p>1270x720</p>
                        </div>
                        <div>
                            <button class="btn btn-primary mt-2">Upload Foto</button>
                        </div>
                    </div> --}}
                </div>

                <div>
                    <input type="submit" style="width: 128px" class="btn btn-primary" value="Simpan"></input>
                    <a style="width: 128px" class="btn btn-secondary" href="{{route('data-karyawan')}}">Batal</a>
                </div>
            </form>
        </div>
    </div>
    <!-- main content -->
</body>

</html>