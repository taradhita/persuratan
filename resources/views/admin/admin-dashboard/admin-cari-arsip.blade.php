@extends('layouts.admin-layout',['activeMenu' => 'admin.arsip'])
@section('content')

    <h4 class="page-title">Arsip Surat</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Arsip Surat</h4>
                    <p class="card-category">Seksi <b style="color: black">{{$seksi}}</b></p>
                </div>
                <div class="card-body">
                    <form action="search" method="get">
                        <label>Search by date</label>
                        <div class="input-group">
                            <input type="hidden" name="seksi" value="{{$seksi}}">
                            <input type="date" class="form-control col-md-3" name="searchdate">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                    <p class="demo"><b>Surat Keluar</b>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No. Surat</th>
                                <th>Tanggal</th>
                                <th>Tujuan</th>
                                <th>Asal Surat</th>
                                <th>Perihal</th>
                                <th>File Surat</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($suratKeluar as $keluar)
                                <tr>
                                    <td>{{$keluar->no_surat}}</td>
                                    <td>{{$keluar->tanggal}}</td>
                                    <td>{{$keluar->tujuan}}</td>
                                    <td>{{$keluar->nama}}</td>
                                    <td>{{$keluar->perihal}}</td>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#modalView1{{$keluar->id}}">Lihat
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modalView1{{$keluar->id}}" tabindex="-1"
                                             role="dialog"
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
                                                        @if(pathinfo($keluar->file_surat,PATHINFO_EXTENSION) == 'pdf')
                                                            <img src="{{ url('images/surat_keluar/'.$keluar->file_surat) }}"
                                                                 width="85%;">
                                                        @else
                                                            <img src="{{ url('images/surat_keluar/'.$keluar->file_surat) }}"
                                                                 width="85%;">
                                                        @endif

                                                    </div>
                                                    <div class="modal-footer">

                                                        <a class="btn btn-primary" href="{{url('images/surat_keluar/'. $keluar->file_surat)}}">Download</a>

                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close
                                                        </button>
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

                <div class="card-body">
                    <p class="demo"><b>Surat masuk</b>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No. Surat</th>
                                <th>Tanggal</th>
                                <th>Tujuan</th>
                                <th>Asal Surat</th>
                                <th>Perihal</th>
                                <th>Status</th>
                                <th>File Surat</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($suratMasuk as $masuk)
                                <tr>
                                    <td>{{$masuk->no_surat}}</td>
                                    <td>{{$masuk->tanggal}}</td>
                                    <td>{{$masuk->nama}}</td>
                                    <td>{{$masuk->asal_surat}}</td>
                                    <td>{{$masuk->perihal}}</td>
                                    <td>{{$masuk->status}}</td>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#modalView{{$masuk->id}}">Lihat
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modalView{{$masuk->id}}" tabindex="-1"
                                             role="dialog"
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
                                                        @if(pathinfo($masuk->file_surat,PATHINFO_EXTENSION) == 'pdf')
                                                            <img src="{{ url('images/surat_keluar/'.$masuk->file_surat) }}"
                                                                 width="85%;">
                                                        @else
                                                            <img src="{{ url('images/surat_keluar/'.$masuk->file_surat) }}"
                                                                 width="85%;">
                                                        @endif

                                                    </div>
                                                    <div class="modal-footer">

                                                        <a class="btn btn-primary" href="{{url('images/surat_keluar/'. $masuk->file_surat)}}">Download</a>

                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close
                                                        </button>
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
                    </p>
                </div>


            </div>
        </div>
    </div>
@endsection