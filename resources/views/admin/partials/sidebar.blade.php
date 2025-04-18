<div class="d-flex flex-column p-3 text-white bg-dark" style="height: 100vh;">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="{{ route('admin.categories.index') }}" class="nav-link text-white">
                <i class="fas fa-tachometer-alt"></i> Category
            </a>
            <a href="{{ route('admin.products.index') }}" class="nav-link text-white">
                <i class="fas fa-tachometer-alt"></i> Product
            </a>
             <a href="{{ route('admin.customers.index') }}" class="nav-link text-white">
                <i class="fas fa-tachometer-alt"></i> Customer
            </a>
             <a href="{{ route('admin.banners.index') }}" class="nav-link text-white">
                <i class="fas fa-tachometer-alt"></i> Banner
            </a>
             <a href="{{ route('admin.posts.index') }}" class="nav-link text-white">
                <i class="fas fa-tachometer-alt"></i> Post
            </a>
             <a href="{{ route('admin.contacts.index') }}" class="nav-link text-white">
                <i class="fas fa-tachometer-alt"></i> Contact
            </a>
             <a href="{{ route('admin.reviews.index') }}" class="nav-link text-white">
                <i class="fas fa-tachometer-alt"></i> Reivew
            </a>

            <a href="{{ route('admin.products.trashed') }}" class="nav-link text-white">
                <i class="fas fa-tachometer-alt"></i> Recycle Bin
            </a>

        </li>
    </ul>
</div>
