@extends('layout.sidebar')

@section('navbar')
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <div class="navbar-nav align-items-center">
            <div class="nav-items d-flex align-item-center">Dokumen Perangkat SPMI</div>
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
                        <form method="POST" action="{{ route('updateDokumenPerangkat', $oldData->id_penetapan) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Nama Dokumen</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        name="nama_filep1" value="{{$oldData->nama_filep1}}" placeholder="Nama Dokumen" aria-label=""
                                        aria-describedby="basic-icon-default-fullname2" />
                                </div>
                            </div>
                            <input type="hidden" name="submenu_penetapan" value="{{$oldData->submenu_penetapan}}">
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Pilih File</label>
                                <input class="form-control" type="file" name="files[]" value="{{$oldData->files}}" id="formFileMultiple" multiple />
                              </div>
                            <button type="submit" class="btn btn-primary">{{ isset($dokumenp1) }}Ubah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
