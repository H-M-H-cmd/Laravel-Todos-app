@extends('layouts.app')
@section('title', 'Edit Todo')
@section('content')

    <div class="container">
        <div class="row pt-5 justify-content-center">
            <div class="card" style="width: 50%;">
                <div class="card-header text-center">
                    <h1>Edit Todo</h1>
                </div>
                <div class="card-body">
                    {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                    <form action="/todos/{{$todo->id}}" method="post">
                        @csrf
                        <div class="form-group">
                            @error('todoTitle')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" name="todoTitle" value="{{ $todo->title }}"
                                class="@error('todoTitle') is-invalid @enderror form-control" placeholder="Enter New Todo">
                        </div>
                        <div class="form-group">
                            @error('todoDescription')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <textarea class="@error('todoDescription') is-invalid @enderror " name="todoDescription" rows="5"
                                style="width: 100%; outline:none;">{{ $todo->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
