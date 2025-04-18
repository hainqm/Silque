<nav class="navbar navbar-dark bg-dark sticky-top flex-md-nowrap p-2 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Admin Panel</a>
    <ul class="navbar-nav px-3">
        <form action="{{ route('logout')}}" method="POST">
            @csrf
            <button class="btn btn-danger w-75">
                Đăng xuất
            </button>
        </form>

    </ul>
</nav>
