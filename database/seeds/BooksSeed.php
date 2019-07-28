<?php

use Illuminate\Database\Seeder;

class BooksSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * $table->bigIncrements('id');
     */

    public function run()
    {
        for($i=0 ; $i<10 ; $i++){
            $book = new \App\Book();
            $book->name="name$i";
            $book->description="desc$i";
            $book->price=5.50;
            $book->quantity=10;
            $book->category_id=1;
            $book->admin_id=1;
            $book->save();
        }
    }
}
