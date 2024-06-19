<?php

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;

class TechnicalConversation extends Conversation
{
    public function Helper(){
        $this->ask('I can offer help with various things! specify the field you need help with! note: if you want to go back to the menu just type stop!,what do you need help with?', function(Answer $answer) {
            // Convert the answer to lowercase and check if 'yes' is in the response
            $response = strtolower($answer->getText());
            if (strpos($response, 'reser') !== false) {
                $this->ReservationHelper();

            } elseif (strpos($response, 'contact') !== false){
                $this->ContactHelper();
            }else{
                return $this->repeat('i do not know or did not understand what you said please clarify your needs!');
            }
        });


    }
    public function ReservationHelper(){
        $this->say('To make a reservation it is so simple! just pick the car you like and follow the instructions in the same page!');
        $this->ask('Is there anything else i can help with regarding reservations? yes\no',function (Answer $answer){
            $response = strtolower($answer->getText());
            if (strpos($response, 'see') !== false || strpos($response, 'look') !== false && strpos($response, 'reser') !== false) {
                $this->say('To see your reserved vehicle just go to "My panel" which is located on top right of the page and then to my orders section!');
                return $this->repeat();

            } elseif (strpos($response, 'yes') !== false) {
                $this->Helper();

            } elseif (strpos($response, 'no') !== false){
                $this->say('Always happy to help!');
                $this->say(' Hello! this is Botman and i am here to help you if you want to have a normal conversation with me say yes!if you want a help with something regarding the website type no!');

            }

        });

    }

    public function ContactHelper(){
        $this->say('Sure you can contact us via email in the contact page you can ask anything and the answer will be sent to your email shortly!');
        $this->ask('Is there anything else i can help with? yes\no',function (Answer $answer){
            $response = strtolower($answer->getText());
            if (strpos($response, 'yes') !== false) {
                $this->ReservationHelper();

            } elseif (strpos($response, 'no') !== false){
                $this->say('Always happy to help!');
                $this->say(' Hello! this is Botman and i am here to help you if you want to have a normal conversation with me say yes!if you want a help with something regarding the website type no!');

            }

        });

    }

    /**
     * @inheritDoc
     */
    public function run()
    {

        $this->Helper();
    }
}
