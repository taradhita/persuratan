@extends('layouts.superadmin-layout')
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
												<input type="text" class="form-control" id="username" placeholder="Username">
											</div>
											<div class="form-group">
												<label for="password">Password</label>
												<input type="password" class="form-control" id="password" placeholder="Password">
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