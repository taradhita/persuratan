@extends('layouts.admin-layout')
@section('content')
						<h4 class="page-title">Edit Profil</h4>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Edit Profil</h4>
									</div>
									<div class="card-body">
										<form method="POST">
											@csrf
											<div class="form-group">
												<label for="username">Username</label>
												<input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" id="username" name="username" placeholder="Username">
												@if ($errors->has('username'))
                                    			<span class="invalid-feedback d-block" role="alert">
                                        			<strong>{{ $errors->first('username') }}</strong>
                                    			</span>
                            					@endif
											</div>
											<div class="form-group">
												<label for="password">Password</label>
												<input type="password" class="form-control" name="password" id="password" placeholder="Password">
												@if ($errors->has('password'))
                                    			<span class="invalid-feedback d-block" role="alert">
                                        			<strong>{{ $errors->first('password') }}</strong>
                                   				 </span>
                            					@endif
											</div>
											<div class="form-group">
												<input type="password" id="password-confirm" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                            
                            					<label for="password-confirm">Confirm Password</label>
											</div>
											<div class="card-action">
												<button class="btn btn-success">Submit</button>
												<button class="btn btn-danger">Cancel</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
@endsection