@extends('layouts.user-layout',['activeMenu' => 'user.surat-keluar'])
@section('content')
<h4 class="page-title">Surat Keluar</h4>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Daftar Surat Keluar</h4>
			</div>
			<div class="card-body">
				<form action="/user/surat-keluar/search" method="get">
					<label>Search by date</label>
					<div class="input-group">
    					<input type="date" class="form-control col-md-3" name="searchdate"> 
    					<div class="input-group-btn">
        					<button type="submit" class="btn btn-primary">Search</button> 
    					</div>
					</div>
				</form>
				<p class="demo">
					<a style = "text-align:right;" href="/user/surat-keluar/create" class="btn btn-primary">Upload Surat</a>
					<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>No. Surat</th>
								<th>Tanggal</th>
								<th>Tujuan</th>
								<th>Perihal</th>
								<th>File Surat</th>	
							</tr>
						</thead>
						<tbody>
							@foreach ($suratkeluar as $s)
							<tr>
								<th scope="row">{{$loop->iteration}}</th>
								<td>{{$s->no_surat}}</td>
								<td>{{$s->tanggal}}</td>
								<td>{{$s->tujuan}}</td>
								<td>{{$s->perihal}}</td>
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
													<iframe src="/images/surat_keluar/{{$s->file_surat}}" frameborder="0" style="width:100%;min-height:500px;"></iframe>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				{{ $suratkeluar->links('pagination.custom') }}
				</div>
									
			</div>
		</div>
	</div>
</div>
@endsection