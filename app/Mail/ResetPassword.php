<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    private $password;

    public function __construct($password)
    {
        $this->password = $password;
    }

    public function build()
    {
        $password = $this->password;
        $pathLogo = asset('images/firma.png');
        return $this->from('sistemas.faboce@gmail.com', 'Faboce S.R.L.')
            ->view('auth.resetpassword', compact('password', 'pathLogo'));
    }
}
