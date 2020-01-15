<!-- mengambil dari template.blade.php dari folderlayout,, dan di yield -->

@extends('layouts.template')

@section('title')
Dashboard
@endsection


@section('content')

<div class = "row">
    <div class="col-md-12">
        <div class="box-header with-border">
            //ini bagian header
        </div>
        <div class="box-body">
            //ini adalah bagian content
        </div>
    </div>
</div>

@endsection
