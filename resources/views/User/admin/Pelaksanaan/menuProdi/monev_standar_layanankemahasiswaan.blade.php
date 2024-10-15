@extends('User.admin.Pelaksanaan.sidebar_prodi')
@section('tabel-unggah-dokumen')
    <table class="table table-bordered custom-table-sm" id="Datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Dokumen</th>
                <th>Tahun Akademik</th>
                <th>Unggahan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Monev Ketercapaian Standar Layanan Kemahasiswaan</td>
                <td>2022/2023</td>
                <td>Dokumen</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Monev Ketercapaian Standar Layanan Kemahasiswaan</td>
                <td>2023/2024</td>
                <td>Dokumen</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Monev Ketercapaian Standar Layanan Kemahasiswaan</td>
                <td>2024/2025</td>
                <td>Dokumen</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Monev Ketercapaian Standar Layanan Kemahasiswaan</td>
                <td>yyyy/yyyy</td>
                <td>Dokumen</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Monev Ketercapaian Standar Layanan Kemahasiswaan</td>
                <td>yyyy/yyyy</td>
                <td>
                    {{-- @php
                        $files = json_decode($row->files, true);
                    @endphp --}}

                    {{-- @if ($files && is_array($files)) --}}
                    {{-- @foreach ($files as $file) --}}
                    <a href="" class="badge bg-label-info me-1" target="_blank">
                        <i class="bi bi-link-45deg">Dokumen</i>
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
@endsection
