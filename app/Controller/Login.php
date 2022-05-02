<?php
namespace App\Controller;

use App\Model\User;
use Base\AbstractController;

class Login extends AbstractController
{
    public function index()
    {
        if ($this->getUser()) {
            $this->redirect('/blog');
        }

        return $this->view->render(
            'login.twig',
            [
                'title' => 'Главная',
            ]
        );
    }

    public function auth()
    {
        $email = (string) $_POST['email'];
        $password = (string) $_POST['password'];
        $user = User::getByEmail($email);

        if (!$user) {
            return 'Неверный логин и пароль';
        }

        if ($user->password !== self::getPasswordHash($password)) {
            return 'Неверный логин и пароль';
        }

        $this->session->authUser($user->id);

        $this->redirect('/blog');
    }

    public function register()
    {
        $name = (string) $_POST['name'];
        $email = (string) $_POST['email'];
        $password = (string) $_POST['password'];
        $confirm = (string) $_POST['confirm'];

        if (!$name || !$password) {
            return 'Не заданы имя и пароль';
        }

        if (!$email) {
            return 'Не задан email';
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
            "password" => self::getPasswordHash($password),
            "isAdmin" => 0
        ]);
        $user->save();

        $this->session->authUser($user->id);
        $this->redirect('/blog');
    }

    public static function getPasswordHash(string $password)
    {
        return sha1('7sadf68as7df52oi3h4l2iu' . $password);
    }
}
