<?php

require_once "./Db.php";

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->dropIfExists("users");
Capsule::schema()->create("users", function (Blueprint $table) {
    $table->increments("id");
    $table->string("name");
    $table->string("email")->unique();
    $table->string("password");
    $table->tinyInteger("isAdmin")->default(0);
    $table->timestamps();
});

Capsule::schema()->dropIfExists("messages");
Capsule::schema()->create("messages", function (Blueprint $table) {
    $table->increments("id");
    $table->integer("user_id")->unsigned();
    $table->text("text");
    $table->string("image")->nullable();
    $table->timestamps();
});

