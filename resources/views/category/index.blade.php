@extends('layouts.app')
@section('content')
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                    Categories
                    <div class="text-right">
                            <a href="{{route('category.create')}}" class="btn btn-sm btn-success">Create</a>
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
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($categories->count()>0)
                            <?php $i  = 1; ?>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                        @if(!Auth::user()->admin)
                                        <a href="{{route('category.products',['id'=>$category->id])}}">{{$category->name}}</a>
                                        @else
                                        {{$category->name}}
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <a href="{{route('client.view',['id'=>$client->id])}}" class="btn btn-sm btn-primary">View</a> --}}
                                        <a href="{{route('category.edit',['id'=>$category->id])}}" class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{route('category.delete',['id'=>$category->id])}}" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection