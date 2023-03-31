<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="<?= ASSET_PATH ?>img/favicon/favicon.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= ASSET_PATH ?>vendor/libs/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="<?= ASSET_PATH ?>vendor/css/theme-default.css" />
    <link rel="stylesheet" href="<?= ASSET_PATH ?>vendor/css/core.css" />
    <link rel="stylesheet" href="<?= ASSET_PATH ?>vendor/libs/select2/select2.css" />

    <title>Reservasi</title>
</head>

<body>
    <div style="margin:0 auto; padding-top: 2rem; ">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <h3>Daftar Antrian</h3>
                            <h2 id="antrian"><?php print_r($data['statusBook'][0]) ?></h2>
                        </div>

                        <div class="col-md-2">
                            <h3>Dalam Proses</h3>
                            <h2 id="antrian"><?php print_r($data['statusWait'][0]) ?></h2>
                        </div>
                    </div>
                </div>
                <?php if ($_GET['error'] == 'true') { ?>
                    <div class="alert alert-danger" role="alert">
                        Ooops Ada yang salah...
                    </div>
                <?php } ?>
                <form action="<?= BASE_URL ?>booking/insert" method="POST" id="insertBookingForm">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="name" class="form-label">Nama Pemilik</label>
                            <input type="text" required id="name" name="name" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="no_hp" class="form-label">Nomor HP</label>
                            <input type="text" required id="no_hp" name="no_hp" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="time" class="form-label">Jam</label>
                            <input type="text" required id="time" name="time" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="wash_type" class="form-label">Tipe Pencucian</label>
                            <select class="form-select" id="wash_type" required>
                                <option value=""></option>
                                <option value="Motor">Motor</option>
                                <option value="Mobil">Mobil</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="wash_type_id" class="form-label">Detail Pencucian</label>
                            <select class="form-select" required name="wash_type_id" id="detailPencucian">
                            </select>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="merk_model" class="form-label">Merk Model</label>
                            <input type="text" id="merk_model" required name="merk_model" required class="form-control" placeholder="cth.Honda Vario" />
                        </div>
                        <div class="col mb-0">
                            <label for="plate_number" class="form-label">Plat Nomor</label>
                            <input type="text" id="plate_number" required name="plate_number" required class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="total" class="form-label">Harga Total</label>
                            <input type="text" id="total" name="total" class="form-control" readonly />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info">Reservasi</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>
<script src="<?= BASE_URL . 'assets/vendor/libs/jquery/jquery.js' ?>"></script>
<script src="<?= BASE_URL . 'assets/vendor/libs/popper/popper.js' ?>"></script>
<script src="<?= BASE_URL . 'assets/vendor/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js' ?>"></script>
<script src="<?= BASE_URL . 'assets/vendor/libs/select2/select2.full.min.js' ?>"></script>
<script src="<?= BASE_URL . 'assets/vendor/libs/jquery/validate/jquery.validate.js' ?>"></script>
<script src="<?= BASE_URL . 'assets/vendor/libs/jquery/validate/additional-methods.js' ?>"></script>
<script src="<?= BASE_URL . 'assets/vendor/libs/jquery/validate/localization/messages_id.js' ?>"></script>
<script>
    $(function() {
        $.validator.addMethod("checkAlpha", function(value, element) {
            return (new RegExp("^[a-zA-Z ]*$").test(value))
        }, "Kolom harus diisi dengan huruf");
        $.validator.addMethod("checkTime",function(value,element){
            return (new RegExp("^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$").test(value));
        }, "Format waktu tidak valid");
        $('#time').timepicker({
            showMeridian: false,
            showInputs: false,
            minuteStep: 1,
            format: 'hh:mm'
        });
        $('#insertBookingForm').validate({
            // wrapper: "#form-input",
            rules: {
                name: {
                    required: true,
                    checkAlpha: true,
                },
                time: {
                    required: true,
                    checkTime: true
                },
                merk_model: {
                    required: true,
                },
                plate_number: {
                    required: true,
                },
                total: {
                    required: true,
                    number: true,
                },
                no_hp: {
                    required: true,
                    number: true,
                    maxlength: 12,
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
    })
    $('#wash_type').on('change', function() {
        var wash_type = $('#wash_type').find(":selected").val();
        console.log(wash_type);
        var url = "<?= BASE_URL ?>pencucian/detail_pencucian?type=:id";
        var finalUrl = url.replace(':id', wash_type);
        $.ajax({
            dataType: 'json',
            delay: 250,
            type: 'GET',
            url: finalUrl,
            success: function(res) {
                console.log(res);
            },
        })
        if (wash_type == "Karpet") {
            $('#merk_model').attr('disabled', true);
            $('#plate_number').attr('disabled', true);
        } else {
            $('#merk_model').attr('disabled', false);
            $('#plate_number').attr('disabled', false);
        }

        $('#detailPencucian').select2({
            // dropdownParent: $('#addTransaction'),
            ajax: {
                url: finalUrl,
                dataType: 'json',
                delay: 250,
                type: 'GET',
                success: function(res) {
                    // console.log(res[0].price);
                    // $('#total').val(res[0].price);
                },
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
    })
    $('#detailPencucian').on('select2:select', function(e) {
        var url = "<?= BASE_URL ?>pencucian/detail_harga?id=:id";
        var finalUrl = url.replace(':id', e.params.data.id);
        $.ajax({
            url: finalUrl,
            success: function(res) {
                $('#total').val(res[0].price);
            }
        });
    })
</script>
