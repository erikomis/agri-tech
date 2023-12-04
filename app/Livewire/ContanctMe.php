<?php

namespace App\Livewire;

use Livewire\Component;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ContanctMe extends Component
{
    use LivewireAlert;

    public $name;
    public $email;
    public $phone;
    public $message;



    public function submit()
    {
        $this->validate(
            [
                'name' => 'required|min:6',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'message' => 'required|min:10',
            ],

            [
                'name.required' => 'O campo nome é obrigatório.',
                'name.min' => 'O campo nome deve ter pelo menos :min caracteres.',
                'email.required' => 'O campo e-mail é obrigatório.',
                'email.email' => 'O campo e-mail deve ser um endereço de e-mail válido.',
                'phone.required' => 'O campo telefone é obrigatório.',
                'phone.numeric' => 'O campo telefone deve ser um número.',
                'message.required' => 'O campo mensagem é obrigatório.',
                'message.min' => 'O campo mensagem deve ter pelo menos :min caracteres.',
            ]
        );

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'message' => $this->message,
        ];

        // dd($data);
        Mail::to('martinskassilas@gmail.com')->send(new ContactMail($data));

        // Retornar resposta
        $this->reset();
        $this->alert('success', 'Mensagem enviada com sucesso!');
    }


    public function render()
    {
        return view('livewire.contanct-me');
    }
}
