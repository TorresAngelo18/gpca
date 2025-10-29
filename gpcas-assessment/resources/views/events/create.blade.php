<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
    <h1>Add Event</h1>

    <form method="POST" action="{{ route('events.store') }}">
        @csrf
        <input type="text" name="name" value="{{ old('name') }}" placeholder="Event Name">
        @error('name') <div style="color:red">{{ $message }}</div> @enderror
        <button type="submit">Save Event</button>
        <a href="{{ route('events.index') }}" class="btn btn-secondary">Back to Events</a>

    </form>
    @endsection

</body>

</html>