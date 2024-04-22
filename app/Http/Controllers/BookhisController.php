<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class BookhisController extends Controller
{
    public function booking_history(Request $request){

        if ($request->session()->has('customer_id')) {
            $customerId = $request->session()->get('customer_id');

            $customerBookings = Booking::where('customer_id', $customerId)->get();

            return view('Profile.booking_history', ['customerBookings' => $customerBookings]);
        } else {
            return redirect()->back()->with('error', 'Please log in to view your booking history.');
        }

    }

    // public function cancelBooking($id)
    // {
    //     $booking = Booking::findOrFail($id);
    //     $booking->delete(); 

    //     return redirect()->back()->with('success', 'Booking canceled successfully');
    // }
    
}
