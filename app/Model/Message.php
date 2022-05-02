<?php
namespace App\Model;

use App\Model\User;
use Illuminate\Database\Eloquent\Model;


class Message extends Model
{
    protected $table = "messages";
    protected $fillable = ["text", "user_id", "image"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getList(int $limit = 20): array
    {
        $data = Message::all()->sortByDesc("created_at");
        if (sizeof($data) == 0) {
            return [];
        }

        $messages = [];
        foreach ($data as $elem) {
            array_push($messages, [
                "id" => $elem->id,
                "user_id" => $elem->user_id,
                "user" => $elem->user()->first(),
                "text" => $elem->text,
                "image" => $elem->image,
                "created_at" => $elem->created_at
            ]);
        }
        return $messages;
    }
}
