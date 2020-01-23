<ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="{{route('user.index')}}"><i class="fa fa-circle-o"></i> User</a></li>
            <li ><a href="{{route('supplier.index')}}"><i class="fa fa-circle-o"></i> Supplier</a></li>

            <li><a href="{{route('pegawai.index')}}"><i class="fa fa-circle-o"></i> Pegawai </a></li>
            <li><a href="{{route('kategori.index')}}"><i class="fa fa-circle-o"></i> Kategori </a></li>
            <li><a href="{{route('produk.index')}}"><i class="fa fa-circle-o"></i> Produk </a></li>
            <li><a href="{{route('agen')}}"><i class="fa fa-circle-o"></i> Agen </a></li>



          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
        <li>
          <a href="{{ route('transaksi_masuk.index')}}">
            <i class="fa fa-th"></i> <span>Transaksi masuk</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="{{ route('report_penjualan')}}">
            <i class="fa fa-th"></i> <span>Report Penjualan</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
    </ul>