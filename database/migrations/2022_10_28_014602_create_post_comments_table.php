<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post_comments', function (Blueprint $table) {
			$table->id();
			$table->foreignId('fk_id_user')->constrained('users', 'id');
			$table->foreignId('fk_id_post')->constrained('posts', 'id');
			$table->string('comment');
			$table->date('created_at');
			$table->timestamps();
		});
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('post_comments');
	}
};
