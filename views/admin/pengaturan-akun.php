<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path=VIEW_PATH."assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <meta name="description" content="" />

    <!-- Favicon -->
    <!-- <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon/favicon.ico')}}" /> -->

    <title>NB Carwash - Administrasi</title>
    <?php require(VIEW_PATH . 'template/header.php'); ?>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <?php require(VIEW_PATH . 'template/sidebar.php'); ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->

                            <?php require(VIEW_PATH . 'template/navbar.php'); ?>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <h5 class="card-header">Profile Details</h5>
                                    <!-- Account -->
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <div class="mb-3 col-12 mb-0">
                                            <div class="alert alert-warning">
                                                <h6 class="alert-heading fw-bold mb-1">Ketika anda mengubah data anda, anda harus mengulangi
                                                    proses login</h6>
                                            </div>
                                        </div>
                                        <form id="formAccountSettings" method="POST" action="<?=BASE_URL?>akun/update">
                                        <input type="hidden" name="id" value="<?=$_SESSION['user']['id']?>">
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="text" class="form-control" id="email" name="email" value="<?= $_SESSION['user']['email'] ?>" readonly />
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label" for="password">Password</label>
                                                    <input type="text" id="password" name="password" placeholder="************" class="form-control" readonly />
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <div class="form-check form-switch mb-2">
                                                        <input class="form-check-input" type="checkbox" id="passwordSwitch">
                                                        <label class="form-check-label" for="passwordSwitch">Edit Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /Account -->
                                </div>

                            </div>
                        </div>

                        <!--/ Card layout -->
                    </div>
                    <!-- / Content -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <?php require(VIEW_PATH . 'template/footer.php'); ?>
    <script>
        $('#passwordSwitch').change(function() {
        if ($(this).is(':checked')) {
            $('#email').prop('readonly', false);
            $('#password').prop('readonly', false);
        } else {
            $('#email').prop('readonly', true);
            $('#password').prop('readonly', true);
        }

    })
    </script>
</body>

</html>