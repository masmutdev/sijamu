@extends('layout.sidebar')

@section('navbar')
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <div class="navbar-nav align-items-center">
            <div class="nav-items d-flex align-item-center">Tambah Dokumen Perangkat SPMI</div>
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
                        <form method="POST" action="{{ url('tambahDokumenPerangkatSPMI-2') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="bx bx-file">Nama Dokumen</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-file"></i></span>
                                    <input type="text" class="form-control" id="bx bx-file" name="nama_filep1"
                                        placeholder="Nama Dokumen" aria-label="" aria-describedby="bx bx-file" required />
                                    <input type="hidden" name="submenu_penetapan" value="perangkatspmi">
                                </div>
                            </div>
                            {{-- <div>

                            </div> --}}
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Pilih Dokumen</label>
                                <input class="form-control" type="file" name="files[]" id="formFileMultiple" multiple />
                            </div>
                            {{-- required --}}
                            <button type="submit" class="btn btn-primary">{{ isset($dokumenp1) }}Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
