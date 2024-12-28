<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Register')]
class RegisterPage extends Component
{
    use LivewireAlert;

    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $role = 'user';
    public $showPassword = false;
    public $show_password_confirmation = false;

    protected $rules = [
        'name' => 'required|min:1|max:255',
        'email' => 'required|email|unique:users|max:255',
        'password' => 'required|min:6|confirmed',
    ];

    public function save()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'avatar' => '',
            'role' => $this->role,
        ]);

        $this->alert('success', 'Registered successfully! Logging you in...', [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
        ]);

        auth()->login($user);
        return redirect()->intended();
    }

    public function togglePasswordVisibility()
    {
        $this->showPassword = !$this->showPassword;
    }

    public function togglePasswordConfirmationVisibility()
    {
        $this->show_password_confirmation = !$this->show_password_confirmation;
    }

    public function render()
    {
        return view('livewire.auth.register-page');
    }
}