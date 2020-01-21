@extends('layouts.template')

@section('title')
Tambahkan Produk
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                @include('alert.eror')            
            </div>
                    <div class="box-body">
                    <form class="form-horizontal" method="post" action="{{ route('produk.store') }}" enctype="multipart/form-data" >
                    @csrf
                    <div class="box-body">

                        <div class="form-group">
                            <label for="nama_produk" class="col-sm-2 control-label">Nama Produk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ old('nama_produk') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kd_kategori" class="col-sm-2 control-label">Katagori</label>
                            <div class="col-sm-10">
                                    <select name="kd_kategori" calss="form-control" id="kd_kategori">
                                        @foreach($kategori as $row)
                                            <option value="{{$row->kd_kategori}}">{{$row->kategori}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="harga" class="col-sm-2 control-label">Harga Produk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="harga" value="{{ old('harga') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gambar_produk" class="col-sm-2 control-label">Gambar Produk</label>
                            <div class="col-sm-10">
                                <input type="file" name="gambar_produk" id="gambar_produk" class="form-control" />
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