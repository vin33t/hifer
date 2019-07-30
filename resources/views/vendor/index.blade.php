@extends('layouts.app')
@section('content')
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                    Vendors
                    <div class="text-right">
                        <a href="{{route('vendor.create')}}" class="btn btn-sm btn-success">Create</a>
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
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($vendors->count()>0)
                            <?php $i  = 1; ?>
                                @foreach($vendors as $vendor)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$vendor->name}}</td>
                                    <td>{{$vendor->email}}</td>
                                    <td>
                                        {{-- <a href="{{route('vendor.view',['id'=>$vendor->id])}}" class="btn btn-sm btn-primary">View</a> --}}
                                        <a href="{{route('vendor.edit',['id'=>$vendor->id])}}" class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{route('vendor.delete',['id'=>$vendor->id])}}" class="btn btn-sm btn-danger">Delete</a>
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