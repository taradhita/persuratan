@extends('layouts.superadmin-layout')
@section('content')
						<h4 class="page-title">Disposisi</h4>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Daftar Disposisi</h4>
										<p class="card-category">Here is a subtitle for this table</p>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>#</th>
														<th>No. Surat</th>
														<th>Tanggal</th>
														<th>Tujuan</th>
														<th>Lampiran</th>
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
														<td><button class="btn btn-primary" data-toggle="modal" data-target="#modalView">Lihat</button></td>
														
														<td>
															
														</td>
													</tr>
												</tbody>
											</table>
										</p>
									</div>
								</div>
							</div>
						</div>
@endsection