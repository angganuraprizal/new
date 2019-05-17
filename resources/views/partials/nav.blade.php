<nav class="navbar navbar-expand-sm navbar-default">
    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
            @if (Auth::check())
            <li class="active">
                <a href="{{ url('/home') }}"><i class="menu-icon fa fa-home"></i>Dashboard </a>
            </li>
            @endif
            @role('admin')
            <li class="menu-title">Table</li><!-- /.menu-title -->
            <li>
                <a href="{{ url('/admin/kategori') }}"> <i class="menu-icon fa fa-tags"></i>Kategori </a>
            </li>
            <li>
                <a href="{{ url('/admin/artikel') }}"> <i class="menu-icon fa fa-list-alt"></i>Artikel </a>
            </li>
            @endrole
            
            <!-- <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Basic Form</a></li>
                    <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Advanced Form</a></li>
                </ul>
            </li> -->
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>