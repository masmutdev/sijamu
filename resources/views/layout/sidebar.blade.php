<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="sneat/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <title>SIJAMU FIP | Sistem Penjaminan Mutu Internal FIP</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('sneat/assets/img/favicon/LogoFIP.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <script src="https://kit.fontawesome.com/221a90d938.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('sneat/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('sneat/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('sneat/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('sneat/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('sneat/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('sneat/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('sneat/assets/js/config.js') }}"></script>

    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-size: 12px;
        }
        .dataTables_wrapper .dataTables_filter label {
            font-size: 12px;
        }
        .dataTables_wrapper .dataTables_length label {
            font-size: 12px;
        }
    </style>

</head>

<body>
    @include('sweetalert::alert')

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="index.html" class="app-brand-link">
                        <img src="{{ asset('sneat/assets/img/favicon/LOGO FIP.png') }}" width="55" height="55">
                        <span class="app-brand-text demo menu-text fw-bolder ms-2 text-capitalize fs-4">SIJAMU
                            FIP</span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Home -->
                    <li class="menu-item {{ \Route::is('BerandaSIJAMUFIP') ? 'active' : '' }}">
                        <a href="{{ route('BerandaSIJAMUFIP') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Home">Beranda</div>
                        </a>
                    </li>

                    <!-- Tim Penjaminan Mutu -->
                    <li class="menu-item {{ \Route::is('TimJAMU') ? 'active' : '' }}">
                        <a href="{{ route('TimJAMU') }}" class="menu-link">
                            <i class='menu-icon tf-icons bx bxs-group bx-flip-horizontal bx-border-circle bx-xs'
                                style='color:rgba(181,27,123,0.82)'></i>
                            <div data-i18n="TimJAMU">Tim Penjaminan Mutu</div>
                        </a>

                        <!-- Poin Penjaminan Mutu -->
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">PPEPP</span>
                    </li>
                    <!-- 5 Poin -->
                    <li class="menu-item {{ \Route::is('penetapan*') ? 'active' : '' }}">
                        <a href="{{ route('penetapan.perangkat') }}" class="menu-link menu-toggle">
                            <i class='menu-icon tf-icons bx bxs-book-bookmark'></i>
                            <div data-i18n="Penetapan">Penetapan</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item {{ \Route::is('penetapan.perangkat') ? 'active' : '' }}">
                                <a href="{{ route('penetapan.perangkat') }}" class="menu-link">
                                    <div data-i18n="Dokumen">Dokumen SPMI</div>
                                </a>
                            </li>
                            <li class="menu-item {{ \Route::is('penetapan.standar') ? 'active' : '' }}">
                                <a href="{{ route('penetapan.standar') }}" class="menu-link">
                                    <div data-i18n="Standar">Standar Yang Ditetapkan Institusi</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item {{ \Route::is('pelaksanaan.prodi') ? 'active' : '' }}">
                        <a href="{{ route('pelaksanaan.prodi') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bxs-book-open"></i>
                            <div data-i18n="Pelaksanaan">Pelaksanaan</div>
                        </a>
                    </li>
                    <li class="menu-item {{ \Route::is('evaluasi') ? 'active' : '' }}">
                        <a href="{{ route('evaluasi') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-task"></i>
                            <div data-i18n="Evaluasi">Evaluasi</div>
                        </a>
                    </li>
                    <li class="menu-item {{ \Route::is('pengendalian') ? 'active' : '' }}">
                        <a href="{{ route('pengendalian') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-sync bx-sm"></i>
                            <div data-i18n="Pengendalian">Pengendalian</div>
                        </a>
                    </li>
                    <li class="menu-item {{ \Route::is('peningkatan') ? 'active' : '' }}">
                        <a href="{{ route('peningkatan') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-bar-chart-alt bx-sm"></i>
                            <div data-i18n="Pengendalian">Peningkatan</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    @yield('navbar')
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div
                            class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0" style="font-size: small">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                | SI-Sistem Penjaminan Mutu Internal Fakultas Ilmu Pendidikan Universitas Trunojoyo
                                Madura
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

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

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('sneat/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('sneat/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('sneat/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('sneat/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('sneat/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('sneat/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('sneat/assets/js/dashboards-analytics.js') }}"></script>
    <script src="{{ asset('sneat/assets/js/extended-ui-perfect-scrollbar.js') }}"></script>


    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#Datatable').DataTable({
                "language": {
                    "paginate": {
                        "previous": "Sebelumnya",
                        "next": "Selanjutnya"
                    },
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ entri"
                }
            });
        });
    </script>

<script>
    $(document).ready(function() {
        // Saat halaman pertama kali dimuat, tampilkan tabel default
        showTable('DatatablesRenstraProgramStudinya');
    });

    function showTable(tableId) {
        console.log(tableId);

        // Sembunyikan semua div yang berisi tabel
        var tables = document.querySelectorAll('[id^="Datatables"]');
        tables.forEach(function(tableDiv) {
            // Cari elemen <table> di dalam div yang tersembunyi
            var tableElement = $(tableDiv).find('table').DataTable();
            if (tableElement) {
                tableElement.destroy();  // Hapus inisialisasi DataTables sebelum menyembunyikan tabel
            }
            tableDiv.style.display = 'none';  // Sembunyikan semua tabel
        });

        // Tampilkan div yang sesuai dengan ID yang diklik
        var selectedTableDiv = document.getElementById(tableId);
        if (selectedTableDiv) {
            selectedTableDiv.style.display = 'block';

            // Inisialisasi ulang DataTable hanya pada elemen <table> di dalam div yang ditampilkan
            $(selectedTableDiv).find('table').DataTable({
                "language": {
                    "paginate": {
                        "previous": "Sebelumnya",
                        "next": "Selanjutnya"
                    },
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ entri"
                }
            });
        }
    }
</script>




    {{-- <!-- JQuery dan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
</body>

</html>
