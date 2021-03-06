@extends('layouts.template')
@section('title')
    Report Penjjualan
@endsection

@section('content')


<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                <a target="_blank" href="{{route('cetak_pdf')}}" class="btn btn-danger">Cetak PDF</a>
                <a target="_blank" href="{{route('cetak_excel')}}" class="btn btn-success">Cetak Excel</a>
                
            </div>
            <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Produk</th>
                                <th>jumlah</th>
                                <th>Harga</th>
                                <th>Tanggal</th>
                                <th>Nama Agen</th>
                            </tr>
                            <tbody>
                            @foreach($penjualan as $row)
                                <tr>
                                    <td>{{ $loop->iteration + ($penjualan->perPage() * ($penjualan->currentPage() - 1 )) }}</td>
                                    <td>{{ $row->produk->nama_produk }}</td>
                                    <td>{{ $row->jumlah }}</td>
                                    <td>@rupiah($row->harga)</td>
                                    <td>{{ $row->transaksi->tgl_penjualan}}</td>
                                    <td>{{ $row->transaksi->agen->nama_toko }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </thead>
                    </table>
                    {{ $penjualan->links() }}
                    <!--  -->
                    
            </div>
          </div>
        </div>
</div>
@endsection


