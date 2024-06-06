<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Component
{
    public $nome;
    public $email;
    public $password;


    protected $rules = [
        'nome' => 'required|min:3',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
    ];

    public function cadastro()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->nome,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);

        return redirect()->intended('dash');
    }


    public function render()
    {
        return view('livewire.create-user');
    }
}
