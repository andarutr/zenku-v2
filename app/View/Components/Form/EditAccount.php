<?php

namespace App\View\Components\Form;

use App\Models\Provinsi;
use App\Models\Views\VUser;
use Illuminate\View\Component;
use App\Models\KotaAdministrasi;

class EditAccount extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data['provinsi'] = Provinsi::all();
        $data['kota_administrasi'] = KotaAdministrasi::all();
        $data['user'] = VUser::where('id', $this->id)->first();

        return view('components.form.edit-account', $data);
    }
}
