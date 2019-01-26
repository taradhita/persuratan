@extends('layouts.admin-layout',['activeMenu' => 'admin.surat-masuk'])
@section('content')
						<h4 class="page-title">Surat Masuk</h4>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Daftar Surat Masuk</h4>
									</div>
									<div class="card-body">
										<p class="demo">
											<a href="/admin/surat-masuk/create" class="btn btn-primary">Upload Surat</a>
											<div class="table-responsive">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>#</th>
														<th>No. Surat</th>
														<th>Tanggal</th>
														<th>Tujuan</th>
														<th>Asal Surat</th>
														<th>Perihal</th>
														<th>Status</th>
														<th>File Surat</th>
														<th>Aksi</th>			
													</tr>
												</thead>
												<tbody>
													<tr>
														<th scope="row">1</th>
														<td>Table cell</td>
														<td>Table cell</td>
														<td>Table cell</td>
														<td>Table cell</td>
														<td>Table cell</td>
														<td>Table cell</td>
														<td><button class="btn btn-primary" data-toggle="modal" data-target="#modalView">Lihat</button> </td>
														<td>
															<button class="btn btn-primary"><i class="la la-edit"></i></button> 
															<button class="btn btn-danger"><i class="la la-trash"></i></button>
														</td>
													</tr>
												</tbody>
											</table>
											<!-- uncomment if mail > 10 
											<ul class="pagination pg-primary">
												<li class="page-item">
													<a class="page-link" href="#" aria-label="Previous">
														<span aria-hidden="true">&laquo;</span>
														<span class="sr-only">Previous</span>
													</a>
												</li>
												<li class="page-item active"><a class="page-link" href="#">1</a></li>
												<li class="page-item"><a class="page-link" href="#">2</a></li>
												<li class="page-item"><a class="page-link" href="#">3</a></li>
												<li class="page-item">
													<a class="page-link" href="#" aria-label="Next">
														<span aria-hidden="true">&raquo;</span>
														<span class="sr-only">Next</span>
													</a>
												</li>
											</ul>
										-->
										</div>
										</p>
									</div>
								</div>
							</div>
						</div>
@endsection