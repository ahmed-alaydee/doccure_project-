@extends('layouts.patient')

@section('content')
<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									
									<!-- Profile Settings Form -->
									<form action="{{route('updateprofile')}}" method="post" enctype="multipart/form-data">
									@csrf
									<div class="row form-row">
											<div class="col-12 col-md-12">
												<div class="form-group">
													<div class="change-avatar">
														<div class="profile-img">
															<img src="{{Auth::user()->image}}" alt="User Image">
														</div>
														<div class="upload-img">
															<div class="change-photo-btn">
																<span><i class="fa fa-upload"></i> Upload Photo</span>
																<input type="file" name="image" class="upload">
															</div>
															<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>First Name</label>
													<input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Last Name</label>
													<input type="text" name="lastname" class="form-control" value="{{Auth::user()->lastname}}">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Date of Birth</label>
													<div class="cal-icon">
														<input type="text" namax="dob" class="form-control datetimepicker" name="dob" value="{{Auth::user()->dob}}">
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
												
												<label>Blood Group</label>
													<select class="form-control select select2-hidden-accessible" name="blood_group" data-select2-id="1" tabindex="-1" aria-hidden="true">
														<option {{Auth::user()->blood_group == 'A-' ? 'Selected' : '' }}>A-</option>
														<option {{Auth::user()->blood_group == 'A+' ? 'Selected' : '' }}>A+</option>
														<option {{Auth::user()->blood_group == 'B-' ? 'Selected' : '' }}>B-</option>
														<option {{Auth::user()->blood_group == 'B+' ? 'Selected' : '' }}>B+</option>
														<option {{Auth::user()->blood_group == 'AB-'? 'Selected' : '' }}>AB-</option>
														<option {{Auth::user()->blood_group == 'AB+'? 'Selected' : '' }}>AB+</option>
														<option {{Auth::user()->blood_group == 'O-' ? 'Selected' : '' }}>O-</option>
														<option {{Auth::user()->blood_group == 'O+' ? 'Selected' : '' }}>O+</option>
													</select>
													<span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: 100%;">
														<span class="selection">
														
													
													</span>
														<span class="dropdown-wrapper" aria-hidden="true"></span>
													</span>
												
												</div>
											</div>
											
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Mobile</label>
													<input type="text" name="mobile" value="{{Auth::user()->mobile}}" class="form-control">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
												<label>Address</label>
													<input type="text" name="address" class="form-control" value="{{Auth::user()->address}}">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>City</label>
													<input type="text" name="city" class="form-control" value="{{Auth::user()->city}}">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Country</label>
													<input type="text" class="form-control" name="country" value="{{Auth::user()->country}}">
												</div>
											</div>
										</div>
										<div class="submit-section">
											<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
										</div>
									</form>
									<!-- /Profile Settings Form -->
									
								</div>
							</div>
						</div>
@endsection