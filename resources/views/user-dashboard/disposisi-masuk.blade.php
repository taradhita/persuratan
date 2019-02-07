@extends('layouts.user-layout', ['activeMenu' => 'user.disposisi-masuk'])
@section('content')
    <h4 class="page-title">Disposisi Masuk</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Disposisi Masuk</h4>
                </div>
                <div class="card-body">
                    <form action="/user/disposisi-masuk/search" method="get">
                    <label>Search by date</label>
                    <div class="input-group">
                        <input type="date" class="form-control col-md-3" name="searchdate"> 
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-primary">Search</button> 
                        </div>
                    </div>
                </form>
                    <p class="demo">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>No. Surat</th>
                                <th>Tanggal</th>
                                <th>Tujuan</th>
                                <th>File Surat</th>
                                <th>Note</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($disposisi as $d)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$d->no_disposisi}}</td>
                                    <td>{{$d->tanggal_disposisi}}</td>
                                    <td>{{$d->user->nama_seksi}}</td>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#modalView{{$d->id}}">Lihat
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modalView{{$d->id}}" tabindex="-1" role="dialog"
                                             aria-labelledby="modalUpdatePro" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary">
                                                        <h6 class="modal-title">File Surat</h6>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        @if(pathinfo($d->file_disposisi,PATHINFO_EXTENSION) == 'pdf')
                                                            <embed src="{{ action('DisposisiController@getFile',['id' => $d->id]) }}"
                                                                   style="width: 100%;height: 400px" frameborder="0">
                                                        @else
                                                            <img src="{{ url('storage/disposisi/'.$d->file_disposisi) }}"
                                                                 width="85%;">
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        @if(pathinfo($d->file_disposisi,PATHINFO_EXTENSION) == 'pdf')
                                                            <a class="btn btn-primary"
                                                               href="{{url('storage/disposisi/'. $d->file_disposisi)}}">Download</a>
                                                        @endif
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$d->note}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $disposisi->links('pagination.custom') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection



