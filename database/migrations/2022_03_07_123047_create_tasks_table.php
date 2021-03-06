<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignId('createdby_user_id')->nullable()->constrained('users');
            $table->foreignId('assignedto_user_id')->nullable()->constrained('users');
            $table->integer('taskable_id');
            $table->string('taskable_type');
            $table->timestamp('due_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->softDeletes();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
