<?= $this->extend('include/base'); ?>
<?= $this->section('title') ?>
<?= $title  ?>
<?= $this->endSection() ?>
<?= $this->section('admin') ?>
<header>
    <div class="container-fluid">
        <div class="border-bottom pt-6">
            <div class="row align-items-center">
                <div class="col-sm col-12">
                    <h1 class="h2 ls-tight"><span class="d-inline-block me-3">👋</span>Hi, Superadmin!</h1>
                </div>
                <div class="col-sm-auto col-12 mt-4 mt-sm-0">
                    <div class="hstack gap-2 justify-content-sm-end"><a href="#modalExport" class="btn btn-sm btn-neutral border-base" data-bs-toggle="modal"><span class="pe-2"><i class="bi bi-people-fill"></i> </span><span>Share</span>
                        </a><a href="#offcanvasCreate" class="btn btn-sm btn-primary" data-bs-toggle="offcanvas"><span class="pe-2"><i class="bi bi-plus-square-dotted"></i> </span><span>Create</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="py-6 bg-surface-secondary">

    <div class="container-fluid">
        <div class="row g-6 mb-6">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col"><span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Party</span>
                                <span class="h3 font-bold mb-0"><?= $party; ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                    <i class="bi bi-credit-card"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col"><span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Quality</span>
                                <span class="h3 font-bold mb-0"><?= $quality; ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle"><i class="bi bi-people"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col"><span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Color</span>
                                <span class="h3 font-bold mb-0"><?= $color; ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white text-lg rounded-circle"><i class="bi bi-clock-history"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col"><span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Weight</span>
                                <span class="h3 font-bold mb-0"><?= $weight; ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white text-lg rounded-circle"><i class="bi bi-minecart-loaded"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="card">
            <div class="card-header border-bottom">
                <h5 class="mb-0">Latest projects</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Team</th>
                            <th scope="col">Completion</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <img alt="..." src="<?= base_url('public/')  ?>/img/social/airbnb.svg" class="avatar avatar-sm rounded-circle me-2">


                                <a class="text-heading font-semibold" href="#">Website Redesign</a>
                            </td>
                            <td>23-01-2022</td>
                            <td><span class="badge badge-lg badge-dot"><i class="bg-warning"></i>In
                                    progress</span></td>
                            <td>
                                <div class="avatar-group"><a href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="<?= base_url('public/')  ?>/img/people/img-1.jpg"> </a><a href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="<?= base_url('public/')  ?>/img/people/img-3.jpg"> </a><a href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="<?= base_url('public/')  ?>/img/people/img-4.jpg"></a></div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center"><span class="me-2">38%</span>
                                    <div>
                                        <div class="progress" style="width:100px">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100" style="width:38%"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end"><a href="#" class="btn btn-sm btn-neutral">View</a> <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><img alt="..." src="<?= base_url('public/')  ?>/img/social/amazon.svg" class="avatar avatar-sm rounded-circle me-2"> <a class="text-heading font-semibold" href="#">E-commerce App</a></td>
                            <td>23-01-2022</td>
                            <td><span class="badge badge-lg badge-dot"><i class="bg-success"></i>Done</span>
                            </td>
                            <td>
                                <div class="avatar-group"><a href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="<?= base_url('public/')  ?>/img/people/img-1.jpg"> </a><a href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="<?= base_url('public/')  ?>/img/people/img-3.jpg"> </a><a href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="<?= base_url('public/')  ?>/img/people/img-4.jpg"></a></div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center"><span class="me-2">83%</span>
                                    <div>
                                        <div class="progress" style="width:100px">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="83" aria-valuemin="0" aria-valuemax="100" style="width:83%"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end"><a href="#" class="btn btn-sm btn-neutral">View</a> <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><img alt="..." src="<?= base_url('public/')  ?>/img/social/bootstrap.svg" class="avatar avatar-sm rounded-circle me-2">
                                <a class="text-heading font-semibold" href="#">Learning Platform</a>
                            </td>
                            <td>23-01-2022</td>
                            <td><span class="badge badge-lg badge-dot"><i class="bg-danger"></i>Project at
                                    risk</span></td>
                            <td>
                                <div class="avatar-group"><a href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="<?= base_url('public/')  ?>/img/people/img-1.jpg"> </a><a href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="<?= base_url('public/')  ?>/img/people/img-3.jpg"> </a><a href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="<?= base_url('public/')  ?>/img/people/img-4.jpg"></a></div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center"><span class="me-2">4%</span>
                                    <div>
                                        <div class="progress" style="width:100px">
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="100" style="width:4%"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end"><a href="#" class="btn btn-sm btn-neutral">View</a> <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><img alt="..." src="<?= base_url('public/')  ?>/img/social/dribbble.svg" class="avatar avatar-sm rounded-circle me-2">
                                <a class="text-heading font-semibold" href="#">Design Portfolio</a>
                            </td>
                            <td>23-01-2022</td>
                            <td><span class="badge badge-lg badge-dot"><i class="bg-warning"></i>In
                                    progress</span></td>
                            <td>
                                <div class="avatar-group"><a href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="<?= base_url('public/')  ?>/img/people/img-1.jpg"> </a><a href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="<?= base_url('public/')  ?>/img/people/img-3.jpg"> </a><a href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="<?= base_url('public/')  ?>/img/people/img-4.jpg"></a></div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center"><span class="me-2">10%</span>
                                    <div>
                                        <div class="progress" style="width:100px">
                                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:10%"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end"><a href="#" class="btn btn-sm btn-neutral">View</a> <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><img alt="..." src="<?= base_url('public/')  ?>/img/social/spotify.svg" class="avatar avatar-sm rounded-circle me-2">
                                <a class="text-heading font-semibold" href="#">Our team&#39;s playlist</a>
                            </td>
                            <td>23-01-2022</td>
                            <td><span class="badge badge-lg badge-dot"><i class="bg-warning"></i>In
                                    progress</span></td>
                            <td>
                                <div class="avatar-group"><a href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="<?= base_url('public/')  ?>/img/people/img-1.jpg"> </a><a href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="<?= base_url('public/')  ?>/img/people/img-3.jpg"> </a><a href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="<?= base_url('public/')  ?>/img/people/img-4.jpg"></a></div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center"><span class="me-2">83%</span>
                                    <div>
                                        <div class="progress" style="width:100px">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="83" aria-valuemin="0" aria-valuemax="100" style="width:83%"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end"><a href="#" class="btn btn-sm btn-neutral">View</a>
                                <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> -->
    </div>
</main>
<?= $this->endSection() ?>