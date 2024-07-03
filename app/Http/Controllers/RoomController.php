<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Level;
use Illuminate\Http\Request;

class RoomController extends Controller
{
  public function index()
  {
    $rooms = Room::all();
    return view('rooms.index', compact('rooms'));
  }
  public function create()
  {
    $levels = Level::all();
    return view('rooms.create', compact('levels'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'room_number' => 'required|string|max:255|unique:rooms,room_number',
      'level_id' => 'required|exists:levels,id',
      // tambahkan validasi lain sesuai kebutuhan
    ]);

    Room::create($request->all());

    return redirect()->route('rooms.create')->with('success', 'Room added successfully.');
  }
}