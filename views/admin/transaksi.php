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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / </span>Transaksi </h4>

                        <div class="card mb-4">
                            <h5 class="card-header">Data Transaksi</h5>

                            <div style="padding-left: 2rem; padding-right: 2rem; padding-bottom: 2rem">
                                </pre>
                                <div class="table-responsive text-nowrap">
                                    <table class="table" id="transaksiTable">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>id</th>
                                                <th>Nama</th>
                                                <th>No. Hp</th>
                                                <th>Tipe pencucian</th>
                                                <th>Plat Nomor</th>
                                                <th>Merk Kendaraan</th>
                                                <th>Waktu</th>
                                                <th>Total harga</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <h5 class="card-header">Data Transaksi Karpet</h5>

                            <div style="padding-left: 2rem; padding-right: 2rem; padding-bottom: 2rem">
                                </pre>
                                <div class="table-responsive text-nowrap">
                                    <table class="table" id="transaksiKarpet">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>id</th>
                                                <th>Bukti</th>
                                                <th>Nama</th>
                                                <th>No. Hp</th>
                                                <th>Total harga</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <!-- isi card -->

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
            loadTransTable();
            loadTransKarpet();
            // $('.paginate_button.current').addClass('btn btn-primary')
            // $('.paginate_button.previous.disabled').addClass('btn btn-default')
            // $('.paginate_button.next.disabled').addClass('btn btn-default')
        })

        function loadTransTable() {
            var url = "<?= BASE_URL ?>transaksi/data_trans";
            $('#transaksiTable').DataTable({
                "language": {
                    "emptyTable": "Transaksi kosong",
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
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'no_hp',
                        name: 'no_hp'
                    },
                    {
                        data: 'wash_type_name',
                        name: 'wash_type_name'
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
                        data: 'time',
                        name: 'time'
                    },
                    {
                        data: 'total',
                        name: 'total'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        render: function(data, type, row) {
                            return `<button onclick="hapus('` + row.id + `')" class="btn btn-icon me-2 btn-danger"><span class="tf-icons bx bx-trash"></span></button>`;
                        }
                    }
                ],
            });
        }

        function loadTransKarpet() {
            var url = "<?= BASE_URL ?>transaksi/data_trans?karpet=true";
            $('#transaksiKarpet').DataTable({
                "language": {
                    "emptyTable": "Transaksi kosong",
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
                        data: 'bukti',
                        name: 'bukti',
                        render: function(data, type, row) {
                            console.log(data);
                            return `<img src="<?= BASE_URL ?>assets/img/bukti/` + data + `" alt="" width="150" height="100">`;
                        }
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'no_hp',
                        name: 'no_hp'
                    },
                    {
                        data: 'total',
                        name: 'total'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        render: function(data, type, row) {
                            return `<button onclick="hapus('` + row.id + `')" class="btn btn-icon me-2 btn-danger"><span class="tf-icons bx bx-trash"></span></button>`;
                        }
                    }
                ],
            });
        }

        function hapus(data) {
            var url = "<?= BASE_URL ?>transaksi/hapus?id=:id";
            // console.log(data);
            swal({
                title: "Anda yakin?",
                text: "Anda yakin ingin menghapus data ini??",
                icon: "warning",
                buttons: true,
                dangerMode: true
            }).then((willDelete) => {
                // console.log(willDelete);
                if (willDelete) {
                    $.ajax({
                        url: url.replace(':id', data),
                        type: 'DELETE',
                        cache: false,
                        processData: false,
                        success: (data) => {
                            loadTransTable();
                            swal("Success", "Data berhasil dihapus", "success");
                            // $("#btn-save").html('Submit');
                            // $("#btn-save"). attr("disabled", false);
                        },
                        error: function(data) {
                            swal("Gagal", "Error!!", "error");
                        }
                    })
                }

            });
        }
    </script>
</body>

</html>