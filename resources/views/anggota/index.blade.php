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
                          <th>NIS</th>
                          <th>Nama Anggota</th>
                          <th>Kelas</th>
                          <th>Jurusan</th>
                          <th>HP</th>
                          <th width="8%">
                              <i class="fas fa fa-gear"></i>
                          </th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @forelse ($anggotas as $anggota)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $anggota->nis }}</td>
                                    <td>{{ $anggota->nama_anggota }}</td>
                                    <td>{{ $anggota->kelas }}</td>
                                    <td>{{ $anggota->jurusan->nama_jurusan }}</td>
                                    <td>{{ $anggota->hp }}</td>
                                    <td>
                                        <div class="button-group">
                                            <a href="{{ route('anggota.edit',$anggota->id) }}" class="btn btn-xs btn-success btn-flat"><i class="fas fa fa-edit"></i></a>
                                            <form action="{{ route('anggota.destroy',$anggota->id) }}" method="post">
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
                <form action="{{ route('anggota.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" class="form-control" name="nis" required>
                        @error('nis')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_anggota">Nama Anggota</label>
                        <input type="text" class="form-control" name="nama_anggota" required>
                        @error('nama_anggota')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select name="kelas" id="kelas" class="form-control" required>
                            <option selected disabled>Chose one</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                        @error('kelas')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jurusan_id">Jurusan</label>
                        <select name="jurusan_id" id="jurusan_id" class="form-control" required>
                            <option selected disabled>Chose one</option>
                            @foreach ($jurusans as $jurusan)
                                <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                            @endforeach
                        </select>
                        @error('jurusan_id')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="hp">HP</label>
                        <input type="number" class="form-control" name="hp" required>
                        @error('hp')
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
