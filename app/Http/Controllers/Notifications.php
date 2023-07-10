<?php

namespace App\Http\Controllers;
use App\Models\ChMessage as Message;
use Illuminate\Support\Facades\Auth;

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
     * @return array
     */
    public function countUnseenMessages($user_id)
    {
        return Message::where('to_id', $user_id)->where('seen', 0)->count();
    }

    
}
