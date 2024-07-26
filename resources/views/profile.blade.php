<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan lampung</title>
    <link rel="stylesheet" href="/css/profile.css">
    <link rel="stylesheet" href="/css/main.css">
    @include('view.broilerplate')
</head>


<body style="background-color: #E8EDF2">
    @include('view.navbar')
    @include('view.sidebar')
    <!-- main content -->
    <div id="mainContent" class="main-content overflow-auto ">
        <div class="header">
            <h4>Biodata Profile</h4>
        </div>
        <div class="card p-4">

            @if ($success != null)
                <div class="alert alert-success" role="alert">
                    {{ $success }}
                </div>
            @endif
            @if ($error != null)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endif

            <form action="{{ route('profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-flex flex-row flex-wrap">
                    <table class="flex-fill main-table">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td><input name="nama" required type="text" class="form-control"
                                        placeholder="Masukan nama lengkap" value="{{ $data->nama }}" /></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input name="email" required type="email" class="form-control" value="{{ $data->email }}"
                                        placeholder="Masukan Email"></td>
                            </tr>
                            <tr>
                                <td>No .hp</td>
                                <td><input name="noTelp" required type="text" class="form-control"
                                        placeholder="Masukan no hand phone" value="{{ $data->noTelp }}" /></td>
                            </tr>
                            <tr>
                                <td>Kata sandi</td>
                                <td><a class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Ganti Password</a></td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- <div class="m-3 d-flex flex-column">
                        <div class="d-flex flex-column align-items-center justify-content-center"
                            style="min-width: 225px; height: 400px; background-color: #e0e0e0; user-select: none">
                            <p>Foto 16:9</p>
                            <p>1270x720</p>
                        </div>
                        <div>
                            <button class="btn btn-primary mt-2">Upload Foto</button>
                        </div>
                    </div> --}}
                </div>

                <div>
                    <input type="submit" style="width: 128px" class="btn btn-primary" valaue="Simpan"></input>
                    <a style="width: 128px" class="btn btn-secondary" href="{{ route('index') }}">Batal</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="{{ route('ganti-password') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ganti Password</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Password Baru</span>
                                <input name="newpass" type="password" class="form-control"
                                    aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Ketik Ulang</span>
                                <input name="confirm" type="password" class="form-control"
                                    aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Ganti Password"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- main content -->
</body>

</html>
