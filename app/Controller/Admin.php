<?php
namespace App\Controller;

use App\Model\Message;
use App\Model\User;
use App\Controller\Login;
use Base\AbstractController;

class Admin extends AbstractController
{

    public function preDispatch()
    {
        parent::preDispatch();
        if(!$this->getUser() || !$this->getUser()->isAdmin) {
            $this->redirect('/');
        }
    }

    public function index()
    {
        $users = User::all()->toArray();

        return $this->view->render('admin.twig', [
            "title" => "Админко",
            "users" => $users
        ]);
    }

    public function deleteMessage()
    {
        $messageId = (int) $_GET['id'];
        Message::find($messageId)->delete();
        $this->redirect('/blog');
    }

    public function updateUser() {
        $userId = (int) $_GET['id'];
        $name = (string) $_POST['name'];
        $email = (string) $_POST['email'];
        $password = (string) $_POST['password'];
        $confirm = (string) $_POST['confirm'];
        $isAdmin = $_POST['isAdmin'] == "on" ? 1 : 0;
        $changed = false;

        $user = User::find($userId);

        if (!$name) {
            return 'Не задано имя';
        }

        if (!$email) {
            return 'Не задан email';
        }

        if ($user->name != $name) {
            $user->name = $name;
            $changed = true;
        }

        if ($user->email != $email) {
            if (User::where('email', $email)->first()) {
                return "Пользователь с таким Email уже есть в системе";
            } else {
                $user->email = $email;
                $changed = true;
            }
        }

        if ($user->isAdmin != $isAdmin) {
            $user->isAdmin = $isAdmin;
            $changed = true;
        }

        if (!empty($password)) {
            if ($password !== $confirm) {
                return 'Введенные пароли не совпадают';
            }

            if (mb_strlen($password) <= 4) {
                return 'Пароль слишком короткий';
            }
            $user->password = Login::getPasswordHash($password);
            $changed = true;
        }

        if ($changed) {
            $user->save();
        }

        $this->redirect("/admin");

    }

    public function createUser() {
        $name = (string) $_POST['name'];
        $email = (string) $_POST['email'];
        $password = (string) $_POST['password'];
        $confirm = (string) $_POST['confirm'];
        $isAdmin = $_POST['isAdmin'] == "on" ? 1 : 0;

        if (!$name) {
            return 'Не задано имя';
        }

        if (!$email) {
            return 'Не задан email';
        }

        if (!$password) {
            return "Не задан пароль";
        }

        if (User::where('email', $email)->first()) {
            return "Пользователь с таким Email уже зарегистрирован";
        }

        if ($password !== $confirm) {
            return 'Введенные пароли не совпадают';
        }

        if (mb_strlen($password) <= 4) {
            return 'Пароль слишком короткий';
        }

        $user = new User([
            "name" => $name,
            "email" => $email,
            "password" => Login::getPasswordHash($password),
            "isAdmin" => $isAdmin
        ]);

        $user->save();

        $this->redirect("/admin");
    }

}
