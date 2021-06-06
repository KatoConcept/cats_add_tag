@extends('layouts.default')

@section('title', 'New cat')

@section('content')
    <div class="container pt-3">
        <form action="{{route('cats.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                @error('name')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                @error('breed')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
                <label for="breed" class="form-label">Breed</label>
                <input class="form-control"  id="breed" name="breed" list="datalistOptions" placeholder="Type to search..." value="{{ old('breed') }}" required>
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
                <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Birthday" value="{{ old('birthday') }}" required>
            </div>
            <div class="mb-3">
                @error('gender')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="MALE" @if(old('gender')==="MALE") selected @endif>Male</option>
                    <option value="FEMALE" @if(old('gender')==="FEMALE") selected @endif>Female</option>
                </select>
            </div>
            <div class="mb-3">
                @error('description')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Description" rows="3"  required>{{old('description')}}</textarea>
            </div>
            <div class="mb-3">
                @error('image')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
                <label for="images" class="form-label">Image</label>
                <input type="file" class="form-control" id="images" name="images[]" multiple>
            </div>
            <div class="mb-3">
                @error('tag')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
                <label for="tags" class="form-label">Tags</label>
                <select class="form-select" id="tags" name="tags[]" multiple aria-label="multiple select tags">
                    @foreach(\App\Models\Tag::all() as $tag)
                        <option value="{{ $tag->tag }}">{{ $tag->tag }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection
