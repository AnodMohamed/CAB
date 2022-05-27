<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css')}}"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flexslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chosen.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color-01.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.min.css" integrity="sha512-tjNtfoH+ezX5NhKsxuzHc01N4tSBoz15yiML61yoQN/kxWU0ChLIno79qIjqhiuTrQI0h+XPpylj0eZ9pKPQ9g==" crossorigin="anonymous" /> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.css" integrity="sha512-KRrxEp/6rgIme11XXeYvYRYY/x6XPGwk0RsIC6PyMRc072vj2tcjBzFmn939xzjeDhj0aDO7TDMd7Rbz3OEuBQ==" crossorigin="anonymous" />
    
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles
    
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>
<body class="home-page home-01 ">
	
	@stack('style') 

	<!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

	<!--header-->
	<header id="header" class="header header-style-1">
		<div class="container-fluid"  >
			<div class="row">
				<div class="topbar-menu-area" style="display: block;">
					<div class="container">
						<div class="topbar-menu left-menu"  >
							<ul>
								<li class="menu-item" >
									<a title="Hotline: (+123) 456 789" href="#" ><span class="icon label-before fa fa-mobile"></span>graduationproject22p2@gmail.com</a>
								</li>
							</ul>
						</div>
						
						<div class="topbar-menu right-menu">
							<ul>
								
								<li class="menu-item lang-menu menu-item-has-children parent">
									<a title="Experts" href="{{ route('Experts') }}" class="img label-before">Experts</a>
									
								</li>
								@if(Route::has('login'))
									@auth
										@if(Auth::user()->utype == 'ADM')
											<li class="menu-item menu-item-has-children parent" >
												<a title="My Account" href="#">My Account ({{ Auth::user()->name }}) <i class="fa fa-angle-down" aria-hidden="true"></i></a>
												<ul class="submenu curency" >
												
													<li class="menu-item" >
														<a title="Askers" href="{{ route('admin.Askers') }}">Askers</a>
													</li>
													<li class="menu-item" >
														<a title="Experts" href="{{ route('admin.Experts') }}">Experts</a>
													</li>
													<li class="menu-item" >
														<a title="Categories" href="{{ route('admin.Categories') }}">Categories</a>
													</li>
													<li class="menu-item" >
														<a title="Transactions" href="{{ route('admin.expertTransactions') }}">Transactions</a>
													</li>
												
													<li class="menu-item" >
														<a title="User" href="{{ route('profile') }}">Profile</a>
													</li>
													<li class="menu-item" >
														<a title="Dashboard" href="{{ route('logout') }}"
														   onclick="event.preventDefault();
														   document.getElementById('logout-form').submit();"> Logout</a>
													</li>
													<form id="logout-form" method="POST" action="{{ route('logout') }}">
														@csrf
	
													</form>
												</ul>
											</li>
										@elseif (Auth::user()->utype == 'EXP')
											<li class="menu-item menu-item-has-children parent" >
												<a title="My Account">My Account ({{ Auth::user()->name }}) <i class="fa fa-angle-down" aria-hidden="true"></i></a>
												<ul class="submenu curency" >
												
													<li class="menu-item" >
														<a title="profile" href="{{ route('profile') }}">Profile</a>
													</li>
													<li class="menu-item" >
														<a title="Messeges" href="{{ route('user.Messeges') }}"> Messeges</a>
													</li>
													<li class="menu-item" >
														<a title="Appointments" href="{{ route('expert.appointments') }}"> Appointments</a>
													</li>
													<li class="menu-item" >
														<a title="Reviews" href="{{ route('expert.view.review') }}"> Reviews</a>
													</li>
													<li class="menu-item" >
														<a title="Dashboard" href="{{ route('logout') }}"
														   onclick="event.preventDefault();
														   document.getElementById('logout-form').submit();"> Logout</a>
													</li>
													<form id="logout-form" method="POST" action="{{ route('logout') }}">
														@csrf
	
													</form>
												</ul>
											</li>
										@elseif (Auth::user()->utype == 'ASK')
											<li class="menu-item menu-item-has-children parent" >
												<a title="My Account">My Account ({{ Auth::user()->name }}) <i class="fa fa-angle-down" aria-hidden="true"></i></a>
												<ul class="submenu curency" >
													
													<li class="menu-item" >
														<a title="profile" href="{{ route('profile') }}">Profile</a>
													</li>
													<li class="menu-item" >
														<a title="Messeges" href="{{ route('user.Messeges') }}"> Messeges</a>
													</li>
													<li class="menu-item" >
														<a title="Appointments" href="{{ route('asker.appointments') }}"> Appointments</a>
													</li>

													<li class="menu-item" >
														<a title="Dashboard" href="{{ route('logout') }}"
														   onclick="event.preventDefault();
														   document.getElementById('logout-form').submit();"> Logout</a>
													</li>
													<form id="logout-form" method="POST" action="{{ route('logout') }}">
														@csrf
	
													</form>
												</ul>
											</li>
										@endif
									@else	
										<li class="menu-item" ><a title="Login" href="{{ route('login')}}">Login</a></li>
										<li class="menu-item" ><a title="Register" href="{{ route('register')}}">Register</a></li>
									@endif
								@endif
							</ul>
						</div>
					</div>
				</div>

				<div class="container">
					<div class="mid-section main-info-area" style="display: block;">

						<div class="wrap-logo-top left-section"  style="display: flex; margin: auto;">
							
							<a href="index.html" class="link-to-home"><img src="{{ asset('assets/images/logo.png') }}" alt="mercado"></a>
						</div>


						<div class="wrap-icon right-section">

							<div class="wrap-icon-section show-up-after-1024">
								<a href="#" class="mobile-navigation">
									<span></span>
									<span></span>
									<span></span>
								</a>
							</div>
						</div>

					</div>
				</div>

			
			</div>
		</div>
	</header>


            <!-- Page Content -->
                {{ $slot }}
                <footer id="footer">
                    <div class="wrap-footer-content footer-style-1">
                
                        
                        <!--End function info-->
                        <div class="coppy-right-box">
                            <div class="container" style="display: flex;text-align: inherit;justify-content: center;">
                                <div class="coppy-right-item text-center">
                                    <p class="coppy-right-text text-center">Copyright © 2022 CAM team. All rights reserved CAM </p>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </footer>
                
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
                {{-- <script src="{{ asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4')}}"></script> --}}
                {{-- <script src="{{ asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4')}}"></script> --}}
                {{-- <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script> --}}
                <script src="{{ asset('assets/js/jquery.flexslider.js')}}"></script>
                {{-- <script src="{{ asset('assets/js/chosen.jquery.min.js')}}"></script> --}}
                <script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
                <script src="{{ asset('assets/js/jquery.countdown.min.js')}}"></script>
                <script src="{{ asset('assets/js/jquery.sticky.js')}}"></script>
                <script src="{{ asset('assets/js/functions.js')}}"></script>
                
                <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg==" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js" integrity="sha512-EnXkkBUGl2gBm/EIZEgwWpQNavsnBbeMtjklwAa7jLj60mJk932aqzXFmdPKCG6ge/i8iOCK0Uwl1Qp+S0zowg==" crossorigin="anonymous"></script>
                {{--------- text editor-----}}
                <script src="https://cdn.tiny.cloud/1/hj792k117l0inekz8p0lwczrmdvvlgz7lf0vx3dooh2q937o/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
                @livewireScripts
                <script>
                    window.livewire.on('fileUploaded',()=>{
                        $('#form-upload')[0].reset();
                    });
            
                </script>
                
                @stack('scripts') 
                </body>
                </html>