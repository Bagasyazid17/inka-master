<!--
==================================================
Header Section Start
================================================== -->
<header class="up-bar">
    <div class="container">
        Bahasa | Cari
        <input></input>
    </div>
</header>

<header id="top-bar" class="navbar-fixed-top animated-header">
    <div class="container">
        <div class="navbar-header">
            <!-- responsive nav button -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <!-- /responsive nav button -->
            
            <!-- logo -->
            <div class="navbar-brand">
                <a href="{{ route('app.index') }}">
                    <img src="{{url('/')}}/assets/logo/logo-sm.png" alt="">
                </a>
            </div>
            <!-- /logo -->
        </div>
        <!-- main menu -->
        <nav class="collapse navbar-collapse navbar-right" role="navigation">
            <div class="main-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ route('app.index') }}">Home</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Corporation <span class="caret"></span></a>
                        <div class="dropdown-menu">
                            <ul>
                                @foreach(Session::get('corporation') as $item)
                                <li><a href="{{ route('app.corporation.show', ['id' => $item->id]) }}">{{$item->nama}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Product <span class="caret"></span></a>
                        <div class="dropdown-menu">
                            <ul>
                                @foreach(Session::get('masterProduct') as $item)
                                <li><a href="{{ route('app.product.show', ['id' => $item->id]) }}">{{$item->nama}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Galeri <span class="caret"></span></a>
                        <div class="dropdown-menu">
                            <ul>
                                @foreach(Session::get('galeri') as $item)
                                <li><a href="{{ route('app.galeri.show', ['id' => $item->id]) }}">{{$item->nama}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Procurement <span class="caret"></span></a>
                        <div class="dropdown-menu">
                            <ul>
                                @foreach(Session::get('masterProcurement') as $item)
                                <li><a href="{{ route('app.procurement.show', ['id' => $item->id]) }}">{{$item->nama}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li><a href="{{ route('app.berita') }}">Berita</a></li>
                </ul>
            </div>
        </nav>
        <!-- /main nav -->
    </div>
</header>