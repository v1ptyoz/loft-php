<?php
namespace App\Controller;

use App\Model\Message;
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
        if ($messages) {
            $userIds = array_map(function (Message $message) {
                return $message->getUserId();
            }, $messages);
            $users = \App\Model\User::getByIds($userIds);
            array_walk($messages, function (Message $message) use ($users) {
                if (isset($users[$message->getUserId()])) {
                    $message->setUser($users[$message->getUserId()]);
                }
            });
        }
        return $this->view->render('blog.phtml', [
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
            'created_at' => date('Y-m-d H:i:s')
        ]);

        if (isset($_FILES['image']['tmp_name'])) {
            $manager = new ImageManager(['driver' => 'gd']);

            $image = $manager->make($_FILES['image']['tmp_name'])
                ->resize(200, null, function ($image) {
                    $image->aspectRatio();
                })
                ->text("LOFTSCHOOL", 50, 50, function($font) {
                    $font->color('#FFFFFF');
                })
                ->save();
            $message->loadFile($_FILES['image']['tmp_name']);
        }

        $message->save();

        $user = $this->getUser()->getName();
        $mail_message = "Пользователь $user добавил новое сообщение";
        $mail = new Mail($mail_message);
        $mail->send();

        $this->redirect('/blog');
    }

    private function error()
    {

    }
}
