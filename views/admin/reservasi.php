<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path=VIEW_PATH."assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon/favicon.ico')}}" />

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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / </span>Reservasi </h4>
                        <!-- Content -->
                        <div class="card">
                            <h5 class="card-header">Data Reservasi</h5>
                            <div style="padding-left: 2rem; padding-right: 2rem; padding-bottom: 2rem">
                                <div class="table-responsive text-nowrap">

                                    <table class="table" id="bookingTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>ID</th>
                                                <th>Nama Pemilik</th>
                                                <th>Plat Nomor</th>
                                                <th>Merk Model</th>
                                                <th>Detail Pencucian</th>
                                                <th>Total</th>
                                                <th>Jam</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
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
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            });
            loadBookingTable();
            // $('.paginate_button.current').addClass('btn btn-primary')
            // $('.paginate_button.previous.disabled').addClass('btn btn-default')
            // $('.paginate_button.next.disabled').addClass('btn btn-default')
        })

        function loadBookingTable() {
            var url = "<?= BASE_URL ?>api/booking";
            $('#bookingTable').DataTable({
                "language": {
                    "emptyTable": "Reservasi kosong",
                },
                searching: false,
                destroy: true,
                "ordering": false,
                ajax: url,
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'id',
                        name: 'id',
                        visible: false
                    },
                    {
                        data: 'costumer_name',
                        name: 'costumer_name'
                    },
                    {
                        data: 'plate_number',
                        name: 'plate_number'
                    },
                    {
                        data: 'merk_model',
                        name: 'merk_model'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'total',
                        name: 'total'
                    },
                    {
                        data: 'time',
                        name: 'time'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                ],
            });
        }
    </script>
</body>

</html>