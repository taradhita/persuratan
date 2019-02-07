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
				<form action="/admin/surat-masuk/search" method="get">
					<label>Search by date</label>
					<div class="input-group">
    					<input type="date" class="form-control col-md-3" name="searchdate"> 
    					<div class="input-group-btn">
        					<button type="submit" class="btn btn-primary">Search</button> 
    					</div>
					</div>
				</form>
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
													<img src="/images/surat_masuk/{{$s->file_surat}}" width="85%;" >
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
								</td>
								<td>
									<a class="btn btn-primary" href="{{route('surat-masuk.edit', $s->id)}}"><i class="la la-edit"></i></a>
									<form style="display:inline-block;" method="post" action="{{route('surat-masuk.destroy', $s->id)}}">
                                  		@csrf
                                  		{{ method_field('DELETE') }}
                                  		<button type="submit" class="btn btn-danger"><i class="la la-trash"></i></button>
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



