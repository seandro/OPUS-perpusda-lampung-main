<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan lampung</title>
    <link rel="stylesheet" href="/css/index.css">
    @include('view.broilerplate')
</head>


<body>
    @include('view.navbar')
    @include('view.sidebar')
    <!-- main content -->
    <div id="mainContent" class="main-content overflow-auto d-flex flex-column justify-content-center align-items-center">
        <h4>{{ $judul }}</h4>
        @if($data != null)
        <div class="mb-2">
            <div class="d-flex mb-2">
                <h3 class="fw-bold">Hasil Pencarian</h3>
                <div class="flex-fill"></div>
                {{-- <a class="btn btn-secondary" style="margin-right: 16px">Selengkapnya -></a> --}}
            </div>
            <div class="recommendation d-flex flex-wrap mb-3 justify-content-begin">
                @foreach ($data as $d)
                    <a href="{{ route('detail-buku', $d->id) }}" class="card clickable border-0 shadow me-3 mb-3"
                        style="min-width: 193px;">
                        <div class="card-body m-8">
                            <img src="/storage/cover_buku/{{ $d->ISBN }}.jpeg"
                                class="mb-2 object-fit-cover mb-1 rounded"
                                style="height: 220px; max-width: 145px; width: 145px; background-color: #FAFAFA">
                            <p class="card-text mb-0">{{ $d->subjek }}</p>
                            <p class="card-title mb-0 fw-bold">{{ $d->judul }}</p>
                            <p class="card-text opacity-50">{{ $d->pengarang }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        @endif

        @if ($data_terbaru != null)
            @include('view.recommendation', ['judul' => 'Buku Terbaru', 'data' => $data_terbaru])
        @endif
        @if ($data_terpopuler != null)
            @include('view.recommendation', ['judul' => 'Terpopuler', 'data' => $data_terpopuler])
        @endif
    </div>
    <!-- main content -->
    </div>


</body>

</html>
