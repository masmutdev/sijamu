@extends('layout.sidebar')

@section('navbar')
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <div class="navbar-nav align-items-center" style="color: #007bff; font-size: 20px; font-weight:bold">Peningkatan</div>

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
        <h5 class="card-header">Peningkatan Standar Yang Ditetapkan Institusi</h5>
        <div class="table text-nowrap" id="horizontal-example">
            <table class="table">
                <thead class="table-purple">
                    <tr>
                        <th>No</th>
                        <th style="padding-left: 20px">Nama Dokumen</th>
                        <th>Peningkatan Standar</th>
                        <th style="padding-left: 30px">Tautan Dokumen Peningkatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    {{-- @foreach --}}
                    <tr>
                        <td>1</td>
                        <td class=" me-3" style="font-size: 13px">Pengaturan Standar Pendidikan Universitas Trunojoyo
                            Madura</td>
                            @php
                            // Ambil data file dari tabel file_p5 berdasarkan id_fp5
                            $file1 = DB::table('file_p5')->where('id_fp5', 1)->value('files');
                        @endphp

                        <td style="padding-left: 15px">
                            <input type="radio" name="selected_item1" value="Ada" {{ ($file1 && $file1 !== '') ? 'checked' : '' }}> Ada
                            <span></span>
                            <input type="radio" name="selected_item1" value="Tidak Ada" style="margin-left: 1em" {{ (!$file1 || $file1 === '') ? 'checked' : '' }}> Tidak Ada
                        </td>
                        <td style="padding-left: 90px">
                            @if($file1 && $file1 !== '')
                                <span class="badge bg-label-info me-1">Dokumen</span>
                            @else
                                <span class="me-1">Masih Dalam Proses</span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('editDokumenPeningkatan', 1) }}"><i
                                            class="bx bx-edit-alt me-1"></i>
                                        Ubah</a>
                                    <form method="POST"
                                        action="{{ route('hapusDokumenPeningkatan', 1) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item btn btn-outline-danger"><i
                                                class="bx bx-trash me-1"></i>
                                            Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td class=" me-3" style="font-size: 13px">Pengaturan Standar Penelitian Universitas Trunojoyo
                            Madura</td>
                            @php
                                // Ambil data file dari tabel file_p5 berdasarkan id_fp5
                                $file2 = DB::table('file_p5')->where('id_fp5', 2)->value('files');
                            @endphp

                            <td style="padding-left: 15px">
                                <input type="radio" name="selected_item2" value="Ada" {{ ($file2 && $file2 !== '') ? 'checked' : '' }}> Ada
                                <span></span>
                                <input type="radio" name="selected_item2" value="Tidak Ada" style="margin-left: 1em" {{ (!$file2 || $file2 === '') ? 'checked' : '' }}> Tidak Ada
                            </td>
                        <td style="padding-left: 90px">
                            @if($file2 && $file2 !== '')
                                <span class="badge bg-label-info me-1">Dokumen</span>
                            @else
                                <span class="me-1">Masih Dalam Proses</span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('editDokumenPeningkatan', 2) }}"><i class="bx bx-edit-alt me-1"></i>
                                        Ubah</a>
                                    <form method="POST"
                                        action="{{ route('hapusDokumenPeningkatan', 2) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item btn btn-outline-danger"><i
                                                class="bx bx-trash me-1"></i>
                                            Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td class=" me-3" style="font-size: 13px">Pengaturan Standar Pengabdian Kepada Masyarakat
                            Universitas Trunojoyo Madura</td>
                            @php
                            // Ambil data file dari tabel file_p5 berdasarkan id_fp5
                            $file3 = DB::table('file_p5')->where('id_fp5', 3)->value('files');
                        @endphp

                        <td style="padding-left: 15px">
                            <input type="radio" name="selected_item3" value="Ada" {{ ($file3 && $file3 !== '') ? 'checked' : '' }}> Ada
                            <span></span>
                            <input type="radio" name="selected_item3" value="Tidak Ada" style="margin-left: 1em" {{ (!$file3 || $file3 === '') ? 'checked' : '' }}> Tidak Ada
                        </td>
                        <td style="padding-left: 90px">
                            @if($file3 && $file3 !== '')
                                <span class="badge bg-label-info me-1">Dokumen</span>
                            @else
                                <span class="me-1">Masih Dalam Proses</span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('editDokumenPeningkatan', 3) }}"><i
                                            class="bx bx-edit-alt me-1"></i>
                                        Ubah</a>
                                    <form method="POST"
                                        action="{{ route('hapusDokumenPeningkatan', 3) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item btn btn-outline-danger"><i
                                                class="bx bx-trash me-1"></i>
                                            Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td class=" me-3" style="font-size: 13px">Standar di aspek lainnya</td>
                        @php
                            // Ambil data file dari tabel file_p5 berdasarkan id_fp5
                            $file4 = DB::table('file_p5')->where('id_fp5', 4)->value('files');
                        @endphp

                        <td style="padding-left: 15px">
                            <input type="radio" name="selected_item4" value="Ada" {{ ($file4 && $file4 !== '') ? 'checked' : '' }}> Ada
                            <span></span>
                            <input type="radio" name="selected_item4" value="Tidak Ada" style="margin-left: 1em" {{ (!$file4 || $file4 === '') ? 'checked' : '' }}> Tidak Ada
                        </td>
                        <td style="padding-left: 90px">
                            @if($file4 && $file4 !== '')
                                <span class="badge bg-label-info me-1">Dokumen</span>
                            @else
                                <span class="me-1">Masih Dalam Proses</span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('editDokumenPeningkatan', 4) }}"><i
                                            class="bx bx-edit-alt me-1"></i>Ubah</a>
                                    <form method="POST"
                                            action="{{ route('hapusDokumenPeningkatan', 4) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item btn btn-outline-danger"><i
                                                    class="bx bx-trash me-1"></i>
                                                Hapus</button>
                                        </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <li class=" me-3" style="font-size: 13px">Pengaturan Standar Layanan Kemahasiswaan
                                Universitas Trunojoyo Madura</li>
                        </td>
                        @php
                            // Ambil data file dari tabel file_p5 berdasarkan id_fp5
                            $file5 = DB::table('file_p5')->where('id_fp5', 5)->value('files');
                        @endphp

                        <td style="padding-left: 15px">
                            <input type="radio" name="selected_item5" value="Ada" {{ ($file5 && $file5 !== '') ? 'checked' : '' }}> Ada
                            <span></span>
                            <input type="radio" name="selected_item5" value="Tidak Ada" style="margin-left: 1em" {{ (!$file5 || $file5 === '') ? 'checked' : '' }}> Tidak Ada
                        </td>
                        <td style="padding-left: 90px">
                            @if($file5 && $file5 !== '')
                                <span class="badge bg-label-info me-1">Dokumen</span>
                            @else
                                <span class="me-1">Masih Dalam Proses</span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('editDokumenPeningkatan', 5) }}"><i
                                            class="bx bx-edit-alt me-1"></i> Ubah</a>
                                    <form method="POST"
                                            action="{{ route('hapusDokumenPeningkatan', 5) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item btn btn-outline-danger"><i
                                                    class="bx bx-trash me-1"></i>
                                                Hapus</button>
                                        </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <li class=" me-3" style="font-size: 13px">Pengaturan Standar Layanan Kerjasama Universitas
                                Trunojoyo Madura</li>
                        </td>
                        @php
                            // Ambil data file dari tabel file_p5 berdasarkan id_fp5
                            $file6 = DB::table('file_p5')->where('id_fp5', 6)->value('files');
                        @endphp

                        <td style="padding-left: 15px">
                            <input type="radio" name="selected_item6" value="Ada" {{ ($file6 && $file6 !== '') ? 'checked' : '' }}> Ada
                            <span></span>
                            <input type="radio" name="selected_item6" value="Tidak Ada" style="margin-left: 1em" {{ (!$file6 || $file6 === '') ? 'checked' : '' }}> Tidak Ada
                        </td>
                        <td style="padding-left: 90px">
                            @if($file6 && $file6 !== '')
                                <span class="badge bg-label-info me-1">Dokumen</span>
                            @else
                                <span class="me-1">Masih Dalam Proses</span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('editDokumenPeningkatan', 6) }}"><i
                                            class="bx bx-edit-alt me-1"></i> Ubah</a>
                                        <form method="POST"
                                            action="{{ route('hapusDokumenPeningkatan', 6) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item btn btn-outline-danger"><i
                                                    class="bx bx-trash me-1"></i>
                                                Hapus</button>
                                        </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <li class="me-3" style="font-size: 13px">Pengaturan Standar Tata Kelola Universitas
                                Trunojoyo Madura</li>
                        </td>
                        @php
                            // Ambil data file dari tabel file_p5 berdasarkan id_fp5
                            $file7 = DB::table('file_p5')->where('id_fp5', 7)->value('files');
                        @endphp

                        <td style="padding-left: 15px">
                            <input type="radio" name="selected_item7" value="Ada" {{ ($file7 && $file7 !== '') ? 'checked' : '' }}> Ada
                            <span></span>
                            <input type="radio" name="selected_item7" value="Tidak Ada" style="margin-left: 1em" {{ (!$file7 || $file7 === '') ? 'checked' : '' }}> Tidak Ada
                        </td>
                        <td style="padding-left: 90px">
                            @if($file7 && $file7 !== '')
                                <span class="badge bg-label-info me-1">Dokumen</span>
                            @else
                                <span class="me-1">Masih Dalam Proses</span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('editDokumenPeningkatan', 7) }}"><i
                                            class="bx bx-edit-alt me-1"></i> Ubah</a>
                                        <form method="POST"
                                            action="{{ route('hapusDokumenPeningkatan', 7) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item btn btn-outline-danger"><i
                                                    class="bx bx-trash me-1"></i>
                                                Hapus</button>
                                        </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    {{-- @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection
