@extends('layouts.master')
@section('title')
    Anggota
@endsection
@section('smalltitle')anggota @endsection
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
                        <form action="{{ route('anggota.update',$anggota->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="nis">NIS</label>
                                <input type="text" class="form-control" name="nis" value="{{ $anggota->nis }}" required>
                                @error('nis')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama_anggota">Nama Anggota</label>
                                <input type="text" class="form-control" name="nama_anggota" value="{{ $anggota->nama_anggota }}" required>
                                @error('nama_anggota')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <select name="kelas" id="kelas" class="form-control" required>
                                    <option selected disabled>Chose one</option>
                                    <option value="X" {{$anggota->kelas == 'X' ? 'selected' : ''}}> X </option>
                                    <option value="XI" {{$anggota->kelas == 'XI' ? 'selected' : ''}}> XI </option>
                                    <option value="XII" {{$anggota->kelas == 'XII' ? 'selected' : ''}}> XII </option>
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
                                        <option value="{{ $jurusan->id }}" @if ($anggota->jurusan_id == $jurusan->id)
                                            selected
                                        @endif>{{ $jurusan->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                                @error('jurusan_id')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="hp">HP</label>
                                <input type="number" class="form-control" name="hp" value="{{ $anggota->hp }}" required>
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
        </section>
      </div>
@endsection
