<?php
namespace App\Model;

require_once '../../src/Db.php';

use App\Model\User;
use Illuminate\Database\Eloquent\Model;


class Message extends Model
{
    protected $table = "messages";
    protected $primaryKey = "id";

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
//    private int $id;
//    private string $text;
//    private string $createdAt;
//    private int $user_id;
//    private User $user;
//    private string $image;
//
//    public function __construct(array $data)
//    {
//        $this->text = $data['text'];
//        $this->createdAt = $data['created_at'];
//        $this->user_id = $data['user_id'];
//        $this->image = $data['image'] ?? '';
//    }

//    public static function deleteMessage(int $messageId)
//    {
//        $db = Db::getInstance();
//        $query = "DELETE FROM messages WHERE id = $messageId";
//        return $db->exec($query, __METHOD__);
//    }

//    public function save()
//    {
//        $db = Db::getInstance();
//        $res = $db->exec(
//            'INSERT INTO messages (
//                    text,
//                    created_at,
//                    user_id,
//                    image
//                    ) VALUES (
//                    :text,
//                    :created_at,
//                    :user_id,
//                    :image
//                )',
//            __FILE__,
//            [
//                ':text' => $this->text,
//                ':created_at' => $this->createdAt,
//                ':user_id' => $this->user_id,
//                ':image' => $this->image,
//            ]
//        );
//
//        return $res;
//    }

//    public static function getList(int $limit = 20): array
//    {
//        $db = Db::getInstance();
//        $data = $db->fetchAll(
//            "SELECT * fROM messages ORDER BY created_at DESC LIMIT $limit",
//            __METHOD__
//        );
//        if (!$data) {
//            return [];
//        }
//        $messages = [];
//        foreach ($data as $elem) {
//            $message = new self($elem);
//            $message->id = $elem['id'];
//            $messages[] = $message;
//        }
//
//        return $messages;
//    }

//    public static function getUserMessages(int $userId): array
//    {
//        $db = Db::getInstance();
//        $data = $db->fetchAll(
//            "SELECT * fROM messages WHERE user_id = $userId",
//            __METHOD__
//        );
//        if (!$data) {
//            return [];
//        }
//
//        $messages = [];
//        foreach ($data as $elem) {
//            $message = new self($elem);
//            $message->id = $elem['id'];
//            $messages[] = $message;
//        }
//
//        return $messages;
//    }

//    /**
//     * @return mixed
//     */
//    public function getId()
//    {
//        return $this->id;
//    }
//
//    /**
//     * @return string
//     */
//    public function getText(): string
//    {
//        return $this->text;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getCreatedAt()
//    {
//        return $this->createdAt;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getUserId()
//    {
//        return $this->user_id;
//    }
//
//    /**
//     * @return User
//     */
//    public function getUser(): User
//    {
//        return $this->user;
//    }
//
//    /**
//     * @param User $author
//     */
//    public function setUser(User $user): void
//    {
//        $this->user = $user;
//    }
//
//    public function loadFile(string $file)
//    {
//        if (file_exists($file)) {
//            $this->image = $this->genFileName();
//            move_uploaded_file($file, getcwd() . '/images/' . $this->image);
//        }
//    }
//
//    private function genFileName()
//    {
//        return sha1(microtime(1) . mt_rand(1, 100000000)) . '.jpg';
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getImage()
//    {
//        return $this->image;
//    }
//
//    public function getData()
//    {
//        return [
//            'id' => $this->id,
//            'user_id' => $this->user_id,
//            'text' => $this->text,
//            'created_at' => $this->createdAt,
//            'image' => $this->image
//        ];
//    }
//}
