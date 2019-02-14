@extends('layouts.admin-layout',['activeMenu' => 'admin.laporan'])
@section('content')
<h4 class="page-title">Laporan</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Buat Laporan</h4>
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
                                                <p class="card-category">Laporan</p>
                                                <a href="/admin/laporan/surat-masuk"
                                                   class="card-title">Surat Masuk</a>
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
                                                <p class="card-category">Laporan</p>
                                                <a href="/admin/laporan/surat-keluar" class="card-title">Surat Keluar </a>
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
                                                <p class="card-category">Laporan</p>
                                                <a href="/admin/laporan/disposisi" class="card-title">Disposisi</a>
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