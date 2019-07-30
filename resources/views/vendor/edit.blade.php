@extends('layouts.app')
@section('content')
<div class="col-md-8">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
            <div class="box">
                <div class="box-header">
                    Edit Vendor
                </div>

                <div class="box-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <form action="{{route('vendor.update',['id'=>$vendor->id])}}" method="post">
                @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <label for="name">Name</label>
                            <input type="text" value="{{$vendor->name}}" name="name" class="form-control">
                        </div>
                        <div class="col-md-5">
                            <label for="email">Email</label>
                            <input type="text" value="{{$vendor->email}}" name="email" class="form-control">
                        </div>
                        <div class="col-md-2"><br>
                            <button type="submit" class="btn btn-sm btn-success">Update Vendor</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
@endsection