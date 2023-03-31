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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / </span>Sesi </h4>

                        <!-- Content -->
                        <div class="card">
                            <!-- Large Modal -->
                            <div class="modal fade" id="sesi" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel3">Tambah Sesi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12" id="showAlert">

                                            </div>

                                            <form method="POST" id="insertSesi">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="keterangan" class="form-label">Keterangan</label>
                                                        <textarea class="form-control" name="keterangan" required id="keterangan" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="dayte" class="form-label">Jam Awal</label>
                                                        <input type="text" required id="jamAwal" name="jamAwal" class="form-control" />
                                                        <!-- <input class="datepicker-here form-control" required name="date" type="text" id="daterange" data-date-container='#pengeluaran' data-range="true" data-date-format="yyyy-mm-dd" data-multiple-dates-separator=" - " data-language="en" autocomplete="off" data-bs-original-title="" title=""> -->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="dayte" class="form-label">Jam Akhir</label>
                                                        <input type="text" required id="jamAkhir" name="jamAkhir" class="form-control" />
                                                        <!-- <input class="datepicker-here form-control" required name="date" type="text" id="daterange" data-date-container='#pengeluaran' data-range="true" data-date-format="yyyy-mm-dd" data-multiple-dates-separator=" - " data-language="en" autocomplete="off" data-bs-original-title="" title=""> -->
                                                    </div>
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan <span id="loading" role="status"></span></button>
                                            </form>
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h5 class="card-header">Data Pengeluaran</h5>
                            <div class="col-md-5" style="padding-left: 2rem; padding-bottom: 2rem">
                                <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#sesi">
                                    Tambah Data
                                </button>
                            </div>

                            <div style="padding-left: 2rem; padding-right: 2rem; padding-bottom: 2rem">
                                <div class="table-responsive text-nowrap">
                                    <table class="table" id="tablePengeluaran">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>no</th>
                                                <th>Keterangan</th>
                                                <th>Jam Awal</th>
                                                <th>Jam Akhir</th>
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
            $('#jamAwal').timepicker({
                icons: {
                    up: "bx bx-chevron-up",
                    down: "bx bx-chevron-down",
                },
                showMeridian: false,
                showInputs: false,
                minuteStep: 1,
                format: 'hh:mm'
            });
            $('#jamAkhir').timepicker({
                icons: {
                    up: "bx bx-chevron-up",
                    down: "bx bx-chevron-down",
                },
                showMeridian: false,
                showInputs: false,
                minuteStep: 1,
                format: 'hh:mm'
            });
            $('#spendInsertForm').validate({
                // wrapper: "#form-input",
                rules: {
                    keterangan: {
                        required: true,
                    },
                    total: {
                        required: true,
                        number: true,
                    },
                    daterange: {
                        required: true,
                        date: true,
                    },


                },
                errorElement: "span",
                errorPlacement: function(error, element) {
                    error.addClass("invalid-feedback");
                    // error.appendTo("#form-input");
                    error.insertAfter(element);
                    // Add the `help-block` class to the error element

                    // if (element.prop("type") === "checkbox") {
                    //     error.insertAfter(element.parent("label"));
                    // } else {
                    //     error.insertAfter(element);
                    // }
                },
            });
            loadSesiTable();
        })

        function loadSesiTable() {
            var url = "<?= BASE_URL ?>sesi/sesi_data";
            $('#tablePengeluaran').DataTable({
                searching: true,
                paging: true,
                destroy: true,
                "ordering": false,
                dataSrc: '',
                dataType: 'json',
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
                        data: 'keterangan',
                        name: 'keterangan'
                    },
                    {
                        data: 'jam_awal',
                        name: 'jam_awal'
                    },
                    {
                        data: 'jam_akhir',
                        name: 'jam_akhir'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        render: function(data, type, row) {
                            return '<button onclick="hapus(' + row.id + ')" class="btn btn-icon me-2 btn-danger"><span class="tf-icons bx bx-trash"></span></button>';
                        }
                    }
                ],


            });
        }

        function hapus(data) {
            var url = "<?= BASE_URL ?>pengeluaran/delete?id=:id";
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
                            loadPengeluaranTable();
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

        $('#insertSesi').submit(function(e) {
            var form = $('#insertSesi');
            if (form.valid()) {
                console.log(form.valid());
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "<?= BASE_URL ?>sesi/insert",
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $('#sesi').modal('hide');
                        loadSesiTable();
                        swal("Success", "Data berhasil dimasukkan", "success");
                        // $("#btn-save").html('Submit');
                        // $("#btn-save"). attr("disabled", false);
                    },
                    error: function(data) {
                        swal("Gagal", "Data telah ada", "error");
                    }
                })
            }

        })
    </script>
</body>

</html>