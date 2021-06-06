@extends('layouts.default')

@section('title', 'Cats')

@section('content')
    <div class="container pt-3">
        <a class="btn btn-primary" href="{{url()->previous()}}">back</a>
        <a href="{{route('cats.create')}}" class="btn btn-primary">Add new</a>
        {{$cats->links('partials.pagination')}}

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>created at</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cats as $cat)
                    <tr>
                        <td>{{$cat->id}}</td>
                        <td>{{$cat->name}}</td>
                        <td>{{$cat->created_at}}</td>
                        <td>
                            <div class="d-inline-flex ">
                                <a class="btn btn-primary me-1" href="{{route('cats.show', ['cat' => $cat->id])}}">view</a>
                                <a class="btn btn-warning me-1" href="{{route('cats.edit', ['cat' => $cat->id])}}">edit</a>
                                <form method="POST" action="{{route('cats.destroy', ['cat' => $cat->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger me-1">delete</button>
{{--                                    <input type="submit" value="delete" class="btn btn-danger me-1">--}}
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$cats->links('partials.pagination')}}
    </div>
@endsection
