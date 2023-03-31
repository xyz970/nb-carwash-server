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
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Profit</h4>
                        <div class="card">

                            <p><?php print_r($data['sesi']) ?></p>
                            <!-- Large Modal -->
                            <div class="modal fade" id="profitDetail" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel3">Keuntungan tanggal : <span id="selectedDate"></span></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" id="insertProfit">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="daytime" class="form-label">Waktu</label>
                                                        <select class="form-select" name="daytime">
                                                            <?php
                                                            while ($row = $dataSesi->fetch_assoc()) {
                                                            ?>
                                                                <option value="<?= $row['id'] ?>"><?= $row['keterangan'] ?></option>

                                                            <?php
                                                            } 
                                                            ?>
                                                        </select>
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

                            <div class="modal fade" id="insertSchedule" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel3">Jadwal tanggal : <span id="selectedScheduleDate"></span></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" id="insertScheduleForm">
                                                <input type="hidden" name="date" id="dateInput" data-date="dateInput">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="daytime" class="form-label">Waktu</label>
                                                        <select class="form-select" name="daytime">
                                                            <?php
                                                            while ($row2 = $dataSesi2->fetch_assoc()) {
                                                            ?>
                                                                <option value="<?= $row2['id'] ?>"><?= $row2['keterangan'] ?></option>

                                                            <?php
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="user_id" class="form-label">Karyawan</label>
                                                        <select class="form-select" name="user_id" id="user_id" style="width: 100%">
                                                        </select>
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



                            <div style="padding: 2rem 2rem 2rem 2rem; width: 100%">
                                <div data-language="en" id="date"></div>
                            </div>
                        </div>
                        <br>
                        <div class="card" style="padding-top: 1rem">
                            <h5 class="card-header">
                                Detail Keuntungan
                            </h5>
                            <div style="padding-left: 2rem; padding-right: 2rem; padding-bottom: 2rem; width: 100%;">
                                <div class="table-responsive text-nowrap">
                                    <table class="table" id="profitTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tanggal</th>
                                                <th>Total</th>
                                                <th>Waktu</th>
                                                <th>Kas</th>
                                                <th>Karyawan</th>
                                                <th>Pemilik</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="1">Total:</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="card" style="padding-top: 1rem">
                            <h5 class="card-header">
                                Daftar Karyawan
                            </h5>
                            <div style="padding-left: 2rem; padding-right: 2rem; padding-bottom: 2rem; width: 100%;">

                                <div class="col-md-5" style=" padding-bottom: 2rem;">
                                    <button class="btn btn-info" id="tambahJadwal" data-bs-toggle="modal" data-bs-target="#insertSchedule">Tambah Jadwal </button>
                                </div>
                                <div class="table-responsive text-nowrap">
                                    <table class="table" id="totalFee">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tanggal</th>
                                                <th>Nama</th>
                                                <th>Waktu</th>
                                                <th>Total Fee</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="1">Total:</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="col-md-5" style=" padding-top: 2rem;" id="">
                                    <form method="POST" id="countFee">
                                        <input type="hidden" name="date" data-date="dateInput">
                                        <button class="btn btn-primary" type="submit" id="btnTotalFee">Total Semua Fee </button>
                                    </form>

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
            $('#tambahJadwal').attr('disabled',true);
            $('#btnTotalFee').attr('disabled', true);
            $('#date').evoCalendar({
                sidebarToggler: true,
                sidebarDisplayDefault: true,
                eventListToggler: false,
                eventDisplayDefault: false,
                format: 'yyyy-mm-dd',
                onSelectDate: function(e) {
                    console.log(e);
                }
            });
            $('#date').on('selectDate', function(a, b) {
                var selectedDate = a.target.evoCalendar.$active.date;
                var url = "<?= BASE_URL ?>keuntungan/selected_date?date=:date";
                $('#tambahJadwal').attr('disabled',false);
                $('#selectedScheduleDate').text(selectedDate)
                $('[data-date="dateInput"]').val(selectedDate)

                $.ajax({
                    type: 'GET',
                    url: url.replace(':date', selectedDate),
                    success: function(res, textStatus, xhr) {
                        // console.log(res);
                        $('#totalFee tbody').empty();
                        loadFeeTable(selectedDate);
                        $('#selectedScheduleDate').text(selectedDate);
                        loadProfitTable(selectedDate);
                        $('[data-date="dateInput"]').val(selectedDate);
                        if ($('#totalFee tr').length == 0) {
                            $('#btnTotalFee').attr('disabled', true);
                        }
                        // $('#btnTotalFee').attr('disabled', false);

                    },
                    error: function(res, xhr) {
                        $('#totalFee tbody').empty();
                        // var table = $('#profitTable').DataTable();
                        // table.destroy();
                        // var totalFee = $('#totalFee').DataTable();
                        // totalFee.destroy();
                        loadFeeTable(selectedDate);
                        loadProfitTable(selectedDate);

                        // $('#totalFee tbody').empty();
                        $('#profitDetail').modal('show');
                        $('#btnTotalFee').attr('disabled', false);
                        $('#selectedDate').text(selectedDate);
                        if ($('#totalFee tr').length == 0) {
                            $('#btnTotalFee').attr('disabled', true);
                        }
                        $('#insertProfit').submit(function(e) {
                            e.preventDefault();
                            var formData = new FormData(this);
                            var insertUrl =
                                "<?= BASE_URL ?>keuntungan/insert?date=:date";
                            $.ajax({
                                url: insertUrl.replace(':date', selectedDate),
                                type: 'POST',
                                data: formData,
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: (data) => {
                                    $('#profitDetail').modal('hide');
                                    loadProfitTable(selectedDate);
                                    swal("Success",
                                        "Keuntungan berhasil didata",
                                        "success");
                                    // $("#btn-save").html('Submit');
                                    // $("#btn-save"). attr("disabled", false);
                                },
                                error: function(data) {
                                    ;
                                    swal("Gagal",
                                        "Data di sesi tersebut sudah terdata",
                                        "error");
                                }
                            });
                        })
                    }
                });
                // console.log(a.target.evoCalendar.$active.date);
            })
        })

        $('#insertScheduleForm').submit(
            function(e) {
                e.preventDefault();
                var url = "<?= BASE_URL ?>keuntungan/insert_karyawan";
                var formData = new FormData(this);
                var selectedDate = $('#dateInput').val();
                console.log(selectedDate);
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $('#insertSchedule').modal('hide');
                        loadFeeTable(selectedDate);
                        swal("Success", "Jadwal berhasil dimasukkan", "success");
                        // $("#btn-save").html('Submit');
                        // $("#btn-save"). attr("disabled", false);
                    },
                    error: function(data) {
                        swal("Gagal", "Data telah ada", "error");
                    }
                })
            }
        )

        function loadProfitTable(date) {
            $('#user_id').select2({
                dropdownParent: $('#insertSchedule'),
                ajax: {
                    url: "<?= BASE_URL ?>user/data_list",
                    dataType: 'json',
                    delay: 250,
                    type: 'GET',
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                },
            })
            var url = "<?= BASE_URL ?>keuntungan/show_data?date=:date";
            $('#profitTable').DataTable({
                "bInfo": true,
                searching: true,
                paging: true,
                destroy: true,
                "ordering": false,
                ajax: url.replace(':date', date),
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'total',
                        name: 'total'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
                    },
                    {
                        data: 'for_cash',
                        name: 'for_cash'
                    },
                    {
                        data: 'for_employee',
                        name: 'for_employee'
                    },
                    {
                        data: 'for_owner',
                        name: 'for_owner'
                    },
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
                        .column(2)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page
                    pageTotal = api
                        .column(2, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Update footer
                    $(api.column(2).footer()).html('Rp. ' + total);
                },

            })
        }

        function loadFeeTable(date) {
            var url = "<?= BASE_URL ?>keuntungan/data_profit?date=:date";
            $('#totalFee').DataTable({
                "bInfo": false,
                searching: false,
                paging: false,
                destroy: true,
                "ordering": false,
                serverSide: true,
                ajax: url.replace(':date', date),
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
                    },
                    {
                        data: 'total_fee',
                        name: 'total_fee'
                    },
                ],

            })
        }

        $('#countFee').submit(function(e) {
            e.preventDefault();
            var selectedDate = $('#dateInput').val();
            var formData = new FormData(this);
            $.ajax({
                url: "<?= BASE_URL ?>keuntungan/total_fee",
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    loadFeeTable(selectedDate);
                    // swal("Success", "Jadwal berhasil dimasukkan", "success");
                    // $("#btn-save").html('Submit');
                    // $("#btn-save"). attr("disabled", false);
                },
                error: function(data) {
                    console.log(data);
                }
            })
        })
    </script>
</body>

</html>