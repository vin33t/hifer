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
                    Create Product
                </div>

                <div class="box-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-3">
                            <label for="category">Category</label>
                            <select name="category" required id="" class="form-control">
                                <option value="">--SELECT--</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="name">Name</label>
                            <input type="text" name="name" required class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="img">Image</label>
                            <input type="file" name="img" required class="form-control">
                        </div>
                        <div class="col-md-2"><br>
                            <button type="submit" class="btn btn-sm btn-success">Add Product</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
@endsection