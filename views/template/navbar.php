<!-- User -->
<li class="nav-item navbar-dropdown dropdown-user dropdown">
    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
        <div class="avatar avatar-online">
            <img src="<?= avatar($_SESSION['user']['name']) ?>" alt class="w-px-40 h-auto rounded-circle" />
        </div>
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
        <li>
            <a class="dropdown-item" href="<?=BASE_URL?>akun">
                <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar avatar-online">
                            <img src="<?= avatar($_SESSION['user']['name']) ?>" alt class="w-px-40 h-auto rounded-circle" />
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <span class="fw-semibold d-block"><?= $_SESSION['user']['name'] ?></span>
                        <small class="text-muted"><?= $_SESSION['user']['role'] ?></small>
                    </div>
                </div>
            </a>
        </li>
        <!-- <li>
            <div class="dropdown-divider"></div>
        </li>
        <li>
            <a class="dropdown-item" href="{{route('admin.accountSetting')}}">
                <span class="d-flex align-items-center align-middle">
                    <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                    <span class="flex-grow-1 align-middle">My Profile</span>

                </span>
            </a>
        </li> -->

        <li>
            <div class="dropdown-divider"></div>
        </li>
        <li>
            <a class="dropdown-item" href="<?= BASE_URL ?>auth/logout">
                <i class="bx bx-power-off me-2"></i>
                <span class="align-middle">Log Out</span>
            </a>
        </li>
    </ul>
</li>