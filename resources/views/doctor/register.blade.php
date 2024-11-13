@extends('layouts.main')

@section('content')


			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8 offset-md-2">
						
							<!-- Account Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/login-banner.png" class="img-fluid" alt="Login Banner">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Doctor Register <a href="{{route('login')}}">Not a Doctor?</a></h3>
										</div>
										
										<!-- Register Form -->
										<form method="post" action="{{route('registerdoctor')}}">
											@csrf
											<div class="form-group form-focus">
												<input name="name" type="text" value="{{old('name')}}" class="form-control floating">
												<label class="focus-label">Name</label>
												@error('name')
												<h2>{{$message}}</h2>
												@enderror
											</div>
											<div class="form-group form-focus">
												<input name="email" value="{{old('email')}}" type="email" class="form-control floating">
												<label class="focus-label">Email Address</label>
												@error('email')
												<h2>{{$message}}</h2>
												@enderror

											</div>
											<div class="form-group form-focus">
												<input name="password" value="{{old('password')}}" type="password" class="form-control floating">
												<label class="focus-label">Create Password</label>
												@error('password')
												<h2>{{$message}}</h2>
												@enderror
											</div>
											<div class="text-right">
												<a class="forgot-link" href="{{route('doctorlogin')}}">Already have an account?</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
											
										</form>
										<!-- /Register Form -->
										
									</div>
								</div>
							</div>
							<!-- /Account Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
@endsection
