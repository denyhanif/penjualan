@extends('layouts.template')

@section('title')
Data Produk
@endsection

@section('content')
<div calss="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">

                 @if(Request::get('keyword'))
                    <a class="btn btn-success" href="{{route('produk.index')}}"> Back </a>
                 @else
                    <a class="btn btn-success" href="{{route('produk.create')}}"><span class="glyphicon glyphicon-plus"></span>Create</a>
                 @endif 
                 @include('alert.success')   
                <form method="get" action="{{ route('produk.index')}}">
                    <div class="form-group">
                        <label for="keyword" class="col-sm-2 control-label">Search by name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="keyword" name="keyword" value="{{Request::get('keyword')}}" >
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-info">
                                <span class="glyphicon glyphicon-search"></span>
                            </button> 
                        </div>
                    </div>
                </form>

                <br/>
                <br/>
                <br/>
                
                <form method="get" action="{{ route('produk.index')}}">
                    <div class="form-group">
                        <label for="kd_kategori" class="col-sm-2 control-label">Search by kategori</label>
                        <div class="col-sm-4">
                            <select name="kd_kategori" id="kd_kategori" class="form-control">
                                @foreach($kategori as $row)
                                    <option value="{{ $row->kd_kategori}}">{{$row->kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-info">
                                <span class="glyphicon glyphicon-search"></span>
                            </button> 
                        </div>
                    </div>
                </form>

            </div>
            <div class="box body">
                @if(Request::get('keyword'))
                    <div class="alert alert-success alert-block">
                        Hasil pencarian produk dengan nama <b> {{Request::get('keyword')}}</b>
                    </div>@endif

                    @if(Request::get('kd_kategori'))
                    <div class="alert alert-success alert-block">
                        Hasil pencarian produk dengan kategori <b> {{$nama_kategori}}</b>
                    </div>@endif


                <table class="table table-bordered">
                    <thead class="thead-dark"> 
                        <tr>
                            <th width="5%">No</th>
                            <th class="thead-dark" >Nama Produk</th>
                            <th>Nama kategori</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Stok</th>
                            <th width="30%">Action</th>
                        </tr>                    
                    </thead>

                    <tbody>
                        @foreach($produk as $row)
                            <tr>
                                <td>{{ $loop -> iteration + ($produk->perpage()*($produk->currentPage()-1))}}</td>
                                <td>{{ $row-> nama_produk}}</td>
                                <td>{{ $row-> kategori->kategori}}</td>
                                <td>@rupiah($row-> harga)</td><!-- kategori1=nama fungsi yang ada di model produk yang berrelasi dengan kategori , kategori2=nama kolom yang di akses-->
                                <td><img class="img-thumbnail" width="70px" src="{{asset('uploads/'.$row->gambar_produk)}}" alt=""></td>
                                <td>{{($row->stok)}}</td>
                                <td>
                                <form method="post" action="{{ route('produk.destroy',[$row->kd_produk])}} " onsubmit="return confirm('Apakah anda yakin akan menghapus data ini?')">
                                @csrf
                                {{method_field('DELETE')}}
                                <a class="btn btn-warning" href="{{route('produk.edit',[$row->kd_produk])}}">Edit</a>
                                <button type="submit"  class="btn btn-danger">Hapus</button>                     
                                </form>
                                </td>             
                                
                                

                            </tr>
                        @endforeach
                    </tbody>              
                </table>
                <!-- paging menjadi 2 halaman,, setting paginate si usercontroller-->
                {{$produk->appends(Request::all())->links()}}
            </div>
        </div>
    </div>
</div>
@endsection