@extends('layouts.superadmin-layout',['activeMenu' => 'superadmin.disposisi'])
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
                    <form action="{{route('disposisi.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="no_surat">No Disposisi</label>
                            <input type="text"
                                   class="form-control{{ $errors->has('no_disposisi') ? ' is-invalid' : '' }}"
                                   name="no_disposisi" placeholder="No Disposisi">
                            @if($errors->has('no_disposisi'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('no_disposisi')}}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal Disposisi</label>
                            <input type="date"
                                   class="form-control{{ $errors->has('tanggal_disposisi') ? ' is-invalid' : '' }}"
                                   name="tanggal_disposisi" placeholder="Tanggal">
                            @if($errors->has('tanggal_disposisi'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('tanggal_disposisi')}}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="tujuan_surat">Tujuan Disposisi</label>
                            <select class="custom-select my-1 mr-sm-2 {{ $errors->has('tujuan_disposisi') ? ' is-invalid' : '' }}"
                                    name="tujuan_disposisi">
                                <option selected value="" disabled>Tujuan Disposisi</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->nama_seksi}}</option>
                                @endforeach
                            </select>

                            @if($errors->has('tujuan_disposisi'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('tujuan_disposisi')}}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="upload_surat">File Disposi</label><br/>
                            <input type="file" class="form-control-file" name="file_disposisi">
                            <small id="uploadHelp" class="form-text text-muted">File dalam format jpeg, pdf, png.
                            </small>
                            @if($errors->has('file_disposisi'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('file_disposisi')}}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Note</label>
                            <textarea class="form-control{{ $errors->has('note') ? ' is-invalid' : '' }}" name="note"
                                      rows="5" title=""></textarea>
                            @if($errors->has('note'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('note')}}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="card-action">
                            <button class="btn btn-success">Submit</button>
                            <button class="btn btn-danger" type="submit">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection