<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ApplicationApprovedNotification;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
    
        // Ensure the user is logged in
        if (!$user) {
            return redirect()->route('login');
        }
    
        // Get unread notifications for the logged-in user
        $notifications = $user->unreadNotifications; 
    
        // If user is an admin, fetch all notifications
        if ($user->hasRole(['super-admin', 'admin'])) {
            $notifications = $user->notifications; // Fetch all notifications for admins
        } else {
            // If the user is an alumni, filter notifications by their role
            $notifications = $user->notifications->filter(function ($notification) {
                return isset($notification->data['user_role']) && $notification->data['user_role'] == 'alumni';
            });
        }
    
        return view('notifications.index', compact('notifications'));
    }

    public function markAsRead($id)
    {
        $notification = auth()->user()->notifications()->find($id);

        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->back();
    }

    
    
}
