<?php

namespace App\Webhooks;

use App\Models\Ride;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;

class ChatWebhook extends WebhookHandler
{
    public function start()
    {
        $this->chat->message('Доступные опции')->keyboard(function (Keyboard $keyboard) {
            return $keyboard
                ->button('🚗Показать всю доступную технику')->action('index')
                ->button('🔎Поиск по дате поездки')->action('indexByDate')
                ->button('📞Связаться с нами')->action('feedback');
        })->send();
    }

    public function feedback()
    {
        $this->chat->message('Доступные опции')->send();
    }

    public function index()
    {
        $rides = Ride::all();

        $ridesCount = $rides->count();
        $availableRidesNames = $rides->pluck('name', 'id');
        $buttons = [];

        foreach ($availableRidesNames as $availableVehicleId => $availableVehicleName) {
            $button = Button::make($availableVehicleName)->action('showCar')->param('id', $availableVehicleId);
            array_push($buttons, $button);
        }

        $this->chat
            ->message("Количество доступной поездок: ${$ridesCount}")
            ->photo('https://i.imgur.com/PBsgmfv.jpeg')
            ->keyboard(Keyboard::make()->buttons($buttons))
            ->send();
    }

    public function dismiss()
    {

        $newKeyboard = $this->originalKeyboard
            ->deleteButton('Dismiss');

        $this->replaceKeyboard($newKeyboard);
    }


}
