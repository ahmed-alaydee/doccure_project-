@extends('layouts.doctor')

@section('content')
<div class="col-md-7 col-lg-8 col-xl-9">
							<form action="{{route('updatedata')}}" method="post" enctype="multipart/form-data">	
								@csrf					
								<!-- Basic Information -->
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Basic Information</h4>
										<div class="row form-row">
											<div class="col-md-12">
												<div class="form-group">
													<div class="change-avatar">
														<div class="profile-img">
															<img src="{{$Data->image}}" alt="User Image">
														</div>
														<div class="upload-img">
															<div class="change-photo-btn">
																<span><i class="fa fa-upload"></i> Upload Photo</span>
																<input type="file" name="image" class="upload">
															</div>
															<small class="form-	text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Username <span class="text-danger">*</span></label>
													<input type="text" value="{{$Data->name}}" class="form-control" readonly="">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Email <span class="text-danger">*</span></label>
													<input type="email" value="{{$Data->email}}" class="form-control" readonly="">
												</div>
											</div>
										
										
											<div class="col-md-6">
												<div class="form-group">
													<label>Phone Number</label>
													<input type="text" name="phone" value="{{$Data->phone}}" class="form-control">
												</div>
											</div>
											
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Country</label>
													<input type="text" name="country" value="{{$Data->country}}"  class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">major</label>
													<input type="text" name="major" value="{{$Data->major}}"  class="form-control">
												</div>
											</div>
											
											<div class="col-md-12">
											
										    <div id="scheduleContainer">
										        <div class="schedule-item">
										            <label for="day">Choose Day: </label>
										            <select name="day[]" required>
										                <option value="Monday">Monday</option>
										                <option value="Tuesday">Tuesday</option>
										                <option value="Wednesday">Wednesday</option>
										                <option value="Thursday">Thursday</option>
										                <option value="Friday">Friday</option>
										                <option value="Saturday">Saturday</option>
										                <option value="Sunday">Sunday</option>
										            </select>
										
										            <label for="start_time">start_time</label>
										            <input type="time" name="start_time[]" required>
										
										            <label for="end_time">end_time</label>
										            <input type="time" name="end_time[]" required>
										        </div>
										    </div>
										
										    <button type="button" onclick="addSchedule()">Add onther date</button>

											</div>
										</div>
									</div>
								</div>
								<!-- /Basic Information -->
								
								<!-- About Me -->
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">About Me</h4>
										<div class="form-group mb-0">
											<label>Biography</label>
											<textarea class="form-control" title="bio" name="bio" rows="5">{{$Data->bio}}</textarea>
										</div>
									</div>
								</div>
								<!-- /About Me -->
								
								

								
								
								<!-- Pricing -->
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Pricing</h4>
										
										<div class="form-group mb-0">
											<div id="pricing_select">
												<input type="text" class="form-control" id="custom_rating_input" name="pricing" value="{{$Data->pricing}}"  placeholder="20">
											</div>

										</div>
										
										
										
									</div>
								</div>
								<!-- /Pricing -->
								
								
							
								
								
								<div class="submit-section submit-btn-bottom">
									<button type="submit" onclick="submitSchedule()" class="btn btn-primary submit-btn">Save Changes</button>
								</div>
							</form>	
						</div>
@endsection

