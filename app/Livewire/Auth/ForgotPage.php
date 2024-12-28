<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Forgot Password')]
class ForgotPage extends Component
{
    use LivewireAlert;
    public $email;
    public function save()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email|max:255',
        ]);

        try {
            $status = Password::sendResetLink(['email' => $this->email]);

            if ($status === Password::RESET_LINK_SENT) {
                session()->flash('success', __('A password reset link has been sent to your email address.'));
                $this->alert('success', __('Password reset link sent to your email!'), [
                    'position' => 'top',
                    'timer' => 3000,
                    'toast' => true
                ]);
                $this->email = '';
            } else {
                $this->alert('error', __('Unable to send reset link, please try again later.'), [
                    'position' => 'top',
                    'timer' => 3000,
                    'toast' => true
                ]);
            }
        } catch (\Exception $e) {
            $this->alert('error', __('An error occurred: ') . $e->getMessage(), [
                'position' => 'top',
                'timer' => 3000,
                'toast' => true
            ]);
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot-page');
    }
}
