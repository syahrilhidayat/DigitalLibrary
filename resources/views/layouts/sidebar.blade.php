<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('assets/adminlte2418/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth()->user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <li class="header">DASHBOARD</li>

        <li>
            <a href="/dashboard"><i class="fa fa-dashboard">
                </i> <span>Dashboard</span>
            </a>
        </li>

        <li class="header">ANGGOTA</li>

        <li>
            <a href="{{ route('anggota.index') }}"><i class="fa fa-users">
                </i> <span>Data Anggota</span>
            </a>
        </li>

        <li class="header">BUKU</li>

        <li>
            <a href="{{ route('buku.index') }}"><i class="fa fa-book">
                </i> <span>Data Buku</span>
            </a>
        </li>

        <li class="header">TRANSAKSI</li>

        <li>
            <a href="{{ route('transaksi.index') }}"><i class="fa fa-upload">
                </i> <span>Peminjaman</span>
            </a>
        </li>

        <li class="header">MASTER</li>

        <li class="treeview">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>MASTER</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('kategori.index') }}"><i class="fa fa-cube"></i> Kategori</a></li>
              <li><a href="{{ route('jurusan.index') }}"><i class="fa fa-cube"></i> Jurusan</a></li>
              <li><a href="#"><i class="fa fa-user"></i> Admin</a></li>
            </ul>
          </li>


        <li>

        </li>
    </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
