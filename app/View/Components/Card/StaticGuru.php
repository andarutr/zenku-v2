<?php

namespace App\View\Components\Card;

use App\Models\Card;
use App\Models\User;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class StaticGuru extends Component
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
        $guru_count = User::where('id_role', 2)->count();
        $siswa_count = User::where('id_role', 3)->count();
        $penguji_count = User::where('id_role', 4)->count();
        $card_count = Card::where('id_user', Auth::user()->id)
                            ->count();

        return view('components.card.static-guru', compact('guru_count','siswa_count','penguji_count','card_count'));
    }
}
