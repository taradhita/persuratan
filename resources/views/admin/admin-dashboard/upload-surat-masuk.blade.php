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
										<form method="POST" action="{{route('surat-masuk.store')}}" enctype="multipart/form-data">
											@csrf
											<div class="form-group">
												<label for="no_surat">No Surat</label>
												<input type="text" class="form-control{{ $errors->has('no_surat') ? ' is-invalid' : '' }}" name="no_surat" id="no_surat" placeholder="No Surat">
												@if ($errors->has('no_surat'))
                    								<span class="invalid-feedback">
                    								    <strong>{{ $errors->first('no_surat') }}</strong>
                    								</span>
                								@endif
											</div>
											<div class="form-group">
												<label for="tanggal">Tanggal Surat</label>
												<input type="date" class="form-control{{ $errors->has('tanggal') ? ' is-invalid' : '' }}" name="tanggal" id="tanggal" placeholder="Tanggal Surat">
												@if ($errors->has('tanggal'))
                    								<span class="invalid-feedback">
                    								    <strong>{{ $errors->first('tanggal') }}</strong>
                    								</span>
                								@endif
											</div>
											<div class="form-group">
												<label for="asal_surat">Asal Surat</label>
												<input type="text" class="form-control{{ $errors->has('asal_surat') ? ' is-invalid' : '' }}" name="asal_surat" id="asal_surat" placeholder="Asal Surat">
												@if ($errors->has('asal_surat'))
                    								<span class="invalid-feedback">
                    								    <strong>{{ $errors->first('asal_surat') }}</strong>
                    								</span>
                								@endif
											</div>
											<div class="form-group">
												<label for="perihal">Perihal</label>
												<input type="text" class="form-control{{ $errors->has('perihal') ? ' is-invalid' : '' }}" name="perihal" id="perihal" placeholder="Perihal">
												@if ($errors->has('perihal'))
                    								<span class="invalid-feedback">
                    								    <strong>{{ $errors->first('perihal') }}</strong>
                    								</span>
                								@endif
											</div>
											<div class="form-group">
												<label for="file_surat">Upload Surat</label>
												<input type="file" class="form-control-file{{ $errors->has('file_surat') ? ' is-invalid' : '' }}" id="file_surat" name="file_surat">
												<small id="uploadHelp" class="form-text text-muted">File dalam format jpeg, pdf, png. Ukuran maksimal 1 MB.</small>
												@if ($errors->has('file_surat'))
                    								<span class="invalid-feedback">
                    								    <strong>{{ $errors->first('file_surat') }}</strong>
                    								</span>
                								@endif
											</div>
											<div class="card-action">
												<button class="btn btn-success">Submit</button>
												<a class="btn btn-danger" href="/admin/surat-masuk">Cancel</a>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
@endsection