@extends('layout.sidebar')

@section('navbar')
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <div class="navbar-nav align-items-center">
            <div class="nav-items d-flex align-item-center">Penjaminan Mutu Internal - Fakultas Ilmu Pendidikan</div>
        </div>

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
    <div class="row">
        <div class="col-lg-4 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0" style="width: 25px; height: 25px;">
                            <img src="{{ asset('sneat/assets/img/icons/unicons/checklist.png') }}" alt="Credit Card"
                                class="rounded" />
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                <a class="dropdown-item" href="/Penetapan/DokumenSPMI">View More</a>
                            </div>
                        </div>
                    </div>
                    <span style="color: #007bff; font-size: 20px; font-weight:bold;">Penetapan</span>
                    <h1 class="card-title text-nowrap mb-1"></h1>
                    <small class="text-gray fw-semibold">Dokumen Terkait Standar SPMI Yang Ditetapkan Perguruan Tinggi</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0" style="width: 25px; height: 25px;">
                            <img src="{{ asset('sneat/assets/img/icons/unicons/checklist.png') }}" alt="Credit Card"
                                class="rounded" />
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                <a class="dropdown-item" href="/Pelaksanaan/Prodi">View More</a>
                            </div>
                        </div>
                    </div>
                    <span style="color: #007bff; font-size: 20px; font-weight:bold;">Pelaksanaan</span>
                    <h1 class="card-title text-nowrap mb-1"></h1>
                    <small class="text-gray fw-semibold">Dokumen Terkait Pelaksanaan Standar SPMI Perguruan Tinggi</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0" style="width: 25px; height: 25px;">
                            <img src="{{ asset('sneat/assets/img/icons/unicons/caution-alert.png') }}" alt="Credit Card"
                                class="rounded" />
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                <a class="dropdown-item" href="/Evaluasi/AuditMutuInternal">View More</a>
                            </div>
                        </div>
                    </div>
                    <span style="color: #007bff; font-size: 20px; font-weight:bold;">Evaluasi</span>
                    <h1 class="card-title text-nowrap mb-1"></h1>
                    <small class="text-gray fw-semibold">Dokumen Terkait Evaluasi Pelaksanaan Standar SPMI Perguruan Tinggi</small>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0" style="width: 25px; height: 25px;">
                            <img src="{{ asset('sneat/assets/img/icons/unicons/checklist.png') }}" alt="Credit Card"
                                class="rounded" />
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                <a class="dropdown-item" href="/Pengendalian/Standar/RTM">View More</a>
                            </div>
                        </div>
                    </div>
                    <span style="color: #007bff; font-size: 20px; font-weight:bold;">Pengendalian</span>
                    <h1 class="card-title text-nowrap mb-1"></h1>
                    <small class="text-gray fw-semibold">Dokumen Terkait Pengendalian Standar SPMI Perguruan Tinggi</small>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0" style="width: 25px; height: 25px;">
                            <img src="{{ asset('sneat/assets/img/icons/unicons/caution-alert.png') }}" alt="Credit Card"
                                class="rounded" />
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                            </div>
                        </div>
                    </div>
                    <span style="color: #007bff; font-size: 20px; font-weight:bold;">Peningkatan</span>
                    <h1 class="card-title text-nowrap mb-1"></h1>
                    <small class="text-gray fw-semibold">Dokumen Terkait Peningkatan Standar SPMI Perguruan Tinggi</small>
                </div>
            </div>
        </div>
    </div>
@endsection
