@extends('layouts.app')

@section('title', 'Edit Speaker')

@section('content')
<h1>Edit Speaker</h1>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('speakers.update', $speaker->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Speaker Name</label>
    <input type="text" name="name" id="name" value="{{ old('name', $speaker->name) }}" required>

    <button type="submit" class="btn btn-add">Update Speaker</button>
</form>
@endsection