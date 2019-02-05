@extends('layouts.superadmin-layout',['activeMenu' => 'superadmin.surat-masuk'])
@section('content')
<h4 class="page-title">Surat Masuk</h4>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Daftar Surat Masuk</h4>
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
								<th>Asal Surat</th>
								<th>Perihal</th>
								<th>Status</th>
								<th>File Surat</th>
								<th>Aksi</th>			
							</tr>
						</thead>
						<tbody>
							@foreach ($suratmasuk as $s)
							<tr>
								<th scope="row">{{$loop->iteration}}</th>
								<td>{{$s->no_surat}}</td>
								<td>{{$s->tanggal}}</td>
								<td>{{$s->user->nama_seksi}}</td>
								<td>{{$s->asal_surat}}</td>
								<td>{{$s->perihal}}</td>
								<td>{{$s->status}}</td>
								<td><button class="btn btn-primary" data-toggle="modal" data-target="#modalView{{$s->id}}">Lihat</button> 
								<!-- Modal -->
									<div class="modal fade" id="modalView{{$s->id}}" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header bg-primary">
													<h6 class="modal-title">File Surat</h6>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body text-center">					
													<iframe src="/images/surat_masuk/{{$s->file_surat}}" frameborder="0" style="width:100%;min-height:500px;"></iframe>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
								</td>
								<td>
									<form style="display:inline-block;" method="post" action="{{route('superadmin.surat-masuk.update', $s->id)}}">
										@csrf
										{{ method_field('PUT') }}
										<input type="submit" class="btn btn-success" name="status" value="Terima"></input>
										<input type="submit" class="btn btn-danger" name="status" value="Tolak"></input>
									</form>

								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{{ $suratmasuk->links('pagination.custom') }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection