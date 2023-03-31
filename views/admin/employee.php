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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / </span>Karyawan </h4>

                        <div class="card">
                            <!-- Large Modal -->
                            <div class="modal fade" id="insert" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel3">Tambah Daftar Karyawan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12" id="showAlert">

                                            </div>

                                            <form method="POST" id="insertEmployee">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="nama" class="form-label">Nama</label>
                                                        <input class="form-control" name="nama" required id="nama">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input class="form-control" name="email" required id="email">
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

                            <h5 class="card-header">Data Karyawan</h5>
                            <div class="col-md-5" style="padding-left: 2rem; padding-bottom: 2rem">
                                <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#insert">
                                    Tambah Data
                                </button>
                            </div>

                            <div style="padding-left: 2rem; padding-right: 2rem; padding-bottom: 2rem">
                                <div class="table-responsive text-nowrap">
                                    <table class="table" id="employeeTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <tfoot>
                                            <tr>

                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
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
            $.validator.addMethod("checkAlpha", function(value, element) {
                return (new RegExp("^[a-zA-Z ]*$").test(value))
            }, "Kolom harus diisi dengan huruf");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },

            });
            $('#insertEmployee').validate({
                // wrapper: "#form-input",
                rules: {
                    nama: {
                        required: true,
                        checkAlpha: true,
                    },
                    email: {
                        required: true,
                        email: true,
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
            loadEmployeeTable();
        })

        function loadEmployeeTable() {
            var url = "<?= BASE_URL ?>karyawan/show_data";
            $('#employeeTable').DataTable({
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
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'password',
                        name: 'password',
                        render: function(data, type, row) {
                            return '<p>*********</p>';
                        }
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        render: function(data, type, row) {
                            return '<button onclick="hapus(' + row.id + ')" class="btn btn-icon me-2 btn-danger"><span class="tf-icons bx bx-trash"></span></button>';
                        }
                    }
                ],
                footerCallback: function(row, data, start, end, display) {
                    var api = this.api();

                    // Remove the formatting to get integer data for summation
                    var intVal = function(i) {
                        return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ?
                            i : 0;
                    };

                    // Total over all pages
                    total = api
                        .column(4)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page
                    pageTotal = api
                        .column(4, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Update footer
                    $(api.column(4).footer()).html('Rp. ' + total);
                },

            });
        }

        function hapus(data) {
            var url = "<?= BASE_URL ?>karyawan/delete?id=:id";
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
                            loadEmployeeTable();
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

        $('#insertEmployee').submit(function(e) {
            var form = $('#insertEmployee');
            if (form.valid()) {
                console.log(form.valid());
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "<?= BASE_URL ?>karyawan/insert",
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $('#insert').modal('hide');
                        loadEmployeeTable();
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