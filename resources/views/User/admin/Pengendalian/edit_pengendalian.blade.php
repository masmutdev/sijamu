@extends('layout.sidebar')

@section('navbar')
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <div class="navbar-nav align-items-center">
            <div class="nav-items d-flex align-item-center">Edit Pengendalian Standar SPMI Perguruan Tinggi</div>
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
                        <form method="POST" action="{{ route('updateDokumenPengendalian', $oldData->id_pengendalian) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <label class="form-label" for="namaDokumen_evaluasi">Nama Bidang Pengaturan Standar</label>
                            <select class="form-select" id="namaDokumen_evaluasi" name="bidang_standar" required onchange="toggleManualInput()">
                                <option value="" disabled {{ old('bidang_standar', $bidang_standar) === null ? 'selected' : '' }}>Pilih Nama Dokumen</option>
                                <option value="Standar Pendidikan" {{ old('bidang_standar', $bidang_standar) === 'Standar Pendidikan' ? 'selected' : '' }}>Standar Pendidikan Universitas Trunojoyo Madura</option>
                                <option value="Standar Penelitian" {{ old('bidang_standar', $bidang_standar) === 'Standar Penelitian' ? 'selected' : '' }}>Standar Penelitian Universitas Trunojoyo Madura</option>
                                <option value="Standar Pengabdian" {{ old('bidang_standar', $bidang_standar) === 'Standar Pengabdian' ? 'selected' : '' }}>Standar Pengabdian Kepada Masyarakat Universitas Trunojoyo Madura</option>
                                <option value="Standar Penelitian" {{ old('bidang_standar', $bidang_standar) === 'Standar Penelitian' ? 'selected' : '' }}>Standar Penelitian Universitas Trunojoyo Madura</option>
                            </select>
                            <div class="mb-3">
                                <label class="form-label" for="nama_prodi">Program Studi</label>
                                <select class="form-select" id="nama_prodi" name="nama_prodi" required>
                                    <option value="" disabled {{ old('nama_prodi', $nama_prodi) === null ? 'selected' : '' }}>Pilih Program Studi</option>
                                    <option value="Pendidikan Bahasa dan Sastra Indonesia" {{ old('nama_prodi', $nama_prodi) === 'Pendidikan Bahasa dan Sastra Indonesia' ? 'selected' : '' }}>Pendidikan Bahasa dan Sastra Indonesia</option>
                                    <option value="Pendidikan Guru Sekolah Dasar" {{ old('nama_prodi', $nama_prodi) === 'Pendidikan Guru Sekolah Dasar' ? 'selected' : '' }}>Pendidikan Guru Sekolah Dasar</option>
                                    <option value="Pendidikan Ilmu Pengetahuan Alam" {{ old('nama_prodi', $nama_prodi) === 'Pendidikan Ilmu Pengetahuan Alam' ? 'selected' : '' }}>Pendidikan Ilmu Pengetahuan Alam</option>
                                    <option value="Pendidikan Guru Pendidikan Anak Usia Dini" {{ old('nama_prodi', $nama_prodi) === 'Pendidikan Guru Pendidikan Anak Usia Dini' ? 'selected' : '' }}>Pendidikan Guru Pendidikan Anak Usia Dini</option>
                                    <option value="Pendidikan Informatika" {{ old('nama_prodi', $nama_prodi) === 'Pendidikan Informatika' ? 'selected' : '' }}>Pendidikan Informatika</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="formFileMultiple">Laporan RTM</label>
                                <input type="file" class="form-control" id="formFileMultiple" multiple name="laporan_rtm[]" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="formFileMultiple">Laporan RTL</label>
                                <input type="file" class="form-control" id="formFileMultiple" multiple name="laporan_rtl[]" />
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">{{ isset($evaluasi) }}Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

<script>
    function toggleManualInput() {
        var namaDokumenSelect = document.getElementById("nama_fileeval");
        var manualInputDiv = document.getElementById("manualNamaDokumen");

        if (namaDokumenSelect.value === "Dokumen Lainnya") {
            manualInputDiv.style.display = "block";
            document.getElementById("manual_namaDokumen").required = true;
        } else {
            manualInputDiv.style.display = "none";
            document.getElementById("manual_namaDokumen").required = false;
        }
    }
</script>
