@extends('layouts.superadmin-layout')
@section('content')
						<h4 class="page-title">Upload Disposisi</h4>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Upload Disposisi</h4>
										<p class="card-category"></p>
									</div>
									<div class="card-body">
										<form method="POST">
											@csrf
											<div class="form-group">
												<label for="no_surat">No Disposisi</label>
												<input type="text" class="form-control" id="no_disposisi" placeholder="No Disposisi">
											</div>
											<div class="form-group">
												<label for="tanggal">Tanggal Disposisi</label>
												<input type="text" class="form-control" id="tanggal_disposisi" placeholder="Tanggal">
											</div>
											<div class="form-group">
												<label for="tujuan_surat">Tujuan Disposisi</label>
												<input type="text" class="form-control" id="tujuan_disposisi" placeholder="Tujuan Disposisi">
											</div>
											<div class="form-group">
												<label for="upload_surat">File Disposi</label><br/>
												<input type="file" class="form-control-file" id="file_disposisi">
												<small id="uploadHelp" class="form-text text-muted">File dalam format jpeg, pdf, png.</small>
											</div>
											<div class="form-group">
												<label for="tanggal">Note</label>
												<textarea class="form-control" id="kepada" rows="5">
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