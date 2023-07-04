@extends('page-starter')

@section('isi')
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Advance Tables</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                            <li class="breadcrumb-item active">Advance Tables</li>
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
                                        <button type="button" class="bd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                          <i class="fas fa-folder-plus text-white-50"></i> Tambah</a>
                                        </button>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                      <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Name</th>
                                            <th>Tanggal</th>
                                            <th>Kegiatan</th>
                                            <th>Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($kegiatan as $item)
                                          <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->tgl}}</td>
                                            <td>{{ $item->kegiatan}}</td>
                                            <td>
                                              <form action="/kegiatan/{{ $item->id }}" method="POST" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                {{-- Update  --}}
                                                <button type="button" value="{{ $item->id }}" class="btn btn-primary editbtn btn-sm"><i class="fas fa-edit"></i></button>
                                                {{-- <a href="category/{{ $item->id }}/edit" class="badge bg-info" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></a>   --}}
                                                {{-- Delete  --}}
                                                <button class="badge bg-danger border-0" onclick="return confirm('apakah anda yakin ?')"><i class="fas fa-trash-alt"></i></button>
                                              </form>
                                            </td>
                                          </tr>
                                        @endforeach
                                      </tbody>
                                      </table>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
      
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/kegiatan" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" />
                  @error('nama')
                          <code>
                            {{ $message }}
                          </code>
                            @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tanggal</label>
                <div class="col-sm-9">
                  <input type="date" name="tgl" class="form-control" />
                  @error('tgl')
                          <code>
                            {{ $message }}
                          </code>
                            @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Kegiatan</label>
                <div class="col-sm-9">
                  <input type="text" name="kegiatan" class="form-control" />
                  @error('kegiatan')
                          <code>
                            {{ $message }}
                          </code>
                            @enderror
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" value="Save">
        </div>
      </form>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/kegiatan" method="post" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="modal-body">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                  {{ $kegiatan[0]->id }}
                  {{-- <input type="text" name="name" class="form-control" value="{{ $kegiatan->name }}/>
                  @error('nama')
                          <code>
                            {{ $message }}
                          </code>
                            @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tanggal</label>
                <div class="col-sm-9">
                  <input type="date" name="tgl" class="form-control" value="{{ $kegiatan->tgl }}/>
                  @error('tgl')
                          <code>
                            {{ $message }}
                          </code>
                            @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Kegiatan</label>
                <div class="col-sm-9">
                  <input type="text" name="kegiatan" class="form-control" value="{{ $kegiatan->kegiatan }}/>
                  @error('kegiatan')
                          <code>
                            {{ $message }}
                          </code>
                            @enderror
                </div>
            </div> --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" value="Save">
        </div>
      </form>
      </div>
    </div>
  </div>