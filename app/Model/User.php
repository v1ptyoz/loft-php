<?php
namespace App\Model;

use App\Model\Message as Message;
use Illuminate\Database\Eloquent\Model;

class User extends Model {
    public $table = "users";
    protected $fillable = ["name", "email", "password", "isAdmin"];

    public function messages() {
        return $this->hasMany(Message::class);
    }

    public static function getByIds(array $userIds)
    {
        $users = [];
        foreach ($userIds as $userId) {
            $users[$userId] = User::find($userId);
        }

        return $users;
    }

    public static function getByEmail(string $email)
    {
        return User::where("email", $email)->first();
    }
}
