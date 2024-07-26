<div class="mb-2">
    <div class="d-flex mb-2">
        <h3 class="fw-bold">{{ $judul }}</h3>
        <div class="flex-fill"></div>
        {{-- <a class="btn btn-secondary" style="margin-right: 16px">Selengkapnya -></a> --}}
    </div>
    <div class="recommendation d-flex flex-wrap mb-3 justify-content-begin">
        @foreach ($data as $d)
            <a href="{{ route('detail-buku', $d->id) }}" class="card clickable border-0 shadow me-3 mb-3"
                style="min-width: 193px;">
                <div class="card-body m-2">
                    <img src="/storage/cover_buku/{{ $d->ISBN }}.jpeg" class="mb-2 object-fit-cover mb-1 rounded"
                        style="height: 220px; max-width: 145px; width: 145px; background-color: #FAFAFA">
                    <p class="card-text mb-0">{{ $d->subjek }}</p>
                    <p class="card-title mb-0 fw-bold">{{ $d->judul }}</p>
                    <p class="card-text opacity-50">{{ $d->pengarang }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>
