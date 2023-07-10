<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ChMessage as Message;
use App\Models\ChFavorite as Favorite;
use Illuminate\Support\Facades\Storage;
use Pusher\Pusher;
use Illuminate\Support\Facades\Auth;
use Exception;
use Chatify\ChatifyMessenger;

class Notifications extends Controller

{
    public $pusher;

    /**
     * Get max file's upload size in MB.
     *
     * @return int
     */

    /**
     * Count Unseen messages
     *
     * @param int $user_id
     * @return Collection
     */
    public function countUnseenMessages($user_id)
    {
        return Message::where('to_id', Auth::user()->id)->where('seen', 0)->count();
    }

    
}
