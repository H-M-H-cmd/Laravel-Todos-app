@extends('layouts.app')

@section('title', 'All Todos')

@section('content')
    <div class="container">
        <div class="row pt-3 justify-content-center">
            <div class="card" style="width: 50%;">
                <div class="card-header text-center">
                    <h1>All Todos</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @if (session()->has('primary'))
                            <div class="alert alert-primary">
                                {{ session()->get('primary') }}
                            </div>
                        @endif
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if (session()->has('warning'))
                            <div class="alert alert-warning">
                                {{ session()->get('warning') }}
                            </div>
                        @endif
                        @forelse ($todos as $todo)
                            <li class="list-group-item text-muted">
                                {{ $todo->title }}
                                <span class="float-right">
                                    <a href="/todos/{{ $todo->id }}/delete" style="color: #dc3545;"><i
                                            class="fa-solid fa-trash"></i></a>
                                </span>
                                <span class="float-right mr-2">
                                    <a href="/todos/{{ $todo->id }}/edit" style="color: #28a745;"><i
                                            class="fa-solid fa-pen"></i></a>
                                </span>
                                <span class="float-right mr-2">
                                    <a href="/todos/{{ $todo->id }}" style="color: #117a8b;"><i
                                            class="fa-solid fa-eye"></i></a>
                                </span>
                                @if(!$todo->completed)
                                <span class="float-right mr-2">
                                    <a href="/todos/{{ $todo->id }}/completed" style="color: #ffc107;"><i class="fa-regular fa-circle-check"></i></a>
                                </span>
                                @endif
                            </li>
                        @empty
                            <p class="text-center">No Todos</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
