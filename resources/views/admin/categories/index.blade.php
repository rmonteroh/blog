@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>Category name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>
                                <a href="{{route('category.edit',['id'=>$category->id])}}" class="btn btn-xs btn-info">
                                    <span class="glyphicon glyphicon-pencil">Edit</span>
                                </a>
                            </td>
                            <td>
                            <a href="{{route('category.delete',['id'=>$category->id])}}" class="btn btn-xs btn-danger">
                                    <span class="glyphicon glyphicon-pencil">Delete</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@stop