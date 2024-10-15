@extends('layout.sidebar')

@section('navbar')
<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
    </a>
</div>

<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <div class="navbar-nav align-items-center">
        <div class="nav-items d-flex align-item-center">Tambah Tim Jaminan Mutu Fakultas</div>
    </div>
@endsection

@section('content')
    <div class="row">

        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"></h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('jamutims.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">NIP</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input type="text" class="form-control" id="basic-icon-default-fullname"
                                    name="nip"
                                    placeholder="Nomor Induk Pegawai" aria-label=""
                                    aria-describedby="basic-icon-default-fullname2" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Nama</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input type="text" class="form-control" id="basic-icon-default-fullname"
                                    name="nama"
                                    placeholder="Nama Lengkap" aria-label=""
                                    aria-describedby="basic-icon-default-fullname2" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Alamat Email</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="bx bx-buildings"></i></span>
                                <input type="text" id="basic-icon-default-company" class="form-control"
                                    name="email"
                                    placeholder="@email.com" aria-label=""
                                    aria-describedby="basic-icon-default-company2" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="box-icon-id-card">Penanggung Jawab</label>
                            <div class="input-group input-group-merge">
                                <span id="" class="input-group-text"><i
                                        class="bx bx-id-card"></i></span>
                                <input type="text" id="basic-icon-default-fullname2" class="form-control"
                                    name="PJ"
                                    placeholder="Selaku" aria-label=""
                                    aria-describedby="basic-icon-default-fullname2" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ isset($jamutims) }}Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
