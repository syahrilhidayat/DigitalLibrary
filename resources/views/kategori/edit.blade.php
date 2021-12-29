@extends('layouts.master')
@section('title')
    Kategori
@endsection
@section('smalltitle')kategori @endsection
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
                        <form action="{{ route('kategori.update',$kategori->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="nama_kategori">Nama Kategori</label>
                                <input type="text" class="form-control" name="nama_kategori" value="{{ $kategori->nama_kategori }}" required>
                                @error('nama_kategori')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-sm btn-primary btn-flat">Simpan</button>
                              </div>
                        </form>
                    </div>
                  </div>
            </div>
            </div>
        </section>
      </div>
@endsection
