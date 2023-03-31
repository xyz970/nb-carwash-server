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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / </span>Tarif </h4>
                        <!-- Content -->
                        <!-- Large Modal -->
                        <div class="modal fade" id="updateModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel3">Edit Tarif</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" id="updateForm">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="priceBefore" class="form-label">Harga Semula</label>
                                                    <input type="text" id="priceBefore" name="priceBefore" class="form-control" readonly disabled />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="price" class="form-label">Harga</label>
                                                    <input type="text" id="price" name="price" class="form-control" />
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <h5 class="card-header">Data Tarif</h5>
                            <div class="col-md-5" style="padding-left: 2rem; padding-bottom: 2rem">
                            </div>
                            <div style="padding-left: 2rem; padding-right: 2rem; padding-bottom: 2rem">
                                <div class="table-responsive text-nowrap">

                                    <table class="table" id="tableTarif">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>id</th>
                                                <th>keterangan</th>
                                                <th>Jenis Kendaraan</th>
                                                <th>Harga</th>
                                                <th>Aksi</th>
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
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            });
            loadTarif();
        })

        function loadTarif() {
            var url = "<?= BASE_URL ?>tarif/show_data";
            $('#tableTarif').DataTable({
                searching: true,
                paging: true,
                destroy: true,
                "ordering": false,
                // serverSide: true,
                ajax: url,
                columnDefs: [{
                    target: 2,
                    visible: false,
                }],
                columns: [{
                        data: null,
                        render: function(dadta, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'id',
                        name: 'id',
                        visible: false,
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'type',
                        name: 'type'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        render: function(data, type, row) {
                            return '<button onclick="edit(' + row.id + ')" class="btn btn-icon me-2 btn-primary"><span class="tf-icons bx bx-pencil"></span></button>';
                        }
                    }
                ],
            });
        }

        function edit(id) {
            var url = "<?=BASE_URL?>tarif/edit?id=:id"
            $.ajax({
                url: url.replace(':id', id),
                success: function(res) {
                    $('#priceBefore').val(res.price);
                    $('#updateModal').modal('show');
                },
                dataType: 'json',
            });
            $('#updateForm').submit(function(e) {
                var url = "<?=BASE_URL?>tarif/update?id=:id"
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: url.replace(':id', id),
                    type: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $('#updateModal').modal('hide');
                        // var oTable = $('#tableTarif').dataTable();
                        // oTable.fnDraw(false);
                        swal("Success", "Tarif harga berhasil diubah", "success");
                        loadTarif();
                        // $("#btn-save").html('Submit');
                        // $("#btn-save"). attr("disabled", false);
                    },
                })
            })
        }
    </script>
</body>

</html>