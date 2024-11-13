@extends('layouts.doctor')


@section('content')
<div class="col-md-7 col-lg-8 col-xl-9">
<div class="row">
								<div class="col-lg-12">
									<h4 class="mb-4">Patient Appoinment</h4>
									<div class="appointments">

									@foreach ($appoinments as $appoinment)
										<div class="appointment-list">
											<div class="profile-info-widget">
												<a href="" class="booking-doc-img">
													<img src="{{$appoinment->user->image}}" alt="User Image">
												</a>
												<div class="profile-det-info">
													<h3><a href="patient-profile.html"></a>{{$appoinment->user->name}}</h3>
													<div class="patient-details">
													
														<h5><i class="far fa-clock"></i> {{$appoinment->date}} {{' '."$appoinment->time"}}</h5>
														<h5><i class="fas fa-map-marker-alt"></i>{{$appoinment->user->address}} {{','}} {{$appoinment->user->country}}</h5>
														<h5><i class="fas fa-envelope"></i> {{$appoinment->user->email}}</h5>
														<h5 class="mb-0"><i class="fas fa-phone"></i> {{$appoinment->user->mobile}}</h5>
													</div>
												</div>
											</div>
											<div class="appointment-action">
												
												<a onclick="showToast()" href="{{route('acceptappoinment' , $appoinment->id)}}" class="btn btn-sm bg-success-light">
													<i class="fas fa-check"></i> Accept
												</a>
												<a onclick="showToast2()" href="{{route('cancelappoinment' , $appoinment->id)}}" class="btn btn-sm bg-danger-light">
													<i class="fas fa-times"></i> Cancel
												</a>
											</div>
										</div>
									@endforeach
								
										
									</div>
								</div>
</div>
</div>
@endsection

@push('js')

<script>


async function showToast() {
toastr.options = {
"closeButton": true,
"progressBar": true,
"positionClass": "toast-top-right",
"timeOut": "3000"
};



toastr.success("You have accepted The appoinment successfully");
}

async function showToast2() {
toastr.options = {
"closeButton": true,
"progressBar": true,
"positionClass": "toast-top-right",
"timeOut": "3000"
};



toastr.error("You have canceled The appoinment successfully");
}


</script>

@endpush