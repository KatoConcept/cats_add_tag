@extends('layouts.default')

@section('title', 'Edit ' . $cat->name)

@section('content')
    <div class="container pt-3">
        <a class="btn btn-primary" href="{{url()->previous()}}">back</a>
        <form action="{{route('cats.update', ['cat'=>$cat->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                @error('name')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') ?? $cat->name }}" required>
            </div>
            <div class="mb-3">
                @error('breed')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
                <label for="breed" class="form-label">Breed</label>

                <input class="form-control"  id="breed" name="breed" list="datalistOptions" placeholder="Type to search..." value="{{ old('breed') ?? $cat->breed->name }}" required>
                <datalist id="datalistOptions">
                    @foreach($breeds as $breed)
                        <option value="{{$breed->name}}">
                    @endforeach
                </datalist>
            </div>
            <div class="mb-3">
                @error('birthday')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
                <label for="birthday" class="form-label">Birthday</label>
                <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Birthday" value="{{ old('birthday') ?? $cat->birthday->toDateString() }}" required>
            </div>
            <div class="mb-3">
                @error('gender')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="MALE" @if(old('gender')==="MALE" || $cat->gender === "MALE") selected @endif>Male</option>
                    <option value="FEMALE" @if(old('gender')==="FEMALE" || $cat->gender === "FEMALE") selected @endif>Female</option>
                </select>
            </div>
            <div class="mb-3">
                @error('description')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Description" rows="3"  required>{{old('description') ?? $cat->description}}</textarea>
            </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection
