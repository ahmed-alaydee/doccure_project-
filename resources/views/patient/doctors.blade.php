@extends('layouts.patient')

@section('content')
<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="row row-grid">
							
                            @foreach ($doctors as $doctor)
                            
                         
                            <div class="col-md-6 col-lg-4 col-xl-3">
									<div class="profile-widget">
										<div class="doc-img">
											<a href="doctor-profile.html">
												<img class="img-fluid" alt="User Image" src="{{$doctor->image}}">
											</a>
											<a href="javascript:void(0)" class="fav-btn">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="doctor-profile.html">{{$doctor->name}}</a> 
												<i class="fas fa-check-circle verified"></i>
											</h3>
											<p class="speciality">{{$doctor->major}}</p>
											
											<ul class="available-info">
												<li>
													<i class="fas fa-map-marker-alt"></i> {{$doctor->country}}
												</li>
												
												<li>
													<i class="far fa-money-bill-alt"></i> {{$doctor->pricing}} <i class="fas fa-info-circle" data-toggle="tooltip" title="" data-original-title="Lorem Ipsum"></i>
												</li>
											</ul>
											<div class="row row-sm">
												<div class="col-6">
													<a href="{{route('doctorprofile' , $doctor->id)}}" class="btn view-btn">View Profile</a>
												</div>
												<div class="col-6">
													<a href="{{route('booking' , $doctor->id)}}" class="btn book-btn">Book Now</a>
												</div>
											</div>
										</div>
									</div>
								</div>
                                @endforeach		
							
								
							</div>
						</div>
@endsection