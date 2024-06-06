<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{

    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];
    public function render()
    {
        return view('livewire.login');
    }


    public function logar()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect('dash');
        } else {
            $this->addError('auth','Email ou senha incorretos ');
        }
    }
}
