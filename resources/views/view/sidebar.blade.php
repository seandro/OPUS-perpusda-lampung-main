<link rel="stylesheet" href="/css/sidebar.css">
<!-- sidebar -->
<div class="sidebar position-fixed">
    <div class="list-item" id="menuBtn">
        <a href="#">
            <i class="fas fa-bars fa-xl"></i>
            <span>Menu</span>
        </a>
    </div>
    <!-- Beranda -->
    <div class="list-item {{ $nav == 0 ? 'active' : '' }}">
        <a href="/">
            <i class="fas fa-home fa-xl"></i>
            <span>Beranda</span>
        </a>
    </div>
    <!-- Data Buku -->
    @if (session('employeePrivilege', false))
        <div class="list-item {{ $nav == 1 ? 'active' : '' }}">
            <a href="/data-buku">
                <i class="fas fa-book fa-xl"></i>
                <span>Data Buku</span>
            </a>
        </div>
    @endif
    <!-- Data Karyawan -->
    @if (session('adminPrivilege', false))
        <div class="list-item {{ $nav == 2 ? 'active' : '' }}">
            <a href="/data-karyawan">
                <i class="fas fa-users fa-xl"></i>
                <span>Data Karyawan</span>
            </a>
        </div>
    @endif


    <div class="penengahan"></div>

    <!-- Hubungi Kami -->
    <div class="list-item {{ $nav == 3 ? 'active' : '' }}">
        <a href="/contact">
            <i class="fas fa-phone fa-xl"></i>
            <span>Hubungi kami </span>
        </a>
    </div>
    @if (session('login', false))
        <!-- Profile -->
        <div class="list-item {{ $nav == 4 ? 'active' : '' }}">
            <a href="/profile">
                <i class="fas fa-user fa-xl"></i>
                <span>Profile</span>
            </a>
        </div>
        {{-- Log Out --}}
        <div class="list-item {{ $nav == 5 ? 'active' : '' }}" style="background-color: #af3939">
            <a href="/logout" style="color: white">
                <i class="fas fa-arrow-right-from-bracket fa-xl"></i>
                <span>Keluar</span>
            </a>
        </div>
    @else
        <div class="list-item {{ $nav == 5 ? 'active' : '' }}">
            <a href="/login">
                <i class="fas fa-arrow-right-to-bracket"></i>
                <span>Login</span>
            </a>
        </div>
    @endif

</div>
<!-- sidebar end -->

<script>
    var sidebar = document.querySelector('.sidebar');
    var menu = document.querySelector('#menuBtn');
    menu.addEventListener('click', (s, event) => {
        toggleSidebar();
    });

    function toggleSidebar() {
        var main = document.querySelector('#mainContent');
        sidebar.classList.toggle('active');
        main.classList.toggle('sidebar-active');
    }
</script>
