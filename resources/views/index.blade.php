@extends('layouts.main')

@section('content')

<!-- categories -->
<div class="buttonC">
<p align="center">Categories</p>
	<br>
	<!-- <button type="button" class="btn btn-secondary" style="margin-left: 60px;"> <a href="#" class="tulisanB"> <img src="{{ asset ('assets/img/categorie/action.png') }}" alt="" style="height: 35px;"> Action </a>  </button>
	<button type="button" class="btn btn-secondary" style="margin-left: 60px;"> <a href="#" class="tulisanB"> <img src="{{ asset ('assets/img/categorie/thriller.png') }}" alt="" style="height: 35px;"> Thriller </a> </button>
	<button type="button" class="btn btn-secondary" style="margin-left: 60px;"> <a href="#" class="tulisanB"> <img src="{{ asset ('assets/img/categorie/romance.png') }}" alt="" style="height: 35px;"> Romance </a> </button>
	<button type="button" class="btn btn-secondary" style="margin-left: 60px;"> <a href="#" class="tulisanB"> <img src="{{ asset ('assets/img/categorie/comedi.png') }}" alt="" style="height: 35px;"> Comedy </a> </button>
	<button type="button" class="btn btn-secondary" style="margin-left: 60px;"> <a href="#" class="tulisanB"> <img src="{{ asset ('assets/img/categorie/family.png') }}" alt="" style="height: 35px;"> Family </a> </button>
	<button type="button" class="btn btn-secondary" style="margin-left: 60px;"> <a href="#" class="tulisanB"> <img src="{{ asset ('assets/img/categorie/makjang.png') }}" alt="" style="height: 35px;"> Drama </a> </button>
	<button type="button" class="btn btn-secondary" style="margin-left: 5px;"> <a href="#" class="tulisanB"> <img src="{{ asset ('assets/img/categorie/horor.png') }}" alt="" style="height: 35px;"> Horror </a> </button> -->

	<div class="row justify-content-center">
		<div class="col-sm-12 col-md-7 d-flex justify-content-center"> 
            <select name="AlbumID" id="AlbumID" class="form-control selectric" required >
                <option value="">Macam-macam genre yang tersedia di dalam website : </option>
                    @foreach ($album as $album)
                        <option value="{{$album->AlbumID}}"> - {{ $album->NamaAlbum }} </option>
                    @endforeach
            </select>
        </div>
		</div>
	</div>

				


<!-- end categories -->
    	
<!-- Hero Section -->
	<section class="hero__section">
		<div class="hero-slider">
			<div class="slide-item">
				<a class="fresco" href="{{ asset ('assets/img/hero-slider/StrongWomenDoBongson.jpg') }}" data-fresco-group="projects">
					<img src="{{ asset ('assets/img/hero-slider/StrongWomenDoBongson.jpg') }}" alt="">
				</a>
			</div>
			<div class="slide-item">
				<a class="fresco" href="{{ asset ('assets/img/hero-slider/twinklingWatermelon.jpg') }}" data-fresco-group="projects">
					<img src="{{ asset ('assets/img/hero-slider/twinklingWatermelon.jpg') }}" alt="">
					</a>
			</div>
			<div class="slide-item">
				<a class="fresco" href="{{ asset ('assets/img/hero-slider/squidGame.jpg') }}" data-fresco-group="projects">
					<img src="{{ asset ('assets/img/hero-slider/squidGame.jpg') }}" alt="">
				</a>	
			</div>
			<div class="slide-item">
				<a class="fresco" href="{{ asset ('assets/img/hero-slider/kingdom.jpg') }}" data-fresco-group="projects">
					<img src="{{ asset ('assets/img/hero-slider/kingdom.jpg') }}" alt="">
				</a>	
			</div>
			<div class="slide-item">
				<a class="fresco" href="{{ asset ('assets/img/hero-slider/theGlory.jpg') }}" data-fresco-group="projects">
					<img src="{{ asset ('assets/img/hero-slider/theGlory.jpg') }}" alt="">
				</a>	
			</div>
			<div class="slide-item">
				<a class="fresco" href="{{ asset ('assets/img/hero-slider/trueBeauty.jpg') }}" data-fresco-group="projects">
					<img src="{{ asset ('assets/img/hero-slider/trueBeauty.jpg') }}" alt="">
				</a>	
			</div>
			<div class="slide-item">
				<a class="fresco" href="{{ asset ('assets/img/hero-slider/taxiDriver.jpg') }}" data-fresco-group="projects">
					<img src="{{ asset ('assets/img/hero-slider/taxiDriver.jpg') }}" alt="">
				</a>	
			</div>
		</div>
		<div class="hero-text-slider">
			<div class="text-item">
				<h2>Strong Woman Do Bong Soon</h2>
				<p>Romance</p>
			</div>
			<div class="text-item">
				<h2>Twingkling Watermelon</h2>
				<p>Romance</p>
			</div>
			<div class="text-item">
				<h2>Squid Game</h2>
				<p>Horror</p>
			</div>
			<div class="text-item">
				<h2>Kingdom</h2>
				<p>Horror</p>
			</div>
			<div class="text-item">
				<h2>The Glory</h2>
				<p>Drama</p>
			</div>
			<div class="text-item">
				<h2>True Beauty</h2>
				<p>Romance</p>
			</div>
			<div class="text-item">
				<h2>Taxi Driver</h2>
				<p>Drama</p>
			</div>
		</div>
	</section>
	<!-- Hero Section end -->

	

@endsection