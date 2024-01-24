<!DOCTYPE html>
<html lang="id" dir="ltr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <title>Kelurahan Seputih Jaya @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/lampung-tengah6.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;800&display=swap">
    <link rel="stylesheet" href="{{ asset("assets/css/style_client.css") }}">
</head>
<body>
<div class="header" id="myHeader">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="logo-container logo-nav-gap">
            <a class="navbar-brand" href="/" draggable="false">
                <img class="logo-lampung" src="{{ asset("assets/images/lampung-tengah6.png") }}" height="80" alt="Logo" id="logontb" draggable="false">
            </a>
            <div class="logo-text">
                <span>Kelurahan <br> Seputih Jaya</span>
            </div>
        </div>
         <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto navMenu">
                    <li class="{{ Request::routeIs('beranda') ? 'current' : '' }}"><a href="{{ Request::routeIs('beranda') ? '#' : '/' }}" data-hover="Beranda">Beranda</a></li>
                    <li class="{{ Request::routeIs('berita.') ? 'current' : '' }}"><a href="{{ Request::routeIs('berita.') ? '#' : '/berita/view' }}" data-hover="Berita">Berita</a></li>
                    <li class="{{ Request::routeIs('profile.') ? 'current' : '' }}"><a href="{{ Request::routeIs('profile.') ? '#' : '/profile' }}" data-hover="Profil">Profil</a></li>
                    <li class="{{ Request::routeIs('galeri.') ? 'current' : '' }}"><a href="{{ Request::routeIs('galeri.') ? '#' : '/galeri' }}" data-hover="Galeri">Galeri</a></li>
                    <li class="{{ Request::routeIs('event.') ? 'current' : '' }}"><a href="{{ Request::routeIs('event.') ? '#' : '/event' }}" data-hover="Event">Event</a></li>
                    <li class="{{ Request::routeIs('kontak.') ? 'current' : '' }}"><a href="{{ Request::routeIs('kontak.') ? '#' : '/kontak' }}" data-hover="Kontak">Kontak</a></li>
                </ul>
            </div>
        </nav>
    </div>
	<div class="top-container" style="background: #0000;">
		<div class="jumbotron">
		  <div class="container">
				<p class="lead-1"><b>Website Kelurahan</b></p>
				<h1 class="display-4"><b>Seputih Jaya</b></h1>
				<p class="lead-2">Seputih Jaya, Gunung Sugih, Lampung Tengah, Lampung</p>
		  </div>
		</div>
	</div>
		<div class="content">
			@yield('content')
	</div>
	<br>
	<footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-xs-6 col-md-3">
					<img src="{{ asset('assets/images/lampung-tengah6.png') }}" height="150" class="float-left" alt="Logo" id="logontb" draggable="false">
				</div>
				<div class="col-sm-12 col-md-6">
					<h6>Tentang Seputih Jaya</h6>
					<p class="text-justify">Kelurahan Seputih Jaya adalah salah satu kelurahan di Kecamatan Gunung Sugih, Kabupaten Lampung Tengah, Provinsi Lampung. Kelurahan ini memiliki luas wilayah 10,16 kilometer persegi dan berpenduduk sekitar 10.000 jiwa. Kelurahan Seputih Jaya merupakan salah satu sentra perdagangan dan jasa di Kabupaten Lampung Tengah.</p>
				</div>
				<div class="col-xs-6 col-md-3">
					<h6>Menu Cepat</h6>
					<ul class="footer-links">
						<li><a href="{{ Request::routeIs('beranda') ? '#' : '/' }}" style="color">Profil</a></li>
						<li><a href="{{ Request::routeIs('berita.') ? '#' : '/berita/view' }}" style="color">Berita</a></li>
						<li><a href="{{ Request::routeIs('evnet.') ? '#' : '/event' }}">Event</a></li>
						<li><a href="{{ Request::routeIs('kontak.') ? '#' : '/kontak' }}">Kontak</a></li>
					</ul>
				</div>
			</div>
			<hr>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-6 col-xs-12">
					<p class="copyright-text">Copyright &copy; 2024 Kelurahan Seputih Jaya.</p>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<ul class="social-icons">
						<li><a class="facebook socmed" href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a class="youtube socmed" href="#"><i class="fa fa-youtube"></i></a></li>
						<li><a class="whatsapp socmed" href="#"><i class="fa fa-whatsapp"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<script src="{{ asset("mazzer/extensions/jquery/jquery.slim.min.js") }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="{{ asset("assets/bootstrap/js/bootstrap.min.js") }}"></script>
	<script src="{{ asset("mazzer/extensions/jquery/jquery.min.js") }}" charset="utf-8"></script>
	<script>
		window.onscroll = function() {myFunction()};
		var header = document.getElementById("myHeader");
		var sticky = header.offsetTop;
		 function myFunction() {
        if (window.pageYOffset >= sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
		function toggleMenu() {
    const navMenu = document.querySelector('.navMenu');
    navMenu.classList.toggle('show');
}
	</script>
</body>
</html>
