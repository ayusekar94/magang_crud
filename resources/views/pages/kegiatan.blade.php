@extends('page-starter') 

@section('isi')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
          <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">{{ $menu }}</h4>
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                  <a href="javascript: void(0);">Tables</a>
                </li>
                <li class="breadcrumb-item active">{{ $sub_menu }}</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- end page title -->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title mb-0">Daftar Kegiatan</h4>
              <button type="button" class="btn btn-primary w-sm ms-auto float-end" data-bs-toggle="modal" data-bs-target="#modalAdd">
                <i class="fas fa-folder-plus text-white-50"></i> Tambah </a>
              </button>
            </div>
            <!-- end card header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Nama Karyawan</th>
                    <th>Nama Kegiatan</th>
                    <th>Image</th>
                    <th>Tanggal</th>
                    <th>Deskripsi Kegiatan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody> @foreach ($kegiatan as $item) <tr>
                    <td>{{ $item->karyawan->nama }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                      @if ($item->image)
                        <img width="60px" height="60px" src="{{ asset($item->image) }}" >
                      @else
                        <p>tidak ada gambar</p>
                                                
                      @endif
                    </td>
                    <td>{{ $item->tgl}}</td>
                    <td>{{ mb_strimwidth($item->kegiatan, 0, 60, "..."); }}</td>
                    <td>
                      <form action="/kegiatan/{{ $item->id }}" method="POST" class="d-inline"> @method('DELETE') @csrf {{-- Update  --}}
                        <button type="button" value="{{ $item->id }}" class="btn btn-primary editbtn btn-sm open_modal" data-bs-toggle="modal" data-bs-target="#modalEdit" data-id={{ $item->id }} data-name="{{ $item->name }}" data-tgl="{{ $item->tgl }}" data-kegiatan="{{ $item->kegiatan }}" data-karyawan_nip="{{ $item->karyawan_nip }}" data-gambar="{{ $item->image }}">
                          <i class="fas fa-edit"></i>
                        </button>
                        {{-- <a href="category/{{ $item->id }}/edit" class="badge bg-info" data-bs-toggle="modal" data-bs-target="#editModal"> <i class="fas fa-edit"></i>
                        </a> --}} {{-- Delete  --}}
                        <button class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin ?')">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </form>
                    </td>
                  </tr> @endforeach </tbody>
              </table>
            </div>
            <!-- end card body -->
  <!-- End Page-content --> 

  {{-- MODAL  --}}
  @include('pages.modal_add')
  @include('pages.modal_edit')
@endsection