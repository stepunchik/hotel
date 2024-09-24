<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationRequestsController extends Controller
{
    public function index() {
		$reservations = Reservation::orderBy('created_at', 'desc')->paginate(5);
		
		return view('admin.reservation-requests.index', compact('reservations'));
    }

    public function confirm(Reservation $reservation) {
    	$reservation['confirmed'] = true;

    	$reservation->update();

    	return redirect()->route('admin.reservation-requests.index')->with('success', 'Бронь подтверждена успешно.');
    }

    public function destroy(Reservation $reservation_request) {
        $reservation_request->delete();
		
        return redirect()->route('admin.reservation-requests.index')->with('success', 'Бронь удалена успешно.');
    }
}
