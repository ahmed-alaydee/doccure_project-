@extends('layouts.main')

@section('content')
		
		<!-- Page Content -->
    	<div class="content" >
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
							
							<!-- Login Tab Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Login">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Login <span>Doccure</span> DOCTORS</h3>
										</div>
										<form method="post" action="{{route('logindoctor')}}">
											@csrf
											<div class="form-group form-focus">
												<input name="email" value="{{old('email')}}" type="email" class="form-control floating">
												<label class="focus-label">Email</label>
											@error('email')
										
											<div>
													
												<p>{{$message}}</p>
											</div>
											@enderror
											</div>
											<div class="form-group form-focus">
												<input name="password" type="password" class="form-control floating">
												<label class="focus-label">Password</label>
												@error('email')
										<div>
											<p>{{$message}}</p>
										</div>
										@enderror
											</div>
											
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
											
											
											<div class="text-center dont-have">Don’t have an account? <a href="{{route('doctorregister')}}">Register</a></div>
										</form>
									</div>
								</div>
							</div>
							<!-- /Login Tab Content -->
								
						</div>
					</div>

				</div>

			</div>			
			<!-- /Page Content -->
@endsection