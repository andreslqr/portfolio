<?php

namespace App\Livewire\Web;

use App\Mail\ContactMessage;
use App\Settings\CVSettings;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Contact extends Component
{

    #[Validate('required|string|max:255|email:rfc,dns')]
    public $email;

    #[Validate('required|string|max:255')]
    public $name;

    #[Validate('required|string|max:1020')]
    public $message;

    public function render()
    {
        return view('web::livewire.contact');
    }

    public function startChat(): array
    {
        return [
            __('Hello! my name is Andres Lopez'),
            __('Are you interested about what i do?'),
            __("Let's connect, what is your name?")
        ];
    }

    public function getEmailChat(): array
    {
        return [
            __('Thanks :name!', [
                'name' => ucfirst($this->name)
            ]),
            __('Can you share me your email?')
        ];
    }
    
    public function getMessageChat(): array
    {
        return [
            __('Thanks!'),
            __('Last step, i promise :)'),
            __('Why are you interested about me?')
        ];
    }

    public function getGoodbyeChat(): array
    {
        return [
            __('Thanks!'),
            __('i just getted your message, you will get an email from me soon'),
            __('See you later :D')
        ];
    }

    public function checkValidationFor($attribute)
    {
        try {
            $this->validateOnly($attribute);
        }
        catch (ValidationException $e) {
            return $e->getMessage();
        }
    }

    public function sendContactEmail(CVSettings $settings)
    {
        $this->validate();

        Mail::to($settings->emailContact)
            ->send(new ContactMessage($this->email, $this->name, $this->message));
    }
}
