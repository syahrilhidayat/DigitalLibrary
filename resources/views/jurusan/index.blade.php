@extends('layouts.master')
@section('title')
    Jurusan
@endsection
@section('smalltitle')jurusan @endsection
@section('content')
      <div class="row">
        <section class="col-lg-12 connectedSortable">
          <div class="nav-tabs-custom">
            <div class="tab-content no-padding">
                <div class="box">
                    <div class="box-header">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-default">
                            <i class="fas fa fa-plus-circle"> Tambah</i>
                          </button>
                    </div>
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th width="5%">No</th>
                          <th>Nama Jurusan</th>
                          <th width="8%">
                              <i class="fas fa fa-gear"></i>
                          </th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @forelse ($jurusans as $jurusan)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $jurusan->nama_jurusan }}</td>
                                    <td>
                                        <div class="button-group">
                                            <a href="{{ route('jurusan.edit',$jurusan->id) }}" class="btn btn-xs btn-success btn-flat"><i class="fas fa fa-edit"></i></a>
                                            <form action="{{ route('jurusan.destroy',$jurusan->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-xs btn-danger btn-flat"><i class="fas fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            <div class="alert alert-danger alert-dismissible">
                                <i class="icon fa fa-ban"></i> Tidak ada data</h4>
                              </div>
                            @endforelse
                        </tbody>
                      </table>
                    </div>
                  </div>
            </div>
            </div>
        </section>
      </div>

      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('jurusan.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama_jurusan">Nama Jurusan</label>
                        <input type="text" class="form-control" name="nama_jurusan" required>
                        @error('nama_jurusan')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="simpan" class="btn btn-sm btn-primary btn-flat">Simpan</button>
                    </div>
                </form>
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
@endsection
@push('script')
<script>
    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>
@endpush
