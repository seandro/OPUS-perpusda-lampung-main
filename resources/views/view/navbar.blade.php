<link rel="stylesheet" href="/css/navbar.css">
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container-fluid ">
        <button class="navbar-toggler" type="button" aria-label="Toggle navigation" onclick="toggleSidebar()">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/">
            <img class="logo" src="/images/fix logo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" aria-label="Toggle navigation" id="searchBtn">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
        <div class="collapse navbar-collapse custom-bg" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle active" href="#" role="button" id="filterLanjutan">
                        Koleksi
                    </a>
                    <form action="{{ route('index') }}" method="POST" class="d-flex flex-fill" role="search">
                    @csrf
                    <ul class="dropdown-menu" id="filterDropdown">
                        <li><button value="4"class="dropdown-item" name="filterQuery">Umum</button></li>
                        <li><button value="3"class="dropdown-item" name="filterQuery">Kanak-Kanak</button></li>
                        <li><button value="1"class="dropdown-item" name="filterQuery">Deposit</button></li>
                        <li><button value="2"class="dropdown-item" name="filterQuery">Referensi</button></li>
                    </ul>
                    </form>
                </li>
            </ul>
            <form action="{{ route('index') }}" method="POST" class="d-flex flex-fill" role="search">
                @csrf
                <input name="searchQuery" class="form-control me-2" type="search" placeholder="Search"
                    aria-label="Search">
                <button class="btn btn-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<!-- navbar end -->


<script>
    var searchBtn = document.querySelector('#searchBtn');
    var filterSearch = document.querySelector('#navbarNavDropdown');
    var filterLanjutan = document.querySelector('#filterLanjutan');
    var filterDropdown = document.querySelector('#filterDropdown');
    searchBtn.addEventListener('click', () => {
        toggleFilterSearch();
    });
    filterLanjutan.addEventListener('click', (event) => {
        event.preventDefault(); // Prevent the default link behavior
        toggleFilterDropdown();
    });
    function toggleFilterSearch() {
        filterSearch.classList.toggle('show');
    }
    function toggleFilterDropdown() {
        if (filterDropdown.classList.contains('show')) {
            filterDropdown.classList.remove('show');
        } else {
            filterDropdown.classList.add('show');
        }
    }
    // Close dropdown when clicking outside
    document.addEventListener('click', function (event) {
        if (!filterLanjutan.contains(event.target) && !filterDropdown.contains(event.target)) {
            filterDropdown.classList.remove('show');
        }
    });
</script>