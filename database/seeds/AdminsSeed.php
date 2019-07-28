<?php

use Illuminate\Database\Seeder;

class AdminsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * $table->bigIncrements('id');
    $table->string('image')->nullable();
    $table->string('name');
    $table->string('email')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->timestamps();
     */
    public function run()
    {
        $admin = new \App\Admin();
        $admin->name="admin";
        $admin->email="admin@admin.com";
        $admin->password=bcrypt("admin123456");
        $admin->id=1;
        $admin->save();
    }
}
