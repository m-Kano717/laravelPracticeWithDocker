<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("pass");
            $table->string("nick_name");
            $table->string("address1");
            $table->string("address2");
            $table->string("address3");
            $table->string("address4");
            $table->date("birth_date");
            $table->string("tel");
            $table->string("mail");
            $table->string("user_type");
            $table->integer("delete_flag")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
