@extends('layouts.app')
@section('content')
@if ($errors->any())
<div class="col-md-8">
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
                    Create Vendor
                </div>

                <div class="box-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <form action="{{route('vendor.store')}}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-5">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="col-md-5">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="col-md-2"><br>
                            <button type="submit" class="btn btn-sm btn-success">Add Vendor</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
@endsection