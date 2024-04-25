<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>UJIKOM || GALLERY PHOTO</title>
	<meta charset="UTF-8">
	<meta name="description" content="Boto Photo Studio HTML Template">
	<meta name="keywords" content="photo, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset ('assets/css/bootstrap.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset ('assets/css/font-awesome.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset ('assets/css/slicknav.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset ('assets/css/fresco.css') }}"/>
	<link rel="stylesheet" href="{{ asset ('assets/css/slick.css') }}"/>

	<!-- boostrap 5 -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

	<!-- google font -->
	<link href="https://fonts.googleapis.com/css2?family=Protest+Riot&family=Roboto+Condensed&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Protest+Riot&family=Roboto+Condensed&display=swap" rel="stylesheet">

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="{{ asset ('assets/css/style.css') }}"/>

	<!-- boxicons -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>



	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header Section -->
	@include('layouts.header')
	<!-- Header Section end -->

	<!-- Konten Section -->
    @yield('content')
	<!-- Konten Section end -->

	<!-- Footer Section -->
	@include('layouts.footer')
	<!-- Footer Section end -->

	<!-- Search Begin -->
	<div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
			<form class="search-model-form">
				<input type="text" id="search-input" placeholder="Search here.....">
			</form>
		</div>
	</div>
	<!-- Search End -->

	<!--====== Javascripts & Jquery ======-->
	<script src="{{ asset ('assets/js/vendor/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset ('assets/js/jquery.slicknav.min.js') }}"></script>
	<script src="{{ asset ('assets/js/slick.min.js') }}"></script>
	<script src="{{ asset ('assets/js/fresco.min.js') }}"></script>
	<script src="{{ asset ('assets/js/main.js') }}"></script>

	</body>
</html>