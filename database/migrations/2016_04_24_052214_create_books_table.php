<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users') &&
            Schema::hasTable('authors') &&
            Schema::hasTable('genres')
        ) {
            Schema::create('books', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('title');
                $table->longText('description');
                $table->date('release_date');
                $table->bigInteger('created_by')->unsigned();
                $table->foreign('created_by')->references('id')->on('users');
                $table->bigInteger('updated_by')->unsigned();
                $table->foreign('updated_by')->references('id')->on('users');
                $table->timestamps();
            });
            // Define the many to many relationship with authors
            Schema::create('author_book', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('author_id')->unsigned();
                $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
                $table->bigInteger('book_id')->unsigned();
                $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
                $table->timestamps();
            });
            Schema::create('genre_book', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('genre_id')->unsigned();
                $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
                $table->bigInteger('book_id')->unsigned();
                $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
                $table->timestamps();
            });

        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });
        Schema::table('genre_book', function (Blueprint $table) {
            $table->dropForeign(['genre_id']);
            $table->dropForeign(['book_id']);
        });
        Schema::table('author_book', function (Blueprint $table) {
            $table->dropForeign(['author_id']);
            $table->dropForeign(['book_id']);
        });
        Schema::drop('genre_book');
        Schema::drop('author_book');
        Schema::drop('books');
    }
}
