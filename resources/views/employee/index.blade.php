@extends('layouts.app')
@section('content')
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                    Employees
                    <div class="text-right">
                        <a href="{{route('employee.create')}}" class="btn btn-sm btn-success">Create</a>
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
                            @if($employees->count()>0)
                            <?php $i  = 1; ?>
                                @foreach($employees as $employee)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>
                                        {{-- <a href="{{route('employee.view',['id'=>$employee->id])}}" class="btn btn-sm btn-primary">View</a> --}}
                                        <a href="{{route('employee.edit',['id'=>$employee->id])}}" class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{route('employee.delete',['id'=>$employee->id])}}" class="btn btn-sm btn-danger">Delete</a>
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