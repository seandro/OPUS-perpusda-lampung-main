<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan lampung</title>
    <link rel="stylesheet" href="/css/main.css">
    @include('view.broilerplate')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js"
        integrity="sha512-JyCZjCOZoyeQZSd5+YEAcFgz2fowJ1F1hyJOXgtKu4llIa0KneLcidn5bwfutiehUTiOuK87A986BZJMko0eWQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css"
        integrity="sha512-UtLOu9C7NuThQhuXXrGwx9Jb/z9zPQJctuAgNUBK3Z6kkSYT9wJ+2+dh6klS+TDBCV9kNPBbAxbVD+vCcfGPaA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<body style="background-color: #E8EDF2">
    @include('view.navbar')
    @include('view.sidebar')
    <!-- main content -->
    <div id="mainContent" class="main-content overflow-auto ">
        <div class="page-link">
            <a href="{{ route('data-buku') }}">Data Buku</a>
            <a>></a>
            <a>Tambah Buku</a>
        </div>

        <div class="card p-4">
            <h4>Tambah Buku</h4>
            <form action="{{ route('tambah-buku') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-flex flex-row flex-wrap">
                    <table class="flex-fill main-table">
                        <tbody>
                            <tr>
                                <td>ISBN</td>
                                <td><input name="ISBN" required type="text" class="form-control"
                                        placeholder="Nomor ISBN..." /></td>
                            </tr>
                            <tr>
                                <td>Judul Buku</td>
                                <td>
                                    <textarea name="judul" required type="text" class="form-control"
                                        placeholder="Judul Buku..."></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Pengarang</td>
                                <td><input name="pengarang" required type="text" class="form-control"
                                        placeholder="Pengarang..." /></td>
                            </tr>
                            <tr>
                                <td>Penerbit</td>
                                <td><input name="penerbit" required type="text" class="form-control"
                                        placeholder="Penerbit..." /></td>
                            </tr>
                                <tr>
                                    <td>Tahun Terbit</td>
                                    <td><input name="tahunTerbit" required type="number" class="form-control"
                                            placeholder="Tahun Terbit..." />
                                    </td>
                                </tr>

                                <tr>
                                    <td>Jumlah</td>
                                    <td><input name="jumlah" required type="number" class="form-control"
                                            placeholder="Jumlah Buku..." />
                                    </td>
                                </tr>

                            <tr>
                                <td>No. Klas</td>
                                <td>
                                <input name="subjek" required type="text" class="form-control" placeholder="No. Klas..." />
                                    <!-- <select name="subjek" class="form-select" aria-label="Default select example">
                                        <option selected value="0">Fiksi</option>
                                        <option value="2">Sejarah dan Sosial</option>
                                        <option value="3">Inspirasi</option>
                                        <option value="4">Ekonomi dan Administrasi</option>
                                        <option value="5">Sains dan Teknologi</option>
                                        <option value="6">Agama</option>
                                        <option value="7">Seni</option> -->
                                </td>
                            </tr>
                            <tr>
                                <td>Koleksi</td>
                                <td>
                                    <select name="koleksi" class="form-select" aria-label="Default select example">
                                        <option selected value="4">Umum</option>
                                        <option value="1">Deposit</option>
                                        <option value="2">Referensi</option>
                                        <option value="3">Kanak - Kanak</option>
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

                            <!-- <p id="pFoto">Foto 16:9<br />1280x720</p> -->
                            <img id="imgFoto" width="180px" height="320px" />
                        </div>
                        <div class="d-flex">
                            <input id="inputFoto" class="form-control mt-2" type="file" name="cover-buku"
                                accept="capture=environment,image/*" />
                            <a id="deleteBtn" class="btn btn-danger ms-2 mt-2">Hapus</a>

                            <button id="cropBtn" type="button" class="btn btn-primary ms-2 mt-2">
                                Crop
                            </button>
                        </div>
                        <script>
                            var input = document.getElementById('inputFoto');
                            var img = document.getElementById('imgFoto');
                            var deleteBtn = document.getElementById("deleteBtn");
                            var cropBtn = document.getElementById("cropBtn");

                            var cropper = null;
                            var cropping = false;

                            input.addEventListener('change', () => {
                                // File diubah
                                if (input.files.length == 1) {
                                    img.src = URL.createObjectURL(input.files[0]);
                                } else {
                                    img.removeAttribute('src');
                                }

                            });
                            deleteBtn.addEventListener('click', () => {
                                input.value = [];
                                img.removeAttribute('src');
                            });

                            cropBtn.addEventListener('click', () => {
                                if (cropping && input.files.length == 1) {
                                    cropper.getCroppedCanvas().toBlob((blob) => {
                                        cropper.destroy();
                                        let file = new File([blob], "mycanvas.jpeg");
                                        let dT = new DataTransfer();
                                        dT.items.add(file);
                                        input.files = dT.files;
                                        img.src = URL.createObjectURL(blob);
                                        cropping = false;
                                        cropper = null;
                                    });
                                }else{
                                    if (cropper == null) {
                                        cropper = new Cropper(img);
                                    } else {
                                        cropper.replace(img.src);
                                    }
                                    cropping = true;
                                }
                            });
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


    <!-- crop dialog -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Crop Gambar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body img-contaner w-100"></div>
                <div class="modal-footer text-center justify-content-center mt-3">
                    <button type="button" class="crop-it">Crop</button>
                    <button type="button" class="reset-it">Reset</button>
                    <button type="button" class="dismiss" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</body>
<script>
</script>

</html>