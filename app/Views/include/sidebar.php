<nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg scrollbar" id="sidebar">
    <div class="container-fluid">
        <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon">
            </span>
        </button>
        <a class="navbar-brand d-inline-block py-lg-2 mb-lg-5 px-lg-6 me-0" href="<?= site_url() ?>">
            <img src="<?= base_url('public/')  ?>/img/logos/clever-primary.svg" alt="...">
        </a>
        <div class="navbar-user d-lg-none">
            <div class="dropdown"><a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar-parent-child"><img alt="..." src="<?= base_url('public/')  ?>/img/people/img-profile.jpg" class="avatar avatar- rounded-circle"> <span class="avatar-child avatar-badge bg-success"></span></div>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                    <a href="#" class="dropdown-item">Profile</a>
                    <hr class="dropdown-divider">
                    <a href="<?= site_url('logout') ?>" class="dropdown-item">Logout</a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="sidebarCollapse">
            <ul class="navbar-nav">

                <li class="nav-item"><a class="nav-link" href="#sidebar-product" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebar-product">
                        <i class="bi bi-people"></i> Product</a>
                    <div class="collapse" id="sidebar-product">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a class="<?= activeTag("/", "/") ?>" href="<?= site_url('/') ?>">
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="<?= activeTag("party", "party-add") ?>" href="<?= site_url('party') ?>">
                                    Party
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="<?= activeTag("quality", "quality-add") ?>" href="<?= site_url('quality') ?>">
                                    Quality
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="<?= activeTag("color", "color-add") ?>" href="<?= site_url('color') ?>">
                                    Color
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="<?= activeTag("weight", "weight-add")  ?>" href="<?= site_url('weight') ?>">
                                    Weight
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="<?= activeTag("unit", "unit-add")  ?>" href="<?= site_url('unit') ?>">
                                    Unit
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="#sidebar-user" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebar-user"><i class="bi bi-people"></i> Receiving Stock</a>
                    <div class="collapse" id="sidebar-user">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('receiving'); ?>" class="<?= activeTag("receiving", "receiving-add"); ?>">Receiving</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('receiving-bag'); ?>" class="<?= activeTag("receiving-bag", "receiving-bag-add"); ?>">Receiving Roll/Bag</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <hr class="navbar-divider my-4 opacity-70">
            <ul class="navbar-nav">
                <li><span class="nav-link text-xs font-semibold text-uppercase text-muted ls-wide">Resources</span>
                </li>
                <li class="nav-item"><a class="nav-link py-2"><i class="bi bi-code-square"></i>
                        Documentation</a></li>
                <li class="nav-item">
                    <a class="nav-link py-2 d-flex align-items-center" href="#">
                        <i class="bi bi-journals"></i>
                        <span>Changelog</span>
                        <span class="badge badge-sm bg-soft-success text-success rounded-pill ms-auto">v1.0.0</span>
                    </a>
                </li>
            </ul>
            <div class="mt-auto"></div>
            <div class="my-4 px-lg-6 position-relative">
                <div class="dropup w-full">
                    <button class="btn-primary d-flex w-full py-3 ps-3 pe-4 align-items-center shadow shadow-3-hover rounded-3" type="button" data-bs-toggle="dropdown" aria-expanded="false"><span class="me-3"><img alt="..." src="<?= base_url('public/')  ?>/img/people/img-profile.jpg" class="avatar avatar-sm rounded-circle">
                        </span><span class="flex-fill text-start text-sm font-semibold">Superadmin</span>
                    </button>
                    <div class="d-flex gap-3 justify-content-center align-items-center mt-6 d-none">
                        <div><i class="bi bi-moon-stars me-2 text-warning me-2"></i> <span class="text-heading text-sm font-bold">Dark mode</span></div>
                        <div class="ms-auto">
                            <div class="form-check form-switch me-n2">
                                <input class="form-check-input" type="checkbox" id="switch-dark-mode">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>