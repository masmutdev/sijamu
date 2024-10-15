@extends('layout.sidebar')

@section('navbar')
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <div class="navbar-nav align-items-center">
            <div class="nav-items d-flex align-item-center">Jaminan Mutu Fakultas (JMF)</div>
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
    <div class="card">
        <h5 class="card-header">Tim Jaminan Mutu Fakultas dan Prodi Ilmu di Fakultas Ilmu Pendidikan</h5>
        <div class="table-responsive text-nowrap">
            <table class="table custom-table-sm dataTables_paginate .paginate_button" id="Datatable">
                <thead class="table-purple">
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Penanggung Jawab</th>
                        @if(Auth::user() && (Auth::user()->level == 'Admin' || Auth::user()->level == 'Jaminan Mutu'))
                        <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    @foreach ($jamutims as $key => $row)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $row->nip }}</td>
                            <td>{{ $row->nama }}</td>
                            <td><span class="badge bg-label-primary me-1">{{ $row->email }}</span></td>
                            <td>{{ $row->PJ }}</td>
                            @if(Auth::user() && (Auth::user()->level == 'Admin' || Auth::user()->level == 'Jaminan Mutu'))
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <div>
                                            <a class="dropdown-item" href="{{ route('editTimJAMU', $row->id) }}">
                                                <i class="bx bx-edit-alt me-1"></i> Ubah</a>
                                        </div>
                                        <div>
                                            <form method="POST" action="/TimPenjaminanMutu/{{ $row->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item"><i class="bx bx-trash me-1"></i> Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if(Auth::user() && (Auth::user()->level == 'Admin' || Auth::user()->level == 'Jaminan Mutu'))
    <div class="row">
        <div class="col-md-6 col-sm-2 demo-inline-spacing">
            <button type="button" class="btn btn-primary" style="padding-left: 50px; padding-right: 50px"
                onclick="window.location.href='{{ route('tambahTimJAMU') }}'">Tambah</button>
            @if (session('success'))
                <div>{{ @session('success') }}</div>
            @endif
        </div>
    </div>
    @endif
@endsection

<style>
    /* Custom CSS for DataTable */
    table.dataTable td,
    table.dataTable th {
        padding: 12px 15px;
    }

    .dataTables_wrapper {
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(197, 100, 165, 0.1);
    }

    /* Mengubah tampilan pagination DataTable */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        background-color: #4CAF50;
        /* Warna latar belakang */
        color: rgb(194, 108, 247);
        /* Warna teks */
        border: 1px solid #4CAF50;
        /* Warna border */
        padding: 6px 12px;
        /* Ukuran padding tombol */
        margin: 2px;
        border-radius: 5px;
        /* Membuat sudut tombol membulat */
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
        /* Transisi warna */
    }

    /* Mengubah tampilan saat tombol pagination di-hover */
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background-color: #45a049;
        /* Warna latar belakang saat di-hover */
        color: white;
        /* Warna teks */
        border-color: #45a049;
        /* Warna border saat di-hover */
    }

    /* Mengubah tampilan pagination aktif */
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background-color: #2196F3;
        /* Warna latar belakang tombol aktif */
        color: white;
        /* Warna teks tombol aktif */
        border: 1px solid #2196F3;
        /* Warna border tombol aktif */
        border-radius: 5px;
        /* Membuat sudut tombol membulat */
    }

    /* Mengubah tampilan tombol pagination tidak aktif */
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
        background-color: #cccccc;
        /* Warna latar belakang tombol tidak aktif */
        color: #666666;
        /* Warna teks tombol tidak aktif */
        border: 1px solid #cccccc;
        /* Warna border tombol tidak aktif */
        cursor: not-allowed;
        /* Cursor tidak diizinkan */
    }
</style>
