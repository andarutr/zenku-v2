<?php

namespace App\View\Components\Panel;

use App\Models\Chat;
use App\Models\User;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data['like_count'] = \DB::table('likes')
                                ->where('id_user', Auth::user()->id)
                                ->count();

        $data['comment_count'] = \DB::table('comments')
                                ->where('id_user', Auth::user()->id)
                                ->count();

        $data['user'] = User::where('id', Auth::user()->id)
                            ->join('roles','roles.id_role','=','users.id_role')
                            ->first();

        $data['chat_from_me'] = Chat::where('chats.id_user', Auth::user()->id)
                                    ->where('messages.id_user','!=', Auth::user()->id)
                                    ->orderBy('messages.created_at','desc')
                                    ->join('users','users.id','=','chats.linked_user')
                                    ->join('messages','messages.session_chat','=','chats.session_chat')
                                    ->select('users.name','users.picture','messages.*')
                                    ->limit(2)->get();
        $data['chat_from_other'] = Chat::where('chats.linked_user', Auth::user()->id)
                                        ->where('messages.id_user','!=', Auth::user()->id)
                                        ->join('users','users.id','=','chats.id_user')
                                        ->join('messages','messages.session_chat','=','chats.session_chat')
                                        ->orderBy('messages.created_at','desc')
                                        ->select('users.name','users.picture','messages.*')
                                        ->limit(2)->get();

        $data['count_chat'] = $data['chat_from_me']->count() + $data['chat_from_other']->count();

        return view('components.panel.navbar', $data);
    }
}
