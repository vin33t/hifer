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
                                    @if(Auth::user()->vendor)
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @if($products->count()>0)
                                <?php $i  = 1; ?>
                                    @foreach($products as $product)
                                    <form action="{{route('product.save',['id'=>$product->id])}}" method="post">
                                            @csrf
                                    <tr>
                                        <th>{{$i++}}.</th>
                                        <td>
                                                <img src="{{asset($product->img)}}" alt="" style="height:150px; width:150px;">
                                            </td>
                                        <td>
                                            {{$product->category->name}}
                                        </td>
                                        <td>{{$product->name}}</td>
                                        @if(Auth::user()->vendor)
                                        <td>
                                            <input type="text" name="quantity" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="price" class="form-control">
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-sm btn-success">Save</button>
                                        </td>
                                        @endif
                                    </tr>
                                </form>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    
                </div>
            </div>
        </div>
@endsection