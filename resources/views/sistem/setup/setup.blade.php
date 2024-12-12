@extends('layouts.dashboard-admin')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                    <h1>Sistem Setup</h1>
                </div>
                <!-- untuk create menggunakan model  -->
                <div class="col-sm-6 text-right">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">Tambah Tahun Baru
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- data target disamakan dengan id nya => createModal  -->
    <div class="modal fade" id="createModal" role="dialog" data-keyboard="false" data-backdrop="static"
         aria-hidden="true">
        <form>
            @csrf
            @include('sistem.setup.create-tahun-baru') <!-- panggil nama modalnya disini  -->
        </form>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 py-3">
                    <div class="card card-success card-outline">
                        <div class="card-body overflow-x p-0">
                            <div class="row">
                                <div class="col-12 col-md-6 p-3">
                                    <span>Modul</span>
                                    <hr>
                                    <!-- input form pakai form-group untuk label dan input nya -->
                                    <!-- nama label, nama input, nama id pakai bahasa indonesia dan snake_case  -->
                                    <div class="form-group row">
                                        <label class="col-3 text-right">Kode Modul</label>
                                        <div class="col-9">
                                            <input type="text" name="kode_modul" id="kode_modul" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-3 text-right">Nama Modul</label>
                                        <div class="col-9">
                                            <input type="text" name="nama_modul" id="nama_modul" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 text-right">Tahun</label>
                                        <div class="col-9">
                                            <select name="tahun" class="form-control">
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                            </select>
                                        </div>
                                    </div>
                                    <span>Faktur</span>
                                    <hr>
                                    <div class="form-group row">
                                        <label class="col-3 text-right">Tanggap PPKP</label>
                                        <div class="col-9">
                                            <input type="date" name="tanggal_ppkp" id="tanggal_ppkp"
                                                   class="form-control">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-md-6 p-3">
                                    <span>General</span>
                                    <hr>
                                    <div class="form-group row">
                                        <label class="col-3 text-right">Perusahaan</label>
                                        <div class="col-9">
                                            <input type="text" name="perusahaan" id="perusahaan" class="form-control">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <button type="submit" class="btn btn-sm btn-info">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
