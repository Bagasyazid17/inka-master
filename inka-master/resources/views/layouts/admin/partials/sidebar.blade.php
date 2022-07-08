<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
		<nav>
			<ul class="nav">
				@if(Auth::user()->role_id == 1)
				<li><a href="{{ route('dashboard.index') }}" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
				<li><a href="{{ route('user.index') }}" class=""><i class="lnr lnr-users"></i> <span>User</span></a></li>
				<li><a href="{{ route('home-setting.index') }}" class=""><i class="lnr lnr-home"></i> <span>Home Setting</span></a></li>
				@endif
				<li>
					<a href="#subPesan" data-toggle="collapse" class="collapsed"><i class="lnr lnr-envelope"></i> <span>Pesan</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
					<div id="subPesan" class="collapse ">
						<ul class="nav">
							<li><a href="{{route('contact.index')}}" class="">Pesan Masuk</a></li>
							@if(Auth::user()->role_id == 1)
							<li><a href="{{route('topik.index')}}" class="">Topik</a></li>
							@endif
						</ul>
					</div>
				</li>
				@if(Auth::user()->role_id == 1)
				<li><a href="{{ route('slider-master.index') }}" class=""><i class="lnr lnr-picture"></i> <span>Slider</span></a></li>
				<li><a href="{{ route('corporation.index') }}" class=""><i class="lnr lnr-apartment"></i> <span>Corporation</span></a></li>
				<li>
					<a href="#subProduct" data-toggle="collapse" class="collapsed"><i class="lnr lnr-train"></i> <span>Product</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
					<div id="subProduct" class="collapse ">
						<ul class="nav">
							<li><a href="{{route('master-product.index')}}" class="">Main Product</a></li>
							<li><a href="{{route('category-product.index')}}" class="">Sub Product</a></li>
							<li><a href="{{route('product.index', ['isCatalogue' => 0])}}" class="">Product</a></li>
							<li><a href="{{route('product.index', ['isCatalogue' => 1])}}" class="">Product Catalogue</a></li>
						</ul>
					</div>
				</li>
				<li><a href="{{ route('galeri.index') }}" class=""><i class="lnr lnr-picture"></i> <span>Galeri</span></a></li>
				<li><a href="{{ route('berita.index') }}" class=""><i class="lnr lnr-file-add"></i> <span>Berita</span></a></li>
				<li>
					<a href="#subProcurement" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cart"></i> <span>Procurement</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
					<div id="subProcurement" class="collapse ">
						<ul class="nav">
							<li><a href="{{route('master-procurement.index')}}" class="">Master Procurement</a></li>
							<li><a href="{{route('procurement.index')}}" class="">Procurement</a></li>
						</ul>
					</div>
				</li>
				<li><a href="{{ route('karir.index') }}" class=""><i class="lnr lnr-license"></i> <span>Karir</span></a></li>
				<li><a href="{{ route('broadcast.index') }}" class=""><i class="lnr lnr-bullhorn"></i> <span>Broadcast</span></a></li>
				<li><a href="{{ route('menu.index') }}" class=""><i class="lnr lnr-menu"></i> <span>Menu Lainnya</span></a></li>
				@endif
			</ul>
		</nav>
	</div>
</div>