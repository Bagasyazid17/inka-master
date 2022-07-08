<nav class="navbar navbar-default navbar-fixed-top">
	<div class="brand">
		<a href="{{ route('dashboard.index') }}"><img src="{{url('/')}}/assets/logo/logo-sm.png" alt="Logo INKA" class="img-responsive logo"></a>
	</div>
	<div class="container-fluid">
		<div class="navbar-btn">
			<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
		</div>
		<form class="navbar-form navbar-left">
			
		</form>
		<div id="navbar-menu">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{url('/')}}{{Auth::user()->foto}}" class="img-circle" alt="Avatar"> <span>{{Auth::user()->name}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
						<li><a href="{{ route('password.edit')}}"><i class="lnr lnr-lock"></i> <span>Change Password</span></a></li>
						<li>
							<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<i class="lnr lnr-exit"></i> <span>Logout</span>
							</a>
						</li>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>