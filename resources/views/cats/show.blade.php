@extends('layouts.default')

@section('title', $cat->name)

@section('content')
    <div class="container pt-3">
        <a class="btn btn-primary" href="{{url()->previous()}}">back</a>
        <table class="table table-striped">
            <tr>
                <th>Name</th>
                <td>{{$cat->name}}</td>
            </tr>
            <tr>
                <th>Age</th>
                <td>{{$cat->age}}</td>
            </tr>
            <tr>
                <th>Breed</th>
                <td>{{$cat->breed->name}}</td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>{{$cat->gender}}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{$cat->description}}</td>
            </tr>
            @if($cat->images->count())
                <tr>


                    <th>Images</th>
                    <td>
                        @foreach($cat->images as $image)
                        <img width="300" height="200" src="{{$image->fullPath}}"/>
                        @endforeach

                    </td>
                </tr>
            @endempty
        </table>
    </div>
@endsection
