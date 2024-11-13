@extends('layouts.patient')


@section('content')
<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body pt-0">
								
									<!-- Tab Menu -->
									<nav class="user-tabs mb-4">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
											<li class="nav-item">
												<a class="nav-link active" href="#pat_appointments" data-toggle="tab">Appointments</a>
											</li>
											
										</ul>
									</nav>
									<!-- /Tab Menu -->
									
									<!-- Tab Content -->
									<div class="tab-content pt-0">
										
										<!-- Appointment Tab -->
										<div id="pat_appointments" class="tab-pane fade show active">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>Doctor</th>
																	<th>Appt Date</th>
																	<th>Booking Date</th>
																	<th>Amount</th>
																	<th>Status</th>
																	<th></th>
																</tr>
															</thead>
															<tbody>
																@foreach ($appoinments as $appoinment)
																
																
																<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="{{$appoinment->doctor->image}}" alt="User Image">
																			</a>
																			<a href="{{route('doctorprofile' , $appoinment->doctor->id)}}">Dr. {{$appoinment->doctor->name}} <span>{{$appoinment->doctor->major}}</span></a>
																		</h2>
																	</td>
																	<td>{{$appoinment->date}} <span class="d-block text-info">{{$appoinment->time}}</span></td>
																	<td>{{$appoinment->created_at}}</td>
																	<td>{{$appoinment->doctor->pricing}}</td>
																	@if ($appoinment->statues == 'confirmed')
																	<td><span class="badge badge-pill bg-success-light">Confirmed</span></td>
																	@endif

																	@if ($appoinment->statues == 'canceled')
																	<td><span class="badge badge-pill bg-danger-light">Cancelled</span></td>
																	@endif
																
																	@if ($appoinment->statues == 'pending')
																	<td><span class="badge badge-pill bg-warning-light">Pending</span></td>
																		
																	@endif
																
																
																	
																	<td class="text-right">
																		<div class="table-action">
																			<a onclick="showToast()" href="{{route('deleteappoinment' , $appoinment->id)}}" class="btn btn-sm bg-danger-light">
																				<i class="far fa-trash-alt"></i> Cancel
																			</a>

																		</div>
																	</td>
																</tr>
																@endforeach
															
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Appointment Tab -->
										
										
									</div>
									<!-- Tab Content -->
									
								</div>
							</div>
						</div>
						
@endsection


@section('js')




<script>

    async function showToast() {
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "4000"
        };
        
    
        
        toastr.success("You have canceled your appoinment successfully");
    }
</script>
@endsection