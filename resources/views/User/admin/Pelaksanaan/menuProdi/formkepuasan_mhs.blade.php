@extends('User.admin.Pelaksanaan.sidebar_prodi')
@section('tabel-unggah-dokumen')
    <table class="table table-bordered custom-table-sm" id="Datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Program Studi</th>
                <th>Tautan Pengisian Formulir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Pendidikan Bahasa dan Sastra Indonesia</td>
                <td><i class='bx bx-link' style="font-size:14px; font-family:Arial"> formulir</i></td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Pendidikan Ilmu Pengetahuan Alam</td>
                <td><i class='bx bx-link' style="font-size:14px; font-family:Arial"> formulir</i></td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Pendidikan Guru Sekolah Dasar</td>
                <td><i class='bx bx-link' style="font-size:14px; font-family:Arial"> formulir</i></td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Pendidikan Guru Pendidikan Anak Usia Dini</td>
                <td><i class='bx bx-link' style="font-size:14px; font-family:Arial"> formulir</i></td>
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
                        <i class='bx bx-link' style="font-size:14px; font-family:Arial"> formulir</i>
                    </a>
                    {{-- @endforeach --}}
                    {{-- @else
                        <p>Masih dalam proses</p>
                    @endif --}}
                </td>
                <td>
                    <a href="" class="btn btn-warning btn-xs"><i class="bx bx-edit-alt me-1"></i> </a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-xs"><i class="bx bx-trash me-1"></i> </button>
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
@endsection
