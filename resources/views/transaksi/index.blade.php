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
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-default">
                                <i class="fas fa fa-plus-circle"> Tambah</i>
                            </button>
                          <button type="button" class="btn btn-sm btn-info"><i class="fas fa fa-download"></i> Download</button>
                          <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li class="bg-danger"><a href="laporanPdf"> <i class="fas fa fa-file-pdf-o"></i> PDF</a></li>
                            <li class="bg-success"><a href="#"> <i class="fas fa fa-file-excel-o"></i> Excel</a></li>
                          </ul>
                        </div>
                    </div>
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th width="5%">No</th>
                          <th>NIS</th>
                          <th>Nama Anggota</th>
                          <th>Judul Buku</th>
                          <th>Tanggal Pinjam</th>
                          <th width="8%">
                              <i class="fas fa fa-gear"></i>
                          </th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @forelse ($transaksis as $transaksi)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $transaksi->anggota->nis }}</td>
                                    <td>{{ $transaksi->anggota->nama_anggota }}</td>
                                    <td>{{ $transaksi->buku->judul_buku }}</td>
                                    <td>{{ $transaksi->tanggal_pinjam }}</td>
                                    <td>
                                        @if ($transaksi->status == 0)
                                            <form action="{{ route('transaksi.update',$transaksi->id) }}" method="post">
                                                @csrf
                                            @method('patch')
                                            <button type="submit" class="btn btn-sm btn-danger btn-flat">Kembali</button>
                                            </form>
                                        @endif
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
                <form action="{{ route('transaksi.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="anggota_id">Nama Anggota</label>
                        <select name="anggota_id" id="anggota_id" class="form-control" required>
                            <option selected disabled>Chose one</option>
                            @foreach ($anggotas as $anggota)
                                <option value="{{ $anggota->id }}">{{ $anggota->nama_anggota }}</option>
                            @endforeach
                        </select>
                        @error('anggota_id')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="buku_id">judul Buku</label>
                        <select name="buku_id" id="buku_id" class="form-control" required>
                            <option selected disabled>Chose one</option>
                            @foreach ($bukus as $buku)
                                <option value="{{ $buku->id }}">{{ $buku->judul_buku }}</option>
                            @endforeach
                        </select>
                        @error('buku_id')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pinjam">Tanggal Pinjam</label>
                        <input type="date" class="form-control" name="tanggal_pinjam" required>
                        @error('tanggal_pinjam')
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
