@extends('user.seller.layouts.app',['title'=>'Dashboard','request'=>'dashboard'])
@push('css')
@endpush
@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Dashboard</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{route('dashboard.index')}}"><i data-feather="home"></i></a></li>
                    <!-- <li class="breadcrumb-item">Ad section</li> -->
                    <!-- <li class="breadcrumb-item active">Ads List</li> -->
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
@endpush