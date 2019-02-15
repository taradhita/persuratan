@extends('layouts.admin-layout',['activeMenu' => 'admin.arsip'])
@section('content')
    <h4 class="page-title">Arsip Surat</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Cari Berdasarkan Seksi</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-stats card-primary">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="icon-big text-center"><i class="la la-archive"></i></div>
                                        </div>
                                        <div class="col-8 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category">Seksi</p>
                                                <a href="{{route('arsip.detail',['seksi' => 'Infrastruktur Pertanahan'])}}"
                                                   class="card-title">Infrastruktur Pertanahan</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-stats card-primary">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="icon-big text-center"><i class="la la-archive"></i></div>
                                        </div>
                                        <div class="col-8 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category">Seksi</p>
                                                <a href="{{route('arsip.detail',['seksi' => 'Hubungan Hukum Pertanahan'])}}" class="card-title">Hubungan Hukum Pertanahan </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-stats card-primary">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="icon-big text-center"><i class="la la-archive"></i></div>
                                        </div>
                                        <div class="col-8 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category">Seksi</p>
                                                <a href="{{route('arsip.detail',['seksi' => 'Penataan Pertanahan'])}}" class="card-title">Penataan Pertanahan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-stats card-primary">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="icon-big text-center"><i class="la la-archive"></i></div>
                                        </div>
                                        <div class="col-8 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category">Seksi</p>
                                                <a href="{{route('arsip.detail',['seksi' => 'Pengadaan Tanah'])}}" class="card-title">Pengadaan Tanah</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-stats card-primary">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="icon-big text-center"><i class="la la-archive"></i></div>
                                        </div>
                                        <div class="col-8 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category">Seksi</p>
                                                <a href="{{route('arsip.detail',['seksi' => 'Pengendalian Masalah dan Pengendalian Pertanahan'])}}" class="card-title">Pengendalian Masalah dan Pengendalian
                                                    Pertanahan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-stats card-primary">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="icon-big text-center"><i class="la la-archive"></i></div>
                                        </div>
                                        <div class="col-8 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category"></p>
                                                <a href="{{route('arsip.detail',['seksi' => 'TU'])}}" class="card-title">Tata Usaha</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection