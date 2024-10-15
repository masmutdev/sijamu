@extends('User.admin.Pelaksanaan.sidebar_prodi')
@section('tabel-unggah-dokumen')
    <table class="table table-bordered custom-table-sm" id="Datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Dokumen</th>
                <th>Program Studi</th>
                <th>Unggahan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Panduan Kisi-Kisi Soal PBSI</td>
                <td>Pendidikan Bahasa dan Sastra Indonesia</td>
                <td>Dokumen</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Panduan Kisi-Kisi Soal PIPA</td>
                <td>Pendidikan Ilmu Pengetahuan Alam</td>
                <td>Dokumen</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Panduan Kisi-Kisi Soal PGSD</td>
                <td>Pendidikan Guru Sekolah Dasar</td>
                <td>Dokumen</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Panduan Kisi-Kisi Soal PGPAUD</td>
                <td>Pendidikan Guru Pendidikan Anak Usia Dini</td>
                <td>Dokumen</td>
                <td>jsdbhdbnd</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Panduan Kisi-Kisi Soal PIF</td>
                <td>Pendidikan Informatika</td>
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
