@extends('User.admin.Pelaksanaan.sidebar_prodi')
@section('tabel-unggah-dokumen')

    <!-- Tabel yang akan ditampilkan -->
    <div id="DatatablesRenstraProgramStudinya">
        <!-- Tabel Kinerja Program Studi di sini -->
        <table class="table table-bordered custom-table-sm" >
                    <thead>
            <tr>
                <th>No</th>
                <th>Program Studi</th>
                <th>Dokumen Renstra</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Pendidikan Bahasa dan Sastra Indonesia</td>
                <td>Renstra-PBSI</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Pendidikan Ilmu Pengetahuan Alam</td>
                <td>Renstra-PIPA</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Pendidikan Guru Sekolah Dasar</td>
                <td>Renstra-PGSD</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Pendidikan Guru Pendidikan Anak Usia Dini</td>
                <td>Renstra-PGPAUD</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Pendidikan Informatika</td>
                <td>
                    {{-- @php
                        $files = json_decode($row->files, true);
                    @endphp --}}

                    {{-- @if ($files && is_array($files)) --}}
                    {{-- @foreach ($files as $file) --}}
                    <a href="" class="badge bg-label-info me-1" target="_blank">
                        <i class="bi bi-link-45deg">Renstra-PIF</i>
                    </a>
                    {{-- @endforeach --}}
                    {{-- @else
                        <p>Masih dalam proses</p>
                    @endif --}}
                </td>
                <td>
                    <a href="" class="btn btn-warning btn-xs"><i class="bx bx-edit-alt me-1"></i>                    </a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-xs"><i class="bx bx-trash me-1"></i>                    </button>
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
        </table>
    </div>

    <div id="DatatablesKinerjaProgramStudinya">
        <!-- Tabel Kinerja Program Studi di sini -->
        <table class="table table-bordered custom-table-sm" >
                    <thead>
            <tr>
                <th>No</th>
                <th>Program Studi</th>
                <th>Dokumen Program Studi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Pendidikan Bahasa dan Sastra Indonesia</td>
                <td>Renstra-PBSI</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Pendidikan Ilmu Pengetahuan Alam</td>
                <td>Renstra-PIPA</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Pendidikan Guru Sekolah Dasar</td>
                <td>Renstra-PGSD</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Pendidikan Guru Pendidikan Anak Usia Dini</td>
                <td>Renstra-PGPAUD</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Pendidikan Informatika</td>
                <td>
                    {{-- @php
                        $files = json_decode($row->files, true);
                    @endphp --}}

                    {{-- @if ($files && is_array($files)) --}}
                    {{-- @foreach ($files as $file) --}}
                    <a href="" class="badge bg-label-info me-1" target="_blank">
                        <i class="bi bi-link-45deg">Renstra-PIF</i>
                    </a>
                    {{-- @endforeach --}}
                    {{-- @else
                        <p>Masih dalam proses</p>
                    @endif --}}
                </td>
                <td>
                    <a href="" class="btn btn-warning btn-xs"><i class="bx bx-edit-alt me-1"></i>                    </a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-xs"><i class="bx bx-trash me-1"></i>                    </button>
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
        </table>
    </div>

    <div id="DatatablesKurikulum">
        <!-- Tabel Dokumen Kurikulum di sini -->
        <table class="table table-bordered custom-table-sm" >
                    <thead>
            <tr>
                <th>No</th>
                <th>Program Studi</th>
                <th>Dokumen Kurikulum</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Pendidikan Bahasa dan Sastra Indonesia</td>
                <td>Renstra-PBSI</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Pendidikan Ilmu Pengetahuan Alam</td>
                <td>Renstra-PIPA</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Pendidikan Guru Sekolah Dasar</td>
                <td>Renstra-PGSD</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Pendidikan Guru Pendidikan Anak Usia Dini</td>
                <td>Renstra-PGPAUD</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Pendidikan Informatika</td>
                <td>
                    {{-- @php
                        $files = json_decode($row->files, true);
                    @endphp --}}

                    {{-- @if ($files && is_array($files)) --}}
                    {{-- @foreach ($files as $file) --}}
                    <a href="" class="badge bg-label-info me-1" target="_blank">
                        <i class="bi bi-link-45deg">Renstra-PIF</i>
                    </a>
                    {{-- @endforeach --}}
                    {{-- @else
                        <p>Masih dalam proses</p>
                    @endif --}}
                </td>
                <td>
                    <a href="" class="btn btn-warning btn-xs"><i class="bx bx-edit-alt me-1"></i>                    </a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-xs"><i class="bx bx-trash me-1"></i>                    </button>
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
        </table>
    </div>

    <div id="DatatablesRPS">
        <!-- Tabel RPS di sini -->
        <table class="table table-bordered custom-table-sm" >
                    <thead>
            <tr>
                <th>No</th>
                <th>Program Studi</th>
                <th>Dokumen RPS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Pendidikan Bahasa dan Sastra Indonesia</td>
                <td>Renstra-PBSI</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Pendidikan Ilmu Pengetahuan Alam</td>
                <td>Renstra-PIPA</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Pendidikan Guru Sekolah Dasar</td>
                <td>Renstra-PGSD</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Pendidikan Guru Pendidikan Anak Usia Dini</td>
                <td>Renstra-PGPAUD</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Pendidikan Informatika</td>
                <td>
                    {{-- @php
                        $files = json_decode($row->files, true);
                    @endphp --}}

                    {{-- @if ($files && is_array($files)) --}}
                    {{-- @foreach ($files as $file) --}}
                    <a href="" class="badge bg-label-info me-1" target="_blank">
                        <i class="bi bi-link-45deg">Renstra-PIF</i>
                    </a>
                    {{-- @endforeach --}}
                    {{-- @else
                        <p>Masih dalam proses</p>
                    @endif --}}
                </td>
                <td>
                    <a href="" class="btn btn-warning btn-xs"><i class="bx bx-edit-alt me-1"></i>                    </a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-xs"><i class="bx bx-trash me-1"></i>                    </button>
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
        </table>
    </div>

    <div id="DatatablesMonitoring">
        <!-- Tabel Monitoring di sini -->
        <table class="table table-bordered custom-table-sm" >
                    <thead>
            <tr>
                <th>No</th>
                <th>Program Studi</th>
                <th>Dokumen Monitoring</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Pendidikan Bahasa dan Sastra Indonesia</td>
                <td>Renstra-PBSI</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Pendidikan Ilmu Pengetahuan Alam</td>
                <td>Renstra-PIPA</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Pendidikan Guru Sekolah Dasar</td>
                <td>Renstra-PGSD</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Pendidikan Guru Pendidikan Anak Usia Dini</td>
                <td>Renstra-PGPAUD</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Pendidikan Informatika</td>
                <td>
                    {{-- @php
                        $files = json_decode($row->files, true);
                    @endphp --}}

                    {{-- @if ($files && is_array($files)) --}}
                    {{-- @foreach ($files as $file) --}}
                    <a href="" class="badge bg-label-info me-1" target="_blank">
                        <i class="bi bi-link-45deg">Renstra-PIF</i>
                    </a>
                    {{-- @endforeach --}}
                    {{-- @else
                        <p>Masih dalam proses</p>
                    @endif --}}
                </td>
                <td>
                    <a href="" class="btn btn-warning btn-xs"><i class="bx bx-edit-alt me-1"></i>                    </a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-xs"><i class="bx bx-trash me-1"></i>                    </button>
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
        </table>
    </div>
    <div id="DatatablesCPL">
        <!-- Tabel CPL di sini -->
        <table class="table table-bordered custom-table-sm" >
                    <thead>
            <tr>
                <th>No</th>
                <th>Program Studi</th>
                <th>Dokumen CPL</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Pendidikan Bahasa dan Sastra Indonesia</td>
                <td>Renstra-PBSI</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Pendidikan Ilmu Pengetahuan Alam</td>
                <td>Renstra-PIPA</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Pendidikan Guru Sekolah Dasar</td>
                <td>Renstra-PGSD</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Pendidikan Guru Pendidikan Anak Usia Dini</td>
                <td>Renstra-PGPAUD</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Pendidikan Informatika</td>
                <td>
                    {{-- @php
                        $files = json_decode($row->files, true);
                    @endphp --}}

                    {{-- @if ($files && is_array($files)) --}}
                    {{-- @foreach ($files as $file) --}}
                    <a href="" class="badge bg-label-info me-1" target="_blank">
                        <i class="bi bi-link-45deg">Renstra-PIF</i>
                    </a>
                    {{-- @endforeach --}}
                    {{-- @else
                        <p>Masih dalam proses</p>
                    @endif --}}
                </td>
                <td>
                    <a href="" class="btn btn-warning btn-xs"><i class="bx bx-edit-alt me-1"></i>                    </a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-xs"><i class="bx bx-trash me-1"></i>                    </button>
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
        </table>
    </div>
    <div id="DatatablesPanduanRPS">
        <!-- Tabel CPL di sini -->
        <table class="table table-bordered custom-table-sm" >
                    <thead>
            <tr>
                <th>No</th>
                <th>Program Studi</th>
                <th>Dokumen RPS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Pendidikan Bahasa dan Sastra Indonesia</td>
                <td>Renstra-PBSI</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Pendidikan Ilmu Pengetahuan Alam</td>
                <td>Renstra-PIPA</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Pendidikan Guru Sekolah Dasar</td>
                <td>Renstra-PGSD</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Pendidikan Guru Pendidikan Anak Usia Dini</td>
                <td>Renstra-PGPAUD</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Pendidikan Informatika</td>
                <td>
                    {{-- @php
                        $files = json_decode($row->files, true);
                    @endphp --}}

                    {{-- @if ($files && is_array($files)) --}}
                    {{-- @foreach ($files as $file) --}}
                    <a href="" class="badge bg-label-info me-1" target="_blank">
                        <i class="bi bi-link-45deg">Renstra-PIF</i>
                    </a>
                    {{-- @endforeach --}}
                    {{-- @else
                        <p>Masih dalam proses</p>
                    @endif --}}
                </td>
                <td>
                    <a href="" class="btn btn-warning btn-xs"><i class="bx bx-edit-alt me-1"></i>                    </a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-xs"><i class="bx bx-trash me-1"></i>                    </button>
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
        </table>
    </div>
    <div id="DatatablesPanduanMutuSoal">
        <!-- Tabel CPL di sini -->
        <table class="table table-bordered custom-table-sm" >
                    <thead>
            <tr>
                <th>No</th>
                <th>Program Studi</th>
                <th>Dokumen Panduan Mutu Soal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Pendidikan Bahasa dan Sastra Indonesia</td>
                <td>Renstra-PBSI</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Pendidikan Ilmu Pengetahuan Alam</td>
                <td>Renstra-PIPA</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Pendidikan Guru Sekolah Dasar</td>
                <td>Renstra-PGSD</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Pendidikan Guru Pendidikan Anak Usia Dini</td>
                <td>Renstra-PGPAUD</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Pendidikan Informatika</td>
                <td>
                    {{-- @php
                        $files = json_decode($row->files, true);
                    @endphp --}}

                    {{-- @if ($files && is_array($files)) --}}
                    {{-- @foreach ($files as $file) --}}
                    <a href="" class="badge bg-label-info me-1" target="_blank">
                        <i class="bi bi-link-45deg">Renstra-PIF</i>
                    </a>
                    {{-- @endforeach --}}
                    {{-- @else
                        <p>Masih dalam proses</p>
                    @endif --}}
                </td>
                <td>
                    <a href="" class="btn btn-warning btn-xs"><i class="bx bx-edit-alt me-1"></i>                    </a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-xs"><i class="bx bx-trash me-1"></i>                    </button>
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
        </table>
    </div>
    <div id="DatatablesPanduanKisi">
        <!-- Tabel CPL di sini -->
        <table class="table table-bordered custom-table-sm" >
                    <thead>
            <tr>
                <th>No</th>
                <th>Program Studi</th>
                <th>Dokumen Panduan Kisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Pendidikan Bahasa dan Sastra Indonesia</td>
                <td>Renstra-PBSI</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Pendidikan Ilmu Pengetahuan Alam</td>
                <td>Renstra-PIPA</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Pendidikan Guru Sekolah Dasar</td>
                <td>Renstra-PGSD</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Pendidikan Guru Pendidikan Anak Usia Dini</td>
                <td>Renstra-PGPAUD</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Pendidikan Informatika</td>
                <td>
                    {{-- @php
                        $files = json_decode($row->files, true);
                    @endphp --}}

                    {{-- @if ($files && is_array($files)) --}}
                    {{-- @foreach ($files as $file) --}}
                    <a href="" class="badge bg-label-info me-1" target="_blank">
                        <i class="bi bi-link-45deg">Renstra-PIF</i>
                    </a>
                    {{-- @endforeach --}}
                    {{-- @else
                        <p>Masih dalam proses</p>
                    @endif --}}
                </td>
                <td>
                    <a href="" class="btn btn-warning btn-xs"><i class="bx bx-edit-alt me-1"></i>                    </a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-xs"><i class="bx bx-trash me-1"></i>                    </button>
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
        </table>
    </div>
    <div id="DatatablesFormulirKepuasan">
        <!-- Tabel CPL di sini -->
        <table class="table table-bordered custom-table-sm" >
                    <thead>
            <tr>
                <th>No</th>
                <th>Program Studi</th>
                <th>Dokumen Formulir Kepuasan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Pendidikan Bahasa dan Sastra Indonesia</td>
                <td>Renstra-PBSI</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Pendidikan Ilmu Pengetahuan Alam</td>
                <td>Renstra-PIPA</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Pendidikan Guru Sekolah Dasar</td>
                <td>Renstra-PGSD</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Pendidikan Guru Pendidikan Anak Usia Dini</td>
                <td>Renstra-PGPAUD</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Pendidikan Informatika</td>
                <td>
                    {{-- @php
                        $files = json_decode($row->files, true);
                    @endphp --}}

                    {{-- @if ($files && is_array($files)) --}}
                    {{-- @foreach ($files as $file) --}}
                    <a href="" class="badge bg-label-info me-1" target="_blank">
                        <i class="bi bi-link-45deg">Renstra-PIF</i>
                    </a>
                    {{-- @endforeach --}}
                    {{-- @else
                        <p>Masih dalam proses</p>
                    @endif --}}
                </td>
                <td>
                    <a href="" class="btn btn-warning btn-xs"><i class="bx bx-edit-alt me-1"></i>                    </a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-xs"><i class="bx bx-trash me-1"></i>                    </button>
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
        </table>
    </div>
    <div id="DatatablesMonitoringLayanan">
        <!-- Tabel CPL di sini -->
        <table class="table table-bordered custom-table-sm" >
                    <thead>
            <tr>
                <th>No</th>
                <th>Program Studi</th>
                <th>Dokumen Monitoring Layanan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Pendidikan Bahasa dan Sastra Indonesia</td>
                <td>Renstra-PBSI</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Pendidikan Ilmu Pengetahuan Alam</td>
                <td>Renstra-PIPA</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Pendidikan Guru Sekolah Dasar</td>
                <td>Renstra-PGSD</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Pendidikan Guru Pendidikan Anak Usia Dini</td>
                <td>Renstra-PGPAUD</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Pendidikan Informatika</td>
                <td>
                    {{-- @php
                        $files = json_decode($row->files, true);
                    @endphp --}}

                    {{-- @if ($files && is_array($files)) --}}
                    {{-- @foreach ($files as $file) --}}
                    <a href="" class="badge bg-label-info me-1" target="_blank">
                        <i class="bi bi-link-45deg">Renstra-PIF</i>
                    </a>
                    {{-- @endforeach --}}
                    {{-- @else
                        <p>Masih dalam proses</p>
                    @endif --}}
                </td>
                <td>
                    <a href="" class="btn btn-warning btn-xs"><i class="bx bx-edit-alt me-1"></i>                    </a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-xs"><i class="bx bx-trash me-1"></i>                    </button>
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
        </table>
    </div>
@endsection
