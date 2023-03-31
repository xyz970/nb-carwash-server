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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> </h4>

                        <!-- Content -->

                        <div class="row">
                            <div class="col-lg-8 mb-4 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-7">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary">Selamat Datang <?= $_SESSION['user']['name'] ?></h5>
                                                <p class="mb-4 fw-bold"><?=date("d - m - Y")?></p>
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-5 text-center text-sm-left">
                                            <div class="card-body pb-0 px-0 px-md-4">
                                                <img src="<?= ASSET_PATH . 'img/illustrations/man-with-laptop-light.png' ?>" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 order-1">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="<?= ASSET_PATH . 'img/icons/unicons/chart-success.png' ?>" alt="chart success" class="rounded" />
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6 class="fw-semibold d-block mb-1">Profit <span class="badge bg-label-warning rounded-pill"><?= Carbon\Carbon::now()->format('M') ?></span></h6>
                                                
                                                <h5 class="card-title mb-2">Rp.<?=number_format($data['profitPerbulan'])?></h5>
                                                <!-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="<?= ASSET_PATH . 'img/icons/unicons/wallet-info.png' ?>" alt="Credit Card" class="rounded" />
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span>Kas Per-Minggu</span>
                                                <h5 class="card-title text-nowrap mb-1">Rp. <?=number_format($data['KasPerMinggu'])?></h5>
                                                <!-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Total Revenue -->
                            <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                                <div class="card">
                                    <div class="row row-bordered g-0">
                                        <div class="col-md-12">
                                            <h5 class="card-header m-0 me-2 pb-3">Total Pencucian <span class="badge bg-label-success rounded-pill"><?= Carbon\Carbon::now()->format('Y') ?></span></h5>
                                            <div id="totalRevenueChart" class="px-2"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--/ Total Revenue -->
                            <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                                <div class="row">
                                    <div class="col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="<?= ASSET_PATH . 'img/icons/unicons/paypal.png' ?>" alt="Credit Card" class="rounded" />
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="d-block mb-1">Kas Per-Bulan</span>
                                                <h5 class="card-title text-nowrap mb-2">Rp.<?=number_format($data['kasPerbulan'])?></h5>
                                                <!-- <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="<?= ASSET_PATH . 'img/icons/unicons/cc-primary.png' ?>" alt="Credit Card" class="rounded" />
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="d-block mb-1">Profit Per-Minggu</span>
                                                <h5 class="card-title mb-2">Rp.<?=number_format($data['OwnerPerMinggu'])?></h5>
                                                <!-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                                    <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                                        <div class="card-title">
                                                            <h5 class="text-nowrap mb-2">Profit Per Tahun</h5>
                                                            <span class="badge bg-label-warning rounded-pill"><?= Carbon\Carbon::now()->format('Y') ?></span>
                                                        </div>
                                                        <div class="mt-sm-auto">
                                                            <!-- <small class="text-success text-nowrap fw-semibold"><i class="bx bx-chevron-up"></i> 68.2%</small> -->
                                                            <h3 class="mb-0">Rp.<?=number_format($data['profitPerTahun'])?></h3>
                                                        </div>
                                                    </div>
                                                    <div id="profileReportChart"></div>
                                                </div>
                                            </div>
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
            let cardColor, headingColor, axisColor, shadeColor, borderColor;
            cardColor = config.colors.white;
            headingColor = config.colors.headingColor;
            axisColor = config.colors.axisColor;
            borderColor = config.colors.borderColor;

            // Total Revenue Report Chart - Bar Chart
            // --------------------------------------------------------------------
            const totalRevenueChartEl = document.querySelector('#totalRevenueChart'),
                totalRevenueChartOptions = {
                    series: [
                        // {
                        //     name: '',
                        //     data: [{"y":18}, 7, 15, 29, 18, 12, 9,10,17,12,7,4]
                        // },
                    ],
                    chart: {
                        height: 300,
                        stacked: true,
                        type: 'bar',
                        toolbar: {
                            show: false
                        }
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '45%',
                            borderRadius: 12,
                            startingShape: 'rounded',
                            endingShape: 'rounded'
                        }
                    },
                    colors: [config.colors.primary, config.colors.info],
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 6,
                        lineCap: 'round',
                        colors: [cardColor]
                    },
                    legend: {
                        show: true,
                        horizontalAlign: 'left',
                        position: 'top',
                        markers: {
                            height: 8,
                            width: 8,
                            radius: 12,
                            offsetX: -3
                        },
                        labels: {
                            colors: axisColor
                        },
                        itemMargin: {
                            horizontal: 10
                        }
                    },
                    grid: {
                        borderColor: borderColor,
                        padding: {
                            top: 0,
                            bottom: -8,
                            left: 20,
                            right: 20
                        }
                    },
                    xaxis: {
                        // categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agust', 'Sep', 'Okt', 'Nov', 'Des'],
                        labels: {
                            style: {
                                fontSize: '13px',
                                colors: axisColor
                            }
                        },
                        axisTicks: {
                            show: false
                        },
                        axisBorder: {
                            show: false
                        }
                    },
                    yaxis: {
                        labels: {

                            formatter: (value) => {
                                return value.toFixed(0)
                            },
                            style: {
                                fontSize: '13px',
                                colors: axisColor
                            }
                        }
                    },
                    responsive: [{
                            breakpoint: 1700,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: '32%'
                                    }
                                }
                            }
                        },
                        {
                            breakpoint: 1580,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: '35%'
                                    }
                                }
                            }
                        },
                        {
                            breakpoint: 1440,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: '42%'
                                    }
                                }
                            }
                        },
                        {
                            breakpoint: 1300,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: '48%'
                                    }
                                }
                            }
                        },
                        {
                            breakpoint: 1200,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: '40%'
                                    }
                                }
                            }
                        },
                        {
                            breakpoint: 1040,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 11,
                                        columnWidth: '48%'
                                    }
                                }
                            }
                        },
                        {
                            breakpoint: 991,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: '30%'
                                    }
                                }
                            }
                        },
                        {
                            breakpoint: 840,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: '35%'
                                    }
                                }
                            }
                        },
                        {
                            breakpoint: 768,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: '28%'
                                    }
                                }
                            }
                        },
                        {
                            breakpoint: 640,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: '32%'
                                    }
                                }
                            }
                        },
                        {
                            breakpoint: 576,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: '37%'
                                    }
                                }
                            }
                        },
                        {
                            breakpoint: 480,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: '45%'
                                    }
                                }
                            }
                        },
                        {
                            breakpoint: 420,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: '52%'
                                    }
                                }
                            }
                        },
                        {
                            breakpoint: 380,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: '60%'
                                    }
                                }
                            }
                        }
                    ],
                    states: {
                        hover: {
                            filter: {
                                type: 'none'
                            }
                        },
                        active: {
                            filter: {
                                type: 'none'
                            }
                        }
                    }
                };
            if (typeof totalRevenueChartEl !== undefined && totalRevenueChartEl !== null) {
                const totalRevenueChart = new ApexCharts(totalRevenueChartEl, totalRevenueChartOptions);
                totalRevenueChart.render();
                $.getJSON('<?= BASE_URL ?>admin/data_tahunan', function(response) {
                    totalRevenueChart.updateSeries([{
                        name: '<?= Carbon\Carbon::now()->format('Y') ?>',
                        data: response
                    }])
                });
            }



            // Profit Report Line Chart
            // --------------------------------------------------------------------
            const profileReportChartEl = document.querySelector('#profileReportChart'),
                profileReportChartConfig = {
                    chart: {
                        height: 90,
                        // width: 175,
                        type: 'line',
                        toolbar: {
                            show: false
                        },
                        dropShadow: {
                            enabled: true,
                            top: 10,
                            left: 5,
                            blur: 3,
                            color: config.colors.warning,
                            opacity: 0.15
                        },
                        sparkline: {
                            enabled: true
                        }
                    },
                    grid: {
                        show: false,
                        padding: {
                            right: 8
                        }
                    },
                    colors: [config.colors.warning],
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        width: 5,
                        curve: 'smooth'
                    },
                    series: [{
                            name: '<?= Carbon\Carbon::now()->format('Y') ?>',
                            data: [110, 270, 145, 245, 205, 285]
                        },

                    ],
                    xaxis: {
                        show: false,
                        lines: {
                            show: false
                        },
                        labels: {
                            show: false
                        },
                        axisBorder: {
                            show: false
                        }
                    },
                    yaxis: {
                        show: false
                    }
                };
            if (typeof profileReportChartEl !== undefined && profileReportChartEl !== null) {
                const profileReportChart = new ApexCharts(profileReportChartEl, profileReportChartConfig);
                profileReportChart.render();
            }
        </script>
</body>

</html>