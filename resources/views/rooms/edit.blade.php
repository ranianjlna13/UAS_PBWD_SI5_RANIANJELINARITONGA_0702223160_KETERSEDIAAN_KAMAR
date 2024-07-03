<!DOCTYPE html>
<html>
<head>
    <title>Edit Room</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Edit Room</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('rooms.update', $room) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="room_number">Room Number</label>
            <input type="text" name="room_number" id="room_number" class="form-control" value="{{ old('room_number', $room->room_number) }}" required>
            @error('room_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="level_id">Level</label>
            <select name="level_id" id="level_id" class="form-control" required>
                @foreach($levels as $level)
                    <option value="{{ $level->id }}" {{ $room->level_id == $level->id ? 'selected' : '' }}>{{ $level->name }}</option>
                @endforeach
            </select>
            @error('level_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>