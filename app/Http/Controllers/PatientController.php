<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Level;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function edit(Room $room)
    {
        $levels = Level::all();
        return view('rooms.edit', compact('room', 'levels'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_number' => 'required|string|max:255',
            'level_id' => 'required|exists:levels,id',
        ]);

        $room->update($request->all());

        return redirect()->route('rooms.edit', $room)->with('success', 'Room updated successfully.');
    }
}