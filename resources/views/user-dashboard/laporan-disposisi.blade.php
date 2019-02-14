@extends('layouts.user-layout',['activeMenu' => 'user.laporan'])
@section('content')
<h4 class="page-title">Laporan Surat Masuk</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Buat Laporan</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('user.laporan-disposisi')}}" method="get">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Bulan</label>
                                <div class="input-group">
                                <select class="form-control input-square " name="month">
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>

                                </select>
                            </div>
                            </div>
                            <div class="col-md-4">
                                <label>Tahun</label>
                                <div class="input-group">
                                    <select class="form-control input-square " name="year">
                                        @foreach ($selectyear as $yrs)
                                        <option value="{{$yrs->yr}}">{{$yrs->yr}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <br />
                                <div class="input-group-btn">
                                <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>    
                      
                    </form>

                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No. Surat</th>
                                <th>Tanggal Disposisi</th>
                                <th>Tujuan Disposisi</th>
                                <th>Note</th>
                                <th>File Surat</th>       
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($disposisi as $d)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$d->no_disposisi}}</td>
                                <td>{{$d->tanggal_disposisi}}</td>
                                <td>{{$d->tujuan_disposisi}}</td>
                                <td>{{$d->note}}</td>
                                <td><button class="btn btn-primary" data-toggle="modal" data-target="#modalView{{$d->id}}">Lihat</button> 
                                <!-- Modal -->
                                    <div class="modal fade" id="modalView{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h6 class="modal-title">File Surat</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                    
                                            
                </div>
                  
                </div>
            </div>
        </div>
    </div>

@endsection