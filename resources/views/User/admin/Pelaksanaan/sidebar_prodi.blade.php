@extends('layout.sidebar')

@section('navbar')
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <div class="navbar-nav align-items-center" style="color: #007bff; font-size: 20px; font-weight:bold">Pelaksanaan</div>

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{ asset('sneat/assets/img/avatars/1.png') }}" alt
                            class="w-px-40 h-auto rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('sneat/assets/img/avatars/1.png') }}" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">John Doe</span>
                                    <small class="text-muted">Admin</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bx bx-cog me-2"></i>
                            <span class="align-middle">Settings</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('logout')}}">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
@endsection

@section('content')
    <div>
        <div class="nav-align-top mb-4">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a type="button" class="nav-link active" href="{{ route('pelaksanaan.prodi') }}">
                        Prodi
                    </a>
                </li>
                <li class="nav-item">
                    <a type="button" class="nav-link" href="{{ route('pelaksanaan.fakultas') }}">
                        Fakultas
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane show active" id="navs-top-home" role="tabpanel">
                    <div class="row">
                        <!-- Sub Standar -->
                        <div class="col-lg-4">
                            <div class="card overflow-hidden mb-4" style="height: 300px;">
                                <div class="card-body left" id="vertical-example">
                                    <div><b>Strategi Pencapaian</b></div>
                                    <ul>
                                        <li style="font-size: 12px">
                                            <a href="javascript:void(0);" onclick="showTable('DatatablesRenstraProgramStudinya')">Renstra Program Studi</a>
                                        </li>
                                        <li style="font-size: 12px">
                                            <a href="javascript:void(0);" onclick="showTable('DatatablesKinerjaProgramStudinya')">Laporan Kinerja Program Studi</a>
                                        </li>
                                    </ul>
                                    <div><b>Standar Proses Pembelajaran</b></div>
                                    <ul>
                                        <li style="font-size: 12px"><a href="javascript:void(0);" onclick="showTable('DatatablesKurikulum')">Dokumen Kurikulum</a></li>
                                        <li style="font-size: 12px"><a href="javascript:void(0);" onclick="showTable('DatatablesRPS')">Rencana Pembelajaran Semester (RPS)</a></li>
                                        <li style="font-size: 12px"><a href="javascript:void(0);" onclick="showTable('DatatablesMonitoring')">Dokumen Monitoring dan Evaluasi Kegiatan Program MBKM</a></li>
                                        <li style="font-size: 12px"><a href="javascript:void(0);" onclick="showTable('DatatablesCPL')">Capaian Pembelajaran Lulusan (CPL)</a></li>
                                        <li style="font-size: 12px"><a href="javascript:void(0);" onclick="showTable('DatatablesPanduanRPS')">Panduan RPS</a></li>
                                        <li style="font-size: 12px"><a href="javascript:void(0);" onclick="showTable('DatatablesPanduanMutuSoal')">Panduan Mutu Soal</a></li>
                                        <li style="font-size: 12px"><a href="javascript:void(0);" onclick="showTable('DatatablesPanduanKisi')">Panduan Kisi Kisi Soal</a></li>
                                    </ul>
                                    <div><b>Standar Layanan Kemahasiswaan</b></div>
                                    <ul>
                                        <li style="font-size: 12px"><a href="javascript:void(0);" onclick="showTable('DatatablesFormulirKepuasan')">Formulir Kepuasan Mahasiswa</a></li>
                                        <li style="font-size: 12px"><a href="javascript:void(0);" onclick="showTable('DatatablesMonitoringLayanan')">Dokumen Monitoring dan Evaluasi Ketercapaian Standar Layanan Kemahasiswaan</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--/ Sub Standar -->

                        <!-- Tabel Unggah Dokumen Sub Standar -->
                        <div class="col-lg-8">
                            <div class="card overflow-hidden mb-4" style="height: 300px">
                                <div class="card-body right" id="both-scrollbars-example">
                                    @yield('tabel-unggah-dokumen')
                                </div>
                            </div>
                        </div>
                        <!--/ Tabel Unggah Dokumen Sub Standar -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
