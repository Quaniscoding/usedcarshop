<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('Reset Password')]
class ResetPasswordPage extends Component
{
    use LivewireAlert;
    public $token;
    #[Url]
    public $email;
    public $password;
    public $password_confirmation;

    public function mount($token)
    {
        $this->token = $token;
    }
    public function save()
    {
        $this->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = Password::reset([
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
            'token' => $this->token
        ], function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password),
            ])->setRememberToken(Str::random(60));
            $user->save();

            event(new PasswordReset($user));
        });

        if ($status === Password::PASSWORD_RESET) {
            $this->alert('success', 'Your password has been reset successfully!', [
                'position' => 'top',
                'timer' => 3000,
                'toast' => true
            ]);

            return redirect('/login');
        } else {
            $this->alert('error', 'Failed to reset password. Please try again!', [
                'position' => 'top',
                'timer' => 3000,
                'toast' => true
            ]);
        }
    }

    public function render()
    {
        return view('livewire.auth.reset-password-page');
    }
}
