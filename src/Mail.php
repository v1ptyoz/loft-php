<?php

namespace Base;

use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Mail
{
    private $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function send() {
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, "ssl"))
            ->setUsername('v1ptyoz.loft@gmail.com')
            ->setPassword('Gthtufh1');
        ;

        $mailer = new Swift_Mailer($transport);

        $message = (new Swift_Message("Письмо с сайта"))
            ->setFrom("site@site.com")
            ->setTo("v1ptyoz.loft@gmail.com")
            ->setBody($this->text);

        $mailer->send($message);
    }


}
