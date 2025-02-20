@extends('layouts.main')

@section('content')


			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
								
							<!-- Register Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Register">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Patient Register <a href="{{route('doctorlogin')}}">Are you a Doctor?</a></h3>
										</div>
										
										<!-- Register Form -->
										<form method="post" action="{{ route('register')}}" >
                                            @csrf
											<div class="form-group form-focus">
												<input type="text" name="name" class="form-control floating" value="{{old('name')}}">
												<label class="focus-label">Name</label>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

											</div>
											
                                            
                                            <div class="form-group form-focus">
												<input type="email" name="email" class="form-control floating" value="{{old('email')}}">
												<label class="focus-label">Email Address</label>
       @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

											</div>
											
                                            
                                            <div class="form-group form-focus">
												<input type="password" name="password" class="form-control floating" value="{{old('password')}}">
												<label class="focus-label">Create Password</label>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

											</div>
											<div class="form-group form-focus">
												<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="cofirm password" required autocomplete="new-password">
												<label class="focus-label">confirm Password</label>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

											</div>
			
                                            
                                            
                                            <div class="text-right">
												<a class="forgot-link" href="{{route('login')}}">Already have an account?</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">
                                            Register
                                            </button>
											
										</form>
										<!-- /Register Form -->
										
									</div>
								</div>
							</div>
							<!-- /Register Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
@endsection
