@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@section('smalltitle')Dashboard @endsection
@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
                <li class="pull-left header"><i class="fa fa-inbox"></i> Selamat Datang : <strong> {{ auth()->user()->name }}</strong></li>
              </ul>
              {{-- <img src="{{ asset('assets/img/buku.jpg') }}" alt="buku.jpg" width="1200px" height="650px"> --}}

            <div class="tab-content no-padding">
                <img src="{{ asset('assets/img/buku.jpg') }}" alt="buku.jpg" width="100%" height="650px">
            </div>
          </div>
          </div>
          </div>
        </section>
      </div>
@endsection
