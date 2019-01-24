@extends('layouts.admin-layout',['activeMenu' => 'admin.surat-masuk'])
@section('content')
						<h4 class="page-title">Surat Masuk</h4>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Upload Surat Masuk</h4>
									</div>
									<div class="card-body">
										<form method="POST">
											@csrf
											<div class="form-group">
												<label for="no_surat">No Surat</label>
												<input type="text" class="form-control" id="no_surat" placeholder="No Surat">
											</div>
											<div class="form-group">
												<label for="tanggal">Tanggal Surat</label>
												<input type="text" class="form-control" id="kepada" placeholder="No Surat">
											</div>
											<div class="form-group">
												<label for="tujuan_surat">Tujuan Surat</label>
												<input type="text" class="form-control" id="tujuan_surat" placeholder="Tujuan Surat">
											</div>
											<div class="form-group">
												<label for="asal_surat">Asal Surat</label>
												<input type="text" class="form-control" id="asal_surat" placeholder="Asal Surat">
											</div>
											<div class="form-group">
												<label for="upload_surat">Upload Surat</label>
												<input type="file" class="form-control-file" id="upload_surat">
												<small id="uploadHelp" class="form-text text-muted">File dalam format jpeg, pdf, png.</small>
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