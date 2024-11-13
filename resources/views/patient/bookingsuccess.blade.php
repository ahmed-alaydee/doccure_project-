@extends('layouts.main')


@section('content')
<script>
    window.onload = function() {
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000"
        };

            toastr.success("You have make an appoinment successfully with Dr. {{$doctor->name}}");
        
    };
</script>
<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Booking</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Booking</h2>
						</div>
					</div>
				</div>
			</div>
		
            <div class="content success-page-cont">
				<div class="container-fluid">
				
					<div class="row justify-content-center">
						<div class="col-lg-6">
						
							<!-- Success Card -->
							<div class="card success-card">
								<div class="card-body">
									<div class="success-cont">
										<i class="fas fa-check"></i>
										<h3>Appointment booked Successfully!</h3>
										<p>Appointment booked with <strong> Dr. {{$doctor->name}} </strong><br> on <strong>{{$data->date  }}   {{$data->time}}</strong></p>
										<a href="{{route('doctors')}}" class="btn btn-primary view-inv-btn">Go To Doctors</a>
									</div>
								</div>
							</div>
							<!-- /Success Card -->
						
						</div>
					</div>
					
				</div>
			</div>
@endsection