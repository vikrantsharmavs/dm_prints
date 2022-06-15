<nav class="navbar navbar-light position-lg-sticky top-lg-0 d-none d-lg-block overlap-10 flex-none bg-white border-bottom px-0 py-3" id="topbar">
    <div class="container-fluid">
        <div class="hstack gap-2">
            <button type="button" class="btn btn-sm btn-square bg-tertiary bg-opacity-20 bg-opacity-100-hover text-tertiary text-white-hover">C</button>
            <button type="button" class="btn btn-sm btn-square bg-primary bg-opacity-20 bg-opacity-100-hover text-primary text-white-hover">D</button>
            <button type="button" class="btn btn-sm btn-square bg-warning bg-opacity-20 bg-opacity-100-hover text-warning text-white-hover">A</button>
            <button type="button" class="btn btn-sm btn-square btn-neutral border-dashed shadow-none"><i class="bi bi-plus-lg"></i></button>
        </div>
        <form class="form-inline ms-auto me-4 d-none d-md-flex">
            <div class="input-group input-group-inline shadow-none">
                <span class="input-group-text border-0 shadow-none ps-0 pe-3">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" class="form-control form-control-flush" placeholder="Search" aria-label="Search">
            </div>
        </form>
        <div class="navbar-user d-none d-sm-block">
            <div class="hstack gap-3 ms-4">
                <div class="dropdown"><a class="d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                        <div>
                            <div class="avatar avatar-sm bg-warning rounded-circle text-white">
                                <img alt="img-profile" src="<?= base_url('public/img/people/img-profile.jpg')  ?>">
                            </div>
                        </div>
                        <div class="d-none d-sm-block ms-3"><span class="h6">Superadmin</span></div>
                        <div class="d-none d-md-block ms-md-2"><i class="bi bi-chevron-down text-muted text-xs"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="dropdown-header">
                            <span class="d-block text-sm text-muted mb-1">Signed in as</span>
                            <span class="d-block text-heading font-semibold">Superadmin</span>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="bi bi-house me-3"></i>Home </a>
                        <a class="dropdown-item" href="#"><i class="bi bi-pencil me-3"></i>Edit profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>