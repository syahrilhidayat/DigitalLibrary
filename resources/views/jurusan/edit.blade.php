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
                        <button class="btn btn-primary">
                            <i class="fas fa fa-edit"> Edit Data</i>
                          </button>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('jurusan.update',$jurusan->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="nama_jurusan">Nama Jurusan</label>
                                <input type="text" class="form-control" name="nama_jurusan" value="{{ $jurusan->nama_jurusan }}" required>
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
            </div>
            </div>
        </section>
      </div>
@endsection
