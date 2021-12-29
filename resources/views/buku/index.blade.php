@extends('layouts.master')
@section('title')
    Buku
@endsection
@section('smalltitle')buku @endsection
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
                          <th>Judul Buku</th>
                          <th>Kategori</th>
                          <th>Penulis</th>
                          <th>Penerbit</th>
                          <th width="8%">
                              <i class="fas fa fa-gear"></i>
                          </th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @forelse ($bukus as $buku)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $buku->judul_buku }}</td>
                                    <td>{{ $buku->kategori->nama_kategori }}</td>
                                    <td>{{ $buku->penulis }}</td>
                                    <td>{{ $buku->penerbit }}</td>
                                    <td>
                                        <div class="button-group">
                                            <a href="{{ route('buku.edit',$buku->id) }}" class="btn btn-xs btn-success btn-flat"><i class="fas fa fa-edit"></i></a>
                                            <form action="{{ route('buku.destroy',$buku->id) }}" method="post">
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
                <form action="{{ route('buku.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="judul_buku">Judul Buku</label>
                        <input type="text" class="form-control" name="judul_buku" required>
                        @error('judul_buku')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kategori_id">Kategori</label>
                        <select name="kategori_id" id="kategori_id" class="form-control" required>
                            <option selected disabled>Chose one</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id}} ">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input type="text" class="form-control" name="penulis" required>
                        @error('penulis')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="penerbit">Penerbit</label>
                        <input type="text" class="form-control" name="penerbit" required>
                        @error('penerbit')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="simpan" class="btn btn-sm btn-primary btn-flat">Simpan</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
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
