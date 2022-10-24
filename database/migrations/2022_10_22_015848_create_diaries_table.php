<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diaries', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('date')->comment('症状が発生した日付()');
            $table->time('time')->comment('症状が発生した時間');
            $table->smallInteger('elapsed_time')->comment('経過時間、どれくらい続いたのか（分）');
            $table->text('feeling')->nullable()->comment('その時の気分感情思など');
            $table->text('coping_measures')->nullable()->comment('症状への対処法や反省点');
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
        Schema::dropIfExists('diaries');
    }
};
