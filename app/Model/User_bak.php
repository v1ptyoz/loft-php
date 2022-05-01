<?php
namespace App\Model;

use Base\Db;



//class User
//{
//    private int $id;
//    private string $email;
//    private string $name;
//    private string $createdAt;
//    private string $password;
//    private int $isAdmin;
//
//    public function __construct(array $data)
//    {
//        $this->name = $data['name'];
//        $this->email = $data['email'];
//        $this->password = $data['password'];;
//        $this->createdAt = $data['created_at'];
//        $this->isAdmin = $data['isAdmin'] ?? 0;
//    }
//
//    public static function getByEmail(string $email)
//    {
//        $db = Db::getInstance();
//        $data = $db->fetchOne(
//            "SELECT * fROM users WHERE email = :email",
//            __METHOD__,
//            [':email' => $email]
//        );
//        if (!$data) {
//            return null;
//        }
//
//        $user = new self($data);
//        $user->id = $data['id'];
//        return $user;
//    }
//
//    public static function getByIds(array $userIds)
//    {
//        $db = Db::getInstance();
//        $idsString = implode(',', $userIds);
//        $data = $db->fetchAll(
//            "SELECT * fROM users WHERE id IN($idsString)",
//            __METHOD__
//        );
//        if (!$data) {
//            return [];
//        }
//
//        $users = [];
//        foreach ($data as $elem) {
//            $user = new self($elem);
//            $user->id = $elem['id'];
//            $users[$user->id] = $user;
//        }
//
//        return $users;
//    }
//
//    public function save()
//    {
//        $db = Db::getInstance();
//        $res = $db->exec(
//            'INSERT INTO users (
//                    name,
//                    password,
//                    email,
//                    created_at
//                    ) VALUES (
//                    :name,
//                    :password,
//                    :email,
//                    :created_at
//                )',
//            __METHOD__,
//            [
//                ':name' => $this->name,
//                ':email' => $this->email,
//                ':password' => self::getPasswordHash($this->password),
//                ':created_at' => $this->createdAt,
//            ]
//        );
//
//        $this->id = $db->lastInsertId();
//
//        return $res;
//    }
//
//    public static function getById(int $id): ?self
//    {
//        $db = Db::getInstance();
//        $data = $db->fetchOne("SELECT * fROM users WHERE id = :id", __METHOD__, [':id' => $id]);
//        if (!$data) {
//            return null;
//        }
//
//        $user = new self($data);
//        $user->id = $id;
//        return $user;
//    }
//
//
//    public static function getList(int $limit = 20, int $offset = 0): array
//    {
//        $db = Db::getInstance();
//        $data = $db->fetchAll(
//            "SELECT * fROM users LIMIT $limit OFFSET $offset",
//            __METHOD__
//        );
//        if (!$data) {
//            return [];
//        }
//
//        $users = [];
//        foreach ($data as $elem) {
//            $user = new self($elem);
//            $user->id = $elem['id'];
//            $users[] = $user;
//        }
//
//        return $users;
//    }
//
//    public static function getPasswordHash(string $password)
//    {
//        return sha1('7sadf68as7df52oi3h4l2iu' . $password);
//    }
//
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
//    public function getName(): string
//    {
//        return $this->name;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getPassword()
//    {
//        return $this->password;
//    }
//
//    /**
//     * @return mixed|string
//     */
//    public function getEmail(): mixed
//    {
//        return $this->email;
//    }
//
//    /**
//     * @param mixed|string $email
//     */
//    public function setEmail(mixed $email): void
//    {
//        $this->email = $email;
//    }
//
//    /**
//     * @return mixed|string
//     */
//    public function getCreatedAt(): mixed
//    {
//        return $this->createdAt;
//    }
//
//    /**
//     * @param mixed|string $createdAt
//     */
//    public function setCreatedAt(mixed $createdAt): void
//    {
//        $this->createdAt = $createdAt;
//    }
//
//    /**
//     * @return int
//     */
//    public function IsAdmin(): int
//    {
//        return $this->isAdmin;
//    }
//
//    /**
//     * @param int $isAdmin
//     */
//    public function setIsAdmin(int $isAdmin): void
//    {
//        $this->isAdmin = $isAdmin;
//    }
//}
