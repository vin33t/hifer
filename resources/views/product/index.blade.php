@extends('layouts.app')
@section('content')
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                    Products
                    <div class="text-right">
                            <a href="{{route('product.create')}}" class="btn btn-sm btn-success">Create</a>
                    </div>
                </div>

                <div class="box-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <table class="table table-boredred">
                            <thead>
                                <tr>
                                    <th>Sno.</th>
                                    <th>Image</th>
                                    <th>Under</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Accepted By</th>
                                    @if(Auth::user()->admin)
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @if($products->count()>0)
                                <?php $i  = 1; ?>
                                    @foreach($products as $product)
                                    <tr>
                                        <th>{{$i++}}.</th>
                                        <td>
                                            <img src="{{asset($product->img)}}" alt="" style="height:150px; width:150px;">
                                        </td>
                                        <td>
                                            {{$product->category->name}}
                                        </td>
                                        <td>{{$product->name}}</td>
                                        <td>
                                            @if($product->quantity != null)
                                                {{$product->quantity}}
                                            @else
                                                --
                                            @endif
                                        </td>
                                        <td>
                                            @if($product->price != null)
                                                {{$product->price}}
                                            @else
                                                --
                                            @endif
                                        </td>
                                        <td>
                                            @if($product->vendor_id)
                                                {{$product->vendor->name}}
                                            @else
                                                --
                                            @endif
                                        </td>
                                        @if(Auth::user()->admin and $product->vendor_id == null)
                                        <td>
                                            <a href="{{route('product.edit',['id'=>$product->id])}}" class="btn btn-sm btn-success">Edit</a>
                                            <a href="{{route('product.delete',['id'=>$product->id])}}" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                </div>
            </div>
        </div>
@endsection