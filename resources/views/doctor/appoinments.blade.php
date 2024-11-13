@extends('layouts.doctor')

@section('content')
<div class="col-md-7 col-lg-8 col-xl-9">
							<h2 class="text-center my-3">Accepted Appoinments</h2>
							<div class="appointments">
							
							@foreach ($appoinments as $appoinment)
							
						
								<!-- Appointment List -->
								<div class="appointment-list">
									<div class="profile-info-widget">
										<a href="patient-profile.html" class="booking-doc-img">
											<img src="{{$appoinment->user->image}}" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3><a href="patient-profile.html">{{$appoinment->user->name}}</a></h3>
											<div class="patient-details">
												<h5><i class="far fa-clock"></i> {{$appoinment->date}} {{$appoinment->time}}</h5>
												<h5><i class="fas fa-map-marker-alt"></i>{{$appoinment->user->city}} {{$appoinment->user->country}}</h5>
												<h5><i class="fas fa-envelope"></i> {{$appoinment->user->email}}</h5>
												<h5 class="mb-0"><i class="fas fa-phone"></i> {{$appoinment->user->phone}}</h5>
											</div>
										</div>
									</div>
								
								</div>
								<!-- /Appointment List -->
							
							@endforeach
								
							</div>
						</div>
		
@endsection