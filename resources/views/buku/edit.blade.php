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
                        <button class="btn btn-primary">
                            <i class="fas fa fa-edit"> Edit Data</i>
                        </button>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('buku.update',$buku->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="judul_buku">Judul Buku</label>
                                <input type="text" class="form-control" name="judul_buku" value="{{ $buku->judul_buku }}" required>
                                @error('judul_buku')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kategori_id">Kategori</label>
                                <select name="kategori_id" id="kategori_id" class="form-control" required>
                                    <option selected disabled>Chose one</option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id}}" @if ($buku->kategori_id == $kategori->id) selected @endif>
                                            {{ $kategori->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="penulis">Penulis</label>
                                <input type="text" class="form-control" name="penulis" value="{{ $buku->penulis }}" required>
                                @error('penulis')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="penerbit">Penerbit</label>
                                <input type="text" class="form-control" name="penerbit" value="{{ $buku->penerbit }}" required>
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
        </section>
      </div>
@endsection
