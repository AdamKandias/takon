<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        return view("user.notification", ["notifications" => Notification::where("user_id", Auth::user()->id)->paginate(10)]);
    }

    public function show(Notification $notification)
    {
        if (!$notification->is_read){
            $notification->is_read = 1;
        }
        
        $notification->save();
        return view("user.notification-show", ["notification" => $notification]);
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();
        return redirect()->route("notification")->with("status", "Notifikasi berhasil dihapus!");
    }
}
