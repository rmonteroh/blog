@extends('layouts.app')

@section('content')

<div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>
                            <img src="{{asset($post->image)}}" alt="" class="img img-responsive img-rounded" style="height: 40px">
                            </td>
                            <td>{{$post->title}}</td>
                            <td>
                                <a href="{{route('post.edit',['id'=>$post->id])}}" class="btn btn-xs btn-info">
                                    <span class="glyphicon glyphicon-pencil">Edit</span>
                                </a>
                            </td>
                            <td>
                            <a href="{{route('post.delete',['id'=>$post->id])}}" class="btn btn-xs btn-danger">
                                    <span class="glyphicon glyphicon-pencil">Delete</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
    
@endsection