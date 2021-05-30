<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RappSetup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
       
		Schema::dropIfExists('rapp_comments');
		Schema::dropIfExists('rapp_user_profiles');
		Schema::dropIfExists('rapp_posts');
		Schema::dropIfExists('rapp_users');
		Schema::dropIfExists('rapp_user_roles');
		
        Schema::create('rapp_user_roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
        });
        
		
		Schema::create('rapp_users', function (Blueprint $table) {
			$table->id();
			$table->string('name')->unique();
			$table->string('email')->unique();
			$table->timestamp('email_verified_at')->nullable();
			$table->string('address')->unique();
			$table->rememberToken();
			$table->unsignedBigInteger('role_id');
			$table->foreign('role_id')->references('id')->on('rapp_user_roles');
			$table->timestamps();
		});
		

	    Schema::create('rapp_posts', function (Blueprint $table) {
	      $table->id();
	      $table->unsignedBigInteger('author_id');
	      $table->foreign('author_id')
	        ->references('id')->on('users')
	        ->onDelete('cascade');
	      $table->string('title')->unique();
	      $table->text('body');
	      $table->string('slug')->unique();
	      $table->boolean('active');
	      $table->timestamps();
	    });

	    Schema::create('rapp_comments', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('post_id');
			$table->unsignedBigInteger('user_id');
			$table->foreign('post_id')
				->references('id')->on('rapp_posts')
				->onDelete('cascade');
			$table->foreign('user_id')
				->references('id')->on('rapp_users')
				->onDelete('cascade');
			$table->text('body');
			$table->timestamps();
		});

		Schema::Create('rapp_user_profiles', function(Blueprint $table) {
			$table->unsignedBigInteger('user_id');
			$table->foreign('user_id')->references('id')->on('rapp_users');
			$table->date('birthday');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('bio');
			$table->string('image');
			$table->string('housenumber')->nullable();
			$table->string('addressline1')->nullable();
			$table->string('addressline2')->nullable();
			$table->string('postcode')->nullable();
			$table->string('county')->nullable();
			$table->string('country')->nullable();
			$table->timestamps();
			
       });


       
    }
    public function down(){
		Schema::dropIfExists('rapp_comments');
		Schema::dropIfExists('rapp_user_profiles');
		Schema::dropIfExists('rapp_posts');
		Schema::dropIfExists('rapp_users');
		Schema::dropIfExists('rapp_user_roles');
        
    }
}
