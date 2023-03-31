<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<!-- <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" /> -->
<link rel="icon" type="image/x-icon" href="<?= BASE_URL . 'assets/img/favicon/favicon.ico' ?>" />

<!-- Icons. Uncomment required icon fonts -->
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
<link rel="stylesheet" href="<?= BASE_URL . 'assets/vendor/libs/datepicker/date-picker.css' ?>">

<!-- Core CSS -->
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css" /> -->

<link rel="stylesheet" href="<?= BASE_URL . 'assets/vendor/css/core.css' ?>" />
<link rel="stylesheet" href="<?= BASE_URL . 'assets/vendor/css/theme-default.css' ?>" />
<link rel="stylesheet" href="<?= BASE_URL . 'assets/css/demo.css' ?>" />
<link rel="stylesheet" href="<?= BASE_URL .'assets/vendor/libs/bootstrap-timepicker/css/bootstrap-timepicker.min.css'?>">
<!-- Vendors CSS -->
<link rel="stylesheet" href="<?= BASE_URL . 'assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css' ?>" />
<link rel="stylesheet" href="<?= BASE_URL . 'assets/vendor/libs/datatable/datatables/dataTables.bootstrap5.min.css'?>" />
<link rel="stylesheet" href="<?= BASE_URL . 'assets/vendor/libs/select2/select2.css' ?>" />
<link rel="stylesheet" href="<?= BASE_URL . 'assets/vendor/libs/sweet-alert/sweetalert2.css' ?>" />
<link rel="stylesheet" href="<?= BASE_URL . 'assets/vendor/libs/evo-calendar/css/evo-calendar.min.css' ?>" />
<link rel="stylesheet" href="<?= BASE_URL . 'assets/vendor/libs/datepicker/date-picker.css' ?>">
<link rel="stylesheet" href="<?= BASE_URL . 'assets/vendor/libs/datepicker/daterange-picker.css' ?>">
<!-- Page CSS --> 
<!-- Helpers -->
<script src="<?= BASE_URL . 'assets/vendor/js/helpers.js' ?>"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="<?= BASE_URL . 'assets/js/config.js' ?>"></script>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap");
    body{
        font-family: 'Poppins',sans-serif;
    }
    /* .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current{
        background: var(--bs-blue) ;
        color: white;
    } */
    /* .dataTables_wrapper .dataTables_paginate .paginate_button.current .dataTables_paginate .paging_simple_numbers{
        padding-bottom: 2rem !important;
    } */
    /* .paginate_button .current {
        color: var(--bs-blue) !important;
    } */

    .datepicker--nav-action {
        background-color: rgb(105, 108, 255);
    }

    .datepicker--nav-action :hover {
        background-color: rgb(105, 108, 255);
    }

    .datepicker--cell-day .-range-from- .-selected-{
        background-color: rgb(105, 108, 255) !important;
    }
    .datepicker--cell-day .-range-to- .-current- .-selected-{
        background-color: rgb(105, 108, 255) !important;
    }

    .datepicker {
        z-index: 2051 !important;
    }
</style>