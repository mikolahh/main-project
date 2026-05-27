<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\CallbackMessage;
use App\Tgbot\MyBotApi;
// use Illuminate\Support\Facades\Mail;
// use App\Mail\CallbackMessageMail;

class Callback extends Component
{
    #[Validate('required|min:2|max:30')]
    public $name = '';

    #[Validate(('required|regex:/^\+375\d{9}$/'))]
    public $phone = '+375';

    #[Validate('max:300')]
    public $text = '';

    public $res;

    public function submit()
    {
        $valid = $this->validate();        
        CallbackMessage::create($valid);
        // 👉 это старый Laravel-подход (с перезагрузкой)
        // session()->flash('success', 'Данные получены, в ближайшее время с вами свяжутся.'); 
        // Делаем через события
        $this->dispatch('event-flow', domain: 'callback', type: 'success');   
        $bot_token = env('BOT_TOKEN');
        $bot = new MyBotApi($bot_token); 
        $chat_id = env('OWNER_TG_ID');        
        $message = "Поступило сообщение от {$this->name}(tel: {$this->phone}):\n{$this->text}";        
        $query_data = [];
        $query_data['chat_id'] = $chat_id;
        $query_data['text'] =  $message;      
        $bot->sendMessage($query_data);
        $this->reset();
        
        // Отправка email уведомления владельцу
        // $adminEmail = env('OWNER_EMAIL');
        // Mail::to($adminEmail)->send(new CallbackMessageMail($data));
    }      

    // public function resetForm()
    // {
    //     $this->reset();
    //     $this->resetValidation();
    //     $this->resetErrorBag();
    // }

    public function render()
    {
        return view('livewire.forms.callback');
    }
}
