<x-layout>

    <div class="container  space-bottom-lg-3"></div>
    <div class="container space-1 space-top-lg-0 space-bottom-lg-2 mt-lg-n10">
        <div class="row">
            <div class="col-lg-3">
                <div class="navbar-expand-lg navbar-expand-lg-collapse-block navbar-light">
                    <div id="sidebarNav" class="collapse navbar-collapse navbar-vertical">
                        <div class="card mb-5">
                            <div class="card-body">
                                <div class="d-none d-lg-block text-center mb-5">
                                    <h4 class="card-title">แปลจนเมื่อย</h4>
                                    <p class="card-text font-size-1"></p>
                                </div>
                                <h6 class="text-cap small">บัญชี</h6>
                                <ul class="nav nav-sub nav-sm nav-tabs nav-list-y-2 mb-4">
                                    <li class="nav-item"><a class="nav-link mr15rem " href="account-overview.html"><i class="fas fa-id-card nav-icon"></i> ข้อมูลผู้ใช้</a></li>
                                    <li class="nav-item"><a class="nav-link mr15rem " href="account-login-and-security.html"><i class="fas fa-shield-alt nav-icon"></i> บัญชี &amp; ความปลอดภัย</a></li>
                                </ul>
                                <h6 class="text-cap small">หนังสือ</h6>
                                <ul class="nav nav-sub nav-sm nav-tabs nav-list-y-2 mb-4">
                                    <li class="nav-item"><a class="nav-link mr15rem active" href="account-orders.html"><i class="fas fa-shopping-basket nav-icon"></i> <!-- -->กาตูนทั้งหมด</a></li>
                                </ul>
                                <h6 class="text-cap small">เติมเงิน</h6>

                                <div class="d-lg-block">
                                    <div class="dropdown-divider"></div>
                                    <ul class="nav nav-sub nav-sm nav-tabs nav-list-y-2">
                                        <li class="nav-item"><a class="nav-link text-primary" href="#"><i class="fas fa-sign-out-alt nav-icon"></i> Log out</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h5>หนังสือของฉัน</h5><a href="/systemPanel/manga/add" class="btn btn-primary rounded-pill" data-toggle="modal" data-target=".bookSet-modal"><i class="fas fa-plus"></i> เพิ่มหนังสือ</a>
                    </div>
                    <div class="card-body">
                        <?php if ($mangas) : ?>

                            <?php foreach ($mangas as $manga) : ?>
                                <div class="my-1">
                                    <div class="row border-bottom align-items-center py-3 px-2 w-100">
                                        <div class="col-12 col-lg-7 ">
                                            <div class="d-flex justify-content-start">
                                                <div><img class="rounded" src="<?= $manga['manga_cover'] ?>" alt="<?= $manga['manga_name'] ?>" style="height: 75px; width: 60px; cursor: pointer;"></div>
                                                <div class="py-1 pl-4">
                                                    <div style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; cursor: pointer; font-weight: bold; color: black;"> <a href="/manga/<?= $manga['manga_slugs'] ?>/view" class="mx-2" style="text-decoration:none"><?= $manga['manga_name']; ?></a></div>
                                                    <div class="mt-1"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-5">
                                            <div class="d-flex justify-content-between align-items-center py-1" style="min-height: 75px;">
                                                <div class="d-flex justify-content-lg-around w-100">
                                                </div>
                                                <div><a href="/systemPanel/manga/<?= $manga['manga_id'] ?>/view" class="btn btn-sm btn-primary ">Update</a></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>

                                </div>
                    </div>
                </div>
            </div>
        </div>

</x-layout>