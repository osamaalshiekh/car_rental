<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Conversations\NormalConversation;
use App\Http\Conversations\TechnicalConversation;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Http\Request;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');



        // Handle yes response to start conversation
        $botman->hears('.*(yes).*', function ($botman, $matches) {
            $yes = strtolower($matches[1]); // This will capture 'yes' from the response
            if ($yes) {
                $botman->startConversation(new NormalConversation);
                // Further code to handle the reservation
            }
        });;
        $botman->hears('.*(no).*', function ( $botman,$matches) {
            $no = strtolower($matches[1]);
            if($no)
              $botman->startConversation(new TechnicalConversation);

        });


        $botman->hears('stop', function(BotMan $bot) {
            $bot->reply('stopped,
            Hello! this is Botman and i am here to help you if you want to have a normal conversation with me say yes!if you want a help with something regarding the website type no!');
        })->stopsConversation();

        $botman->hears('help', function(BotMan $bot) {
            $bot->reply('to quite the conversation you were having and go back to the menu please type "stop"');
        })->skipsConversation();


        $botman->listen();

    }



}
