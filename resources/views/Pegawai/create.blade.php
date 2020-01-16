@extends('layouts.template')

@section('title')
Tambah data Pegawai
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                @include('alert.eror')            
            </div>
                    <div class="box-body">
                    <form class="form-horizontal" method="post" action="{{ route('pegawai.store') }}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">password</label>
                            <div class="col-sm-10">
                                <input type= "password" class="form-control" name="password" id="password" value=""></input>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nama_pegawai" class="col-sm-2 control-label">Nama Pegawai</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" >
                            </div>
                        </div>

                        <div class="form-group">
                                <label for="ck" class="col-sm-2 control-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                <select name="jk" id="jk" class="form-control">
                                    <option value="PRIA">pria</option>
                                    <option value="WANITA">wanita</option>
                                </select>
                                </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea name="alamat" id="alamat" >{{old('alamat')}}</textarea>
                            </div>
                        </div>


                        

                        <div class="form-group">
                                <label for="is_aktif" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                <select name="is_aktif" id="jk" class="form-control">
                                    <option value="1">aktif</option>
                                    <option value="2">tidak aktif</option>
                                </select>
                                </div>
                            </div>
                         </div>

                        
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" name="tombol" class="btn btn-info pull-right">Save</button>
                    </div>
                    <!-- /.box-footer -->
                    </form>
                    
            </div>
        </div>
    </div>

</div>
@endsection