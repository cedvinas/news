@extends('layout')
@section('content')

    <div class="container">
        <a href="{{url('/create')}}"><button class="btn btn-secondary">Create an article</button></a>

        <table class="table">
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Description</td>
                <td>Active</td>
            </tr>
            
            @foreach($news as $new)
                <tr>
                    <td>{{ $new->id }}</td>
                    <td><a href="{{ url('/show', $new->id) }}">{{ $new->title }}</a></td>
                    <td>{{ $new->description }}</td>
                    <td>{{ $new->active }}</td> 
                    <td>
                        <a href="{{ route('news.edit', $new->id) }}">
                            <button class="btn btn-warning">Edit</button>
                        </a>
                        <form action="{{ url('/delete', $new->id) }}" method="post">
                            @csrf
                            @method("delete")
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
               
            @endforeach
        </table>
    </div>

@endsection