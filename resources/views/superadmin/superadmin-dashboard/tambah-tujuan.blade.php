@extends('layouts.superadmin-layout',['activeMenu' => 'superadmin.surat-masuk'])
@section('content')
<h4 class="page-title">Surat Masuk</h4>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Tambah Tujuan</h4>
			</div>
			<div class="card-body">
				<form action="{{route('superadmin.tujuan')}}" method="post">
					@csrf
					<div class="form-group">
						<input type="hidden" name="id_surat" value="{{$id}}">
                            <label for="no_surat">Tujuan </label>
                            <select class="form-control input-square" name="id_tujuan">
								<option selected>Pilih...</option>
								@foreach ($user as $u)
								<option value="{{$u->id}}">{{$u->nama_seksi}}</option>
								@endforeach
							</select>
						<div class="card-action">
							<button class="btn btn-success">Submit</button>
							<a class="btn btn-danger" href="/superadmin/surat-masuk">Cancel</a>
						</div>
                    </div>
				</form>

			</div>
		</div>
	</div>
</div>

@endsection