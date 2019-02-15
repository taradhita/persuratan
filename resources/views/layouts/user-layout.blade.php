<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="{{ asset('css/ready.css') }}">
	<link rel="stylesheet" href="{{ asset('css/demo.css') }}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script>
    	window.Laravel = <?php echo json_encode([
        	'csrfToken' => csrf_token(),
    	]); ?>
	</script>

	<script>
     	window.Laravel.userId = <?php echo auth()->user()->id; ?>;
	</script>

</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="/user" class="logo">
					Dashboard
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid" id="app">
					
					
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<!--<approve v-bind:approves="approves" ></approve>-->

						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-bell"></i>
								<span class="notification">{{auth()->user()->unreadNotifications->count()}}</span>
							</a>
							<ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
								<li>
									<div class="dropdown-title">{{auth()->user()->unreadNotifications->count()}} notifikasi baru</div>
								</li>
							
								@if (auth()->user()->unreadNotifications->count())
								
								@foreach(auth()->user()->unreadNotifications as $notif)
								<li>
									<div class="notif-center">
										<a href="#">
											<div class="notif-icon notif-primary"> <i class="la la-envelope"></i> </div>
											<div class="notif-content">
												@if($notif->type == "App\Notifications\ApproveSuratNotif")
												<span class="block">
													Pesan masuk baru
												</span>
												<span class="time">5 minutes ago</span> 
												
												@elseif($notif->type == "App\Notifications\DisposisiNotif")
												<span class="block">
													Disposisi baru dari Kepala Kantor 
												</span>
												<span class="time">5 minutes ago</span> 
												@endif
											</div>
										</a>
										
									</div>
								</li>
								@endforeach
								@endif
								<li>
									<a class="see-all" href="{{auth()->user()->unreadNotifications->markAsRead()}}"> <strong>Tandai Semua sebagai Dibaca</strong> <i class="la la-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="/images/icons/user_icon.png" alt="user-img" width="36" class="img-circle"><span >{{Auth::user()->username}}</span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><img src="/images/icons/user_icon.png" alt="user"></div>
										<div class="u-text">
											<h4>{{Auth::user()->username}}</h4>
											<!--<p class="text-muted">hello@themekita.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>-->
										</div>
									</li>						
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="{{ url('/logout') }}" 
         								onclick="event.preventDefault();
         								document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>
          								Logout
    								</a>
									
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            							@csrf
        							</form>
								</ul>
								<!-- /.dropdown-user -->
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
					<div class="user">
						<div class="photo">
							<img src="/images/icons/user_icon.png">
						</div>
						<div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{Auth::user()->username}}
									<span class="user-level">
										{{Auth::user()->nama_seksi}}
									</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample" aria-expanded="true" style="">
								<ul class="nav">
									<li>
										<a href="{{route('user.edit',  Auth::user()->id)}}">
											<span class="link-collapse">Edit Profil</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item {{ $activeMenu == 'user.home' ? 'active' : '' }}">
							<a href="/user">
								<i class="la la-dashboard"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item {{ $activeMenu == 'user.surat-masuk' ? 'active' : '' }}">
							<a href="/user/surat-masuk">
								<i class="la la-inbox"></i>
								<p>Surat Masuk</p>
							</a>
						</li>
						<li class="nav-item {{ $activeMenu == 'user.disposisi-masuk' ? 'active' : '' }}">
							<a href="{{route('user.disposisi-masuk')}}">
								<i class="la la-file-text"></i>
								<p>Disposisi Masuk</p>
							</a>
						</li>
						<li class="nav-item {{ $activeMenu == 'user.surat-keluar' ? 'active' : '' }}">
							<a href="/user/surat-keluar">
								<i class="la la-send"></i>
								<p>Surat Keluar</p>
							</a>
						</li>
						<li class="nav-item {{ $activeMenu == 'user.laporan' ? 'active' : '' }}">
							<a href="/user/laporan">
								<i class="la la-archive"></i>
								<p>Laporan</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
					@yield('content')
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<script src="{{ asset('js/app2.js') }}"></script>

</body>
<!--<script src="{{ asset('js/core/jquery.3.2.1.min.js') }}"></script>-->
<script src="{{ asset('js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/core/popper.min.js') }}"></script>
<!--<script src="{{ asset('js/core/bootstrap.min.js') }}"></script>-->
<script src="{{ asset('js/plugin/chartist/chartist.min.js') }}"></script>
<script src="{{ asset('js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js') }}"></script>
<script src="{{ asset('js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('js/ready.min.js') }}"></script>
<script>
	$( function() {
		$( "#slider" ).slider({
			range: "min",
			max: 100,
			value: 40,
		});
		$( "#slider-range" ).slider({
			range: true,
			min: 0,
			max: 500,
			values: [ 75, 300 ]
		});
	} );
</script>
</html>