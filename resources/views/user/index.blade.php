@extends('user.test')

@section('title', '0306201535')

@section('content1')
<div id="colorlib-services">
	<div class="container">
		<div class="row">
			<div class="col-md-3 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="flaticon-books"></i>
					</span>
					<div class="desc">
						<h3>Professional Courses</h3>
						<p>Separated they live in Bookmarksgrove right at the coast of the Semantics</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="flaticon-professor"></i>
					</span>
					<div class="desc">
						<h3>Experienced Instructor</h3>
						<p>Separated they live in Bookmarksgrove right at the coast of the Semantics</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="flaticon-book"></i>
					</span>
					<div class="desc">
						<h3>Practical Training</h3>
						<p>Separated they live in Bookmarksgrove right at the coast of the Semantics</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="flaticon-diploma"></i>
					</span>
					<div class="desc">
						<h3>Validated Certificate</h3>
						<p>Separated they live in Bookmarksgrove right at the coast of the Semantics</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="colorlib-counter" class="colorlib-counters" style="background-image: url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="col-md-3 col-sm-6 animate-box">
						<div class="counter-entry">
							<span class="icon"><i class="flaticon-book"></i></span>
							<div class="desc">
								<span class="colorlib-counter js-counter" data-from="0" data-to="{{$sumProducts}}" data-speed="2500" data-refresh-interval="50"></span>
								<span class="colorlib-counter-label">số lượng điện thoại</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 animate-box">
						<div class="counter-entry">
							<span class="icon"><i class="flaticon-books"></i></span>
							<div class="desc">
								<span class="colorlib-counter js-counter" data-from="0" data-to="{{$sumCate}}" data-speed="5000" data-refresh-interval="50"></span>
								<span class="colorlib-counter-label">Số lượng hãng</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<div class="colorlib-classes colorlib-light-grey">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
				<h2>Điện Thoại</h2>
			</div>
		</div>
		<div class="row">
			@foreach ($products as $product)
			<div class="col-md-4 animate-box">
				<div class="classes">
					<div class="classes-img" style="background-image: url('{{ asset($product->image) }}');">
						<span class="price text-center"><small>{{ $product->price }}₫</small></span>
					</div>
					<div class="desc">
						<h3><a href="#">{{ $product->title }}</a></h3>
							<p><a href="{{ route('show1', ['id' => $product->id]) }}" class="btn-learn">Mua ngay <i class="icon-arrow-right3"></i></a></p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>	
</div>

@endsection