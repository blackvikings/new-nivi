<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Members extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id')->start_from(14000);
            $table->string('user_id')->unique();
            $table->text('password')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->text('addhar_image')->nullable();
            $table->text('pan_image')->nullable();
            $table->string('sponser_id')->nullable();
            $table->string('sub_sponser_id')->nullable();
            $table->string('phone_no')->nullable();
            $table->date('dob')->nullable();
            $table->enum('left_or_right', ['left', 'right'])->default('right');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('nominee')->nullable();
            $table->date('nominee_dob')->nullable();
            $table->text('profile_pic')->nullable();
            $table->json('address')->nullable();
            $table->json('bankdetails')->nullable();
            $table->enum('status', ['active', 'pending', 'inactive']);
            $table->softDeletes();
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
        //
    }
}
