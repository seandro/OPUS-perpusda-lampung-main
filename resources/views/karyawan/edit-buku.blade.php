<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan lampung</title>
    <link rel="stylesheet" href="/css/main.css">
    @include('view.broilerplate')
</head>


<body style="background-color: #E8EDF2">
    @include('view.navbar')
    @include('view.sidebar')
    <!-- main content -->
    <div id="mainContent" class="main-content overflow-auto ">
        <div class="page-link">
            <a href="{{ route('data-buku') }}">Data Buku</a>
            <a>></a>
            <a>Edit Buku</a>
        </div>

        <div class="card p-4">
            <h4>Edit Buku</h4>
            <form action="{{ route('edit-buku', ['id'=>$data->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-flex flex-row flex-wrap">
                    <table class="flex-fill main-table">
                        <tbody>
                            <tr>
                                <td>ISBN</td>
                                <td><input name="ISBN" required type="text" class="form-control"
                                        value="{{ $data->ISBN }}" placeholder="Nomor ISBN" /></td>
                            </tr>
                            <tr>
                                <td>Judul Buku</td>
                                <td>
                                    <textarea name="judul" required type="text" class="form-control" placeholder="Judul Buku">{{ $data->judul }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Pengarang</td>
                                <td><input name="pengarang" required type="text" class="form-control"
                                        placeholder="Pengarang" value="{{ $data->pengarang }}" /></td>
                            </tr>
                            <tr>
                                <td>Penerbit</td>
                                <td><input name="penerbit" required type="text" class="form-control"
                                        placeholder="Penerbit" value="{{ $data->penerbit }}" /></td>
                            </tr>
                            <tr>
                                <td>Tahun Terbit</td>
                                <td><input name="tahunTerbit" required type="number" class="form-control"
                                        placeholder="Tahun Terbit" value="{{ $data->tahun }}" />
                                </td>
                            </tr>
                            <tr>
                                    <td>Jumlah</td>
                                    <td><input name="jumlah" required type="number" class="form-control"
                                            placeholder="Jumlah Buku..." value="{{ $data->jumlah }}"/>
                                    </td>
                                </tr>
                            <tr>
                                <td>No. Klas</td>
                                <td>
                                <input name="subjek" required type="text" class="form-control" placeholder="No. Klas" />
                                    <!-- <select name="subjek" class="form-select" aria-label="Default select example">
                                        <option value="0" {{ $data->subjek == 0 ? 'selected' : '' }}>Fiksi</option>
                                        <option value="1" {{ $data->subjek == 1 ? 'selected' : '' }}>Non-Fiksi
                                        </option> -->
                                </td>
                            </tr>
                            <tr>
                                <td>Koleksi</td>
                                <td>
                                    <select name="koleksi" class="form-select" aria-label="Default select example">
                                        <option value="4" {{ $data->koleksi == 4 ? 'selected' : '' }}>Umum</option>
                                        <option value="1" {{ $data->koleksi == 1 ? 'selected' : '' }}>Deposit
                                        </option>
                                        <option value="2" {{ $data->koleksi == 2 ? 'selected' : '' }}>Referensi
                                        </option>
                                        <option value="3" {{ $data->koleksi == 3 ? 'selected' : '' }}>Kanak - Kanak
                                        </option>
                                </td>
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
                    <div class="m-3 d-flex flex-column">
                        <div class="d-flex flex-column align-items-center justify-content-center"
                            style="min-width: 225px; height: 400px; background-color: #e0e0e0; user-select: none">

                            <p id="pFoto">Foto 16:9<br />1280x720</p>
                            <img id="imgFoto" style="display: none" width="180px" height="320px" />
                        </div>
                        <div class="d-flex">
                            <input id="inputFoto" class="form-control mt-2" type="file" name="cover-buku"
                                capture="environment" />
                            <a id="deleteBtn" class="btn btn-danger ms-2 mt-2">Hapus</a>
                        </div>
                        <script>
                            var input = document.getElementById('inputFoto');
                            var img = document.getElementById('imgFoto');
                            var p = document.getElementById('pFoto');
                            var deleteBtn = document.getElementById("deleteBtn");
                            input.addEventListener('change', () => {
                                // File diubah
                                if (input.files.length == 1) {
                                    img.src = URL.createObjectURL(input.files[0]);
                                    p.style.display = "none";
                                    img.style.display = "block";
                                } else {
                                    img.style.display = "none";
                                    p.style.display = "block";
                                }
                            });

                            deleteBtn.addEventListener('click', () => {
                                input.value = [];
                                img.removeAttribute('src');
                                img.style.display = "none";
                                p.style.display = "block";
                            });


                            img.src = "/storage/cover_buku/{{$data->ISBN}}.jpeg";
                            p.style.display = "none";
                            img.style.display = "block";
                        </script>
                    </div>
                </div>

                <div>
                    <button style="width: 128px" type="submit" class="btn btn-primary">Simpan</button>
                    <a style="width: 128px" class="btn btn-secondary" href="{{ route('data-buku') }}">Batal</a>
                </div>
            </form>
        </div>
    </div>
    <!-- main content -->
</body>

</html>
