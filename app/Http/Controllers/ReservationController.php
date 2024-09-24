<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Reservation;

use App\Http\Requests\ReservationValidation;
use App\Http\Requests\RoomSearchValidation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
	public function index() {
        $reservations = Reservation::where('user_id', auth()->id())->with('rooms')->get();
        return view('user.reservation.index', compact('reservations'));
    }
    
    public function create(Request $request) {
        $roomIds = $request->input('room_ids');
        $checkIn = $request->input('checkIn');
        $checkOut = $request->input('checkOut');
        
        return view('user.reservation.create', compact('roomIds', 'checkIn', 'checkOut'));
    }
    
    public function roomSearch() {
        return view('user.reservation.room-search');
    }
    
    public function showAvailableRooms(RoomSearchValidation $request) {
        $validatedData = $request->validated();
        $checkIn = $validatedData['check_in'];
    	$checkOut = $validatedData['check_out'];

        $availableRooms = Room::whereNotIn('id', function ($query) use ($checkIn, $checkOut) {
	        $query->select('room_id')
	            ->from('reservation_room')
	            ->join('reservations', 'reservations.id', '=', 'reservation_room.reservation_id')
	            ->where(function ($q) use ($checkIn, $checkOut) {
	                $q->whereBetween('check_in', [$checkIn, $checkOut])
	                  ->orWhereBetween('check_out', [$checkIn, $checkOut])
	                  ->orWhere(function ($q2) use ($checkIn, $checkOut) {
	                      $q2->where('check_in', '<', $checkIn)
	                         ->where('check_out', '>', $checkOut);
	                  });
	            });
	    })->get();
        
        return view('user.reservation.available-rooms', compact('availableRooms', 'checkIn', 'checkOut'));
    }

    public function store(ReservationValidation $request) {
        $validatedData = $request->validated();
        
        $totalPrice = 0;
        foreach ($validatedData['room_ids'] as $roomId) {
            $room = Room::findOrFail($roomId);
            $totalPrice += $room->price;
        }

        $reservation = Reservation::create([
            'total_price' => $totalPrice,
            'name' => auth()->check() ? auth()->user()->name : $validatedData['name'],
            'email' => auth()->check() ? auth()->user()->email : $validatedData['email'],
            'phone_number' => $validatedData['phone_number'],
            'check_in' => $validatedData['check_in'],
            'check_out' => $validatedData['check_out'],
            'user_id' => auth()->check() ? auth()->id() : null,
        ]);
        
        $reservation->rooms()->attach($validatedData['room_ids']);
        
        return redirect()->route('reservations.index')->with('success', 'Бронь создана успешно.');
    }

    public function destroy(Reservation $reservation) {
        $reservation->delete();
		
        return redirect()->route('reservations.index')->with('success', 'Бронь удалена успешно.');
    }
}
