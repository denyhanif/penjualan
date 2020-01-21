@extends('layouts.template')

@section('title')
Tambahkan data transaksi_masuk
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                @include('alert.eror')            
            </div>
                    <div class="box-body">
                    <form class="form-horizontal" method="post" action="{{ route('transaksi_masuk.store') }}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="kd_produk" class="col-sm-2 control-label">Produk</label>
                            <div class="col-sm-10">
                                <select  name="kd_produk" class="form-control" id="kd_produk" >
                                    @foreach($produk as $row)
                                    <option value="{{$row->kd_produk}}">{{$row->nama_produk}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kd_produk" class="col-sm-2 control-label">Supplier</label>
                            <div class="col-sm-10">
                                <select  name="kd_supplier" class="form-control" id="kd_supplier" >
                                    @foreach($supplier as $row)
                                    <option value="{{$row->kd_supplier}}">{{$row->nama_supplier}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="tgl_transaksi" class="col-sm-2 control-label">Tanggal Transaksi</label>
                            <div class="col-sm-10">
                                <input type="text" id="tgl_transaksi" name="tgl_transaksi" class="form-control datepicker " value="{{old('tgl_transaksi')}}" readonly />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jumlah" class="col-sm-2 control-label">Jumlah</label>
                            <div class="col-sm-10">
                                <input type="number" id="jumlah" name="jumlah" class="form-control" value="{{old('jumlah')}}"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="harga" class="col-sm-2 control-label">harga</label>
                            <div class="col-sm-10">
                                <input type="number" id="harga" name="harga"  class="form-control" value="{{old('harga')}}"/>
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