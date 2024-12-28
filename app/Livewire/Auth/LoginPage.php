<?php

namespace App\Livewire\Auth;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Login')]
class LoginPage extends Component
{
    use LivewireAlert;
    public $email;
    public $password;
    public $showPassword;
    public function save()
    {
        $this->validate([
            'email' => 'required|email|max:255|exists:users,email',
            'password' => 'required|min:6|max:255',
        ]);
        if (!auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->flash('error', 'Invalid email or password!');
            $this->alert('error', 'Invalid credential!', [
                'position' => 'top',
                'timer' => 3000,
                'toast' => true
            ]);
            return;
        }
        $this->alert('success', 'Login successfully!', [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true
        ]);
        return redirect()->intended();
    }
    public function togglePasswordVisibility()
    {
        $this->showPassword = !$this->showPassword;
    }
    public function render()
    {
        return view('livewire.auth.login-page');
    }
}
