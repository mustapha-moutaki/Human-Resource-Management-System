<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    // Display all notifications
    public function showAllNotifications()
    {
        $notifications = Auth::user()->notifications; // Retrieve all notifications for the logged-in user
        return view('notifications.index', compact('notifications'));
    }
}
