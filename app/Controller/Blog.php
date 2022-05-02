<?php
namespace App\Controller;

use App\Model\Message;
use App\Model\User;
use Base\AbstractController;
use Base\Mail;
use Intervention\Image\ImageManager;

class Blog extends AbstractController
{
    public function index()
    {
        if (!$this->getUser()) {
            $this->redirect('/login');
        }

        $messages = Message::getList();

        return $this->view->render('blog.twig', [
            'title' => "Список сообщений: ",
            'messages' => $messages,
            'user' => $this->getUser()
        ]);
    }

    public function addMessage()
    {
        if (!$this->getUser()) {
            $this->redirect('/login');
        }

        $text = (string) $_POST['text'];
        if (!$text) {
            $this->error('Сообщение не может быть пустым');
        }

        $message = new Message([
            'text' => $text,
            'user_id' => $this->getUserId(),
        ]);


        if (strlen($_FILES['image']['tmp_name']) > 0) {
            $manager = new ImageManager(['driver' => 'gd']);

            $image = $manager->make($_FILES['image']['tmp_name'])
                ->resize(200, null, function ($image) {
                    $image->aspectRatio();
                })
                ->text("LOFTSCHOOL", 50, 50, function($font) {
                    $font->color('#FFFFFF');
                })
                ->save();


            $message->image = self::loadFile($_FILES['image']['tmp_name']);
        }

        $message->save();

        $user = $this->getUser()->name;
        $mail_message = "Пользователь $user добавил новое сообщение";
        $mail = new Mail($mail_message);
        $mail->send();

        $this->redirect('/blog');
    }

    private function error()
    {

    }

    private static function genFileName()
    {
        return sha1(microtime(1) . mt_rand(1, 100000000)) . '.jpg';
    }

    public static function loadFile(string $file)
    {
        $image_name = self::genFileName();
        move_uploaded_file($file, getcwd() . '/images/' . $image_name);
        return $image_name;
    }
}
