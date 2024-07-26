<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan lampung</title>
    <link rel="stylesheet" href="/css/main.css">
    @include('view.broilerplate')
</head>


<body>
    @include('view.navbar')
    @include('view.sidebar')
    <!-- main content -->
    <div id="mainContent" class="main-content overflow-auto d-flex flex-column justify-content-center">
        <div class="w-75 align-self-center">
            <div class="page-link">
                <a href="{{ route('index') }}">Daftar Buku</a>
                <a>></a>
                <a>Detail Buku</a>
            </div>
            <div class="card d-flex flex-row p-3 mb-3">
                <img src="/storage/cover_buku/{{ $data->ISBN }}.jpeg" class="mb-2 object-fit-contain mb-1 rounded"
                    style="height: 440px;">
                <div class="ms-3 w-100">
                    <p class="card-text mb-0">{{ $data->subjek }}</p>
                    <h1 class="card-title mb-0 fw-bold">{{ $data->judul }}</h1>
                    <p class="card-text opacity-50">{{ $data->pengarang }}</p>
                    <hr class="w-100" />
                    <p class="card-title mb-0 fw-bold">Detail Buku</p>
                    <div class="mt-3">
                        <p class="card-text mb-0 opacity-50">Jumlah</p>
                        <p class="card-title mb-0 fw-bold">{{ $data->jumlah }}</p>
                    </div>
                    <div class="mt-3">
                        <p class="card-text mb-0 opacity-50">Penerbit</p>
                        <p class="card-title mb-0 fw-bold">{{ $data->penerbit }}, {{ $data->tahun }}</p>
                    </div>
                    <div class="mt-3">
                        <p class="card-text mb-0 opacity-50">ISBN</p>
                        <p class="card-title mb-0 fw-bold">{{ $data->ISBN }}</p>
                    </div>
                    <div class="mt-3">
                        <p class="card-text mb-0 opacity-50">Koleksi</p>
                        <p class="card-title mb-0 fw-bold">{{ $data->koleksi }}</p>
                    </div>
                </div>
            </div>


            <div class="mb-2 w-100 m-auto d-flex flex-column justify-content-center align-items-center">
                @include('view.recommendation', ['judul' => 'Buku Terbaru', 'data' => $data_terbaru])
            </div>
        </div>
    </div>
    <!-- main content -->
</body>

</html>
