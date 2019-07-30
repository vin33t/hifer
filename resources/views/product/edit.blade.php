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
                    Edit Product
                </div>

                <div class="box-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <form action="{{route('product.update',['id'=>$product->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="name">Name</label>
                            <input type="text" value="{{$product->name}}" name="name" required class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="img">Image</label>
                            <input type="file" name="img" required class="form-control">
                        </div>
                        <div class="col-md-2"><br>
                            <button type="submit" class="btn btn-sm btn-success">Update Product</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
@endsection