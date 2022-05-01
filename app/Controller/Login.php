<?php
namespace App\Controller;

use App\Model\User;
use Base\AbstractController;
use Illuminate\Database\QueryException;

class Login extends AbstractController
{
    public function index()
    {
//        if ($this->getUser()) {
//            $this->redirect('/blog');
//        }

        return $this->view->render(
            'login.twig',
            [
                'title' => 'Главная',
            ]
        );
    }

//    public function auth()
//    {
//        $email = (string) $_POST['email'];
//        $password = (string) $_POST['password'];
//        $user = User::getByEmail($email);
//        if (!$user) {
//            return 'Неверный логин и пароль';
//        }
//
//        if ($user->getPassword() !== User::getPasswordHash($password)) {
//            return 'Неверный логин и пароль';
//        }
//
//        $this->session->authUser($user->getId());
//
//        $this->redirect('/blog');
//    }

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

        if ($password !== $confirm) {
            return 'Введенные пароли не совпадают';
        }

        if (mb_strlen($password) <= 4) {
            return 'Пароль слишком короткий';
        }

        try {
            echo "start creating"."<br>";
            $user = new User([
                "name"=>$name,
                "email"=>$email,
                "password"=>self::getPasswordHash($password)
            ]);
        } catch (QueryException $e) {
            var_dump($e);
        }
        echo "created";
        $user->name = $name;
        $user->email = $email;
        $user->password = self::getPasswordHash($password);
        $user->save();

//        $this->session->authUser($user->id);
//        $this->redirect('/blog');
    }

    private static function getPasswordHash(string $password)
    {
        return sha1('7sadf68as7df52oi3h4l2iu' . $password);
    }
}
