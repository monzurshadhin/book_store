<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{route('dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="{{route('home')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-house-chimney"></i></div>
                    Home
                </a>
                <a class="nav-link" href="{{route('books')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-book-open"></i></div>
                    Books
                </a>

                <div class="sb-sidenav-menu-heading">Settings</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Manage settings
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        @if(Auth::user()->uType == 'ADM')
                            <a class="nav-link" aria-current="page" href="{{route('add.book')}}">Add Book</a>
                            <a class="nav-link" aria-current="page" href="{{route('manage.book')}}">Manage Book</a>
                            <a class="nav-link" aria-current="page" href="{{route('manage.order')}}">Manage Order</a>
                            <a class="nav-link" aria-current="page" href="{{route('make.admin')}}">Make Admin</a>
                        @elseif(Auth::user()->uType == 'USR')
                            <a class="nav-link" aria-current="page" href="{{route('manage.userOrder')}}">Manage Order</a>
                        @endif
                    </nav>
                </div>


            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{Auth::user()->name}}
        </div>
    </nav>
</div>
