<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('backend') }}/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('backend') }}/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="{{ asset('backend') }}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="{{ asset('backend') }}/plugins/highcharts/css/highcharts.css" rel="stylesheet" />
	<link href="{{ asset('backend') }}/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="{{ asset('backend') }}/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
	<link href="{{ asset('backend') }}/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />


	<!-- loader-->
	<link href="{{ asset('backend') }}/css/pace.min.css" rel="stylesheet" />
	<script src="{{ asset('backend') }}/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('backend') }}/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{ asset('backend') }}/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('backend') }}/css/app.css" rel="stylesheet">
	<link href="{{ asset('backend') }}/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('backend') }}/css/dark-theme.css" />
	<link rel="stylesheet" href="{{ asset('backend') }}/css/semi-dark.css" />
	<link rel="stylesheet" href="{{ asset('backend') }}/css/header-colors.css" />

    <link href="{{ asset('backend') }}/plugins/toastr/toastr.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet">
	<title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset('backend') }}/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">{{ config('app.name', 'Laravel') }}</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
				</div>
			</div>
			<!--navigation-->
			@include('backend.layouts.navigation')
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center bg-dark shadow-none border-light-2 border-bottom">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu text-white me-3">
                        <i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<form>
							  <input type="text" class="form-control search-control" autofocus placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							   <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						    </form>
						</div>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link text-white" href="javascript:;">	<i class='bx bx-search'></i>
								</a>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">0</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-notifications-list">
										{{-- <a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
												ago</span></h6>
													<p class="msg-info">5 new user registered</p>
												</div>
											</div>
										</a> --}}
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Notifications</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">0</span>
									<i class='bx bx-comment'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Messages</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-message-list">
										{{-- <a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
												ago</span></h6>
													<p class="msg-info">The standard chunk of lorem</p>
												</div>
											</div>
										</a> --}}
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Messages</div>
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown border-light-2">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="{{ asset('backend') }}/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0 text-white">{{ Auth::user()->name }}</p>
								<p class="designattion mb-0">{{ Auth::user()->role }}</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li>
                                <a href="#" class="dropdown-item" href="javascript:;" onclick="event.preventDefault();  document.getElementById('logout_btn').submit();"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                                <form id="logout_btn" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
             @yield('content')
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="search-overlay"></div>
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © {{ date('Y') }}. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
					<label class="form-check-label" for="lightmode">Light</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
					<label class="form-check-label" for="darkmode">Dark</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
					<label class="form-check-label" for="semidark">Semi Dark</label>
				</div>
			</div>
			<hr/>
			<div class="form-check">
				<input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
				<label class="form-check-label" for="minimaltheme">Minimal Theme</label>
			</div>
			<hr/>
			<h6 class="mb-0">Sidebar Backgrounds</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{ asset('backend') }}/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="{{ asset('backend') }}/js/jquery.min.js"></script>
	<script src="{{ asset('backend') }}/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{ asset('backend') }}/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{ asset('backend') }}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="{{ asset('backend') }}/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="{{ asset('backend') }}/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="{{ asset('backend') }}/plugins/highcharts/js/highcharts.js"></script>
	<script src="{{ asset('backend') }}/plugins/highcharts/js/exporting.js"></script>
	<script src="{{ asset('backend') }}/plugins/highcharts/js/variable-pie.js"></script>
	<script src="{{ asset('backend') }}/plugins/highcharts/js/export-data.js"></script>
	<script src="{{ asset('backend') }}/plugins/highcharts/js/accessibility.js"></script>
	<script src="{{ asset('backend') }}/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
	<script src="{{ asset('backend') }}/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="{{ asset('backend') }}/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/toastr/toastr.min.js"></script>

    <script>
		new PerfectScrollbar('.dashboard-top-countries');
	</script>
    <script>
        $(document).ready(function() {
            @if(Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}";
                switch(type){
                    case 'info':
                        toastr.info("{{ Session::get('message') }}");
                        break;

                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                        break;

                    case 'success':
                        toastr.success("{{ Session::get('message') }}");
                        break;

                    case 'error':
                        toastr.error("{{ Session::get('message') }}");
                        break;
                }
            @endif
        });
    </script>
	<script src="{{ asset('backend') }}/js/index.js"></script>
	<!--app JS-->
	<script src="{{ asset('backend') }}/js/app.js"></script>

    @yield('script')
</body>

</html>
