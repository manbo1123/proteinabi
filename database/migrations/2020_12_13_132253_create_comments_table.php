<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Comment\Status;
class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id')->default(0)->comment('商品Id');
            $table->unsignedBigInteger('evaluator_id')->default(0)->comment('評価者Id');
            $table->integer('stars')->default(0)->comment('星（総合評価）');
            $table->text('title')->comment('コメントタイトル');
            $table->text('comment')->comment('コメント');
            $table->enum('status', Status::getValues()) -> default(Status::Unsaved)->comment('未保存or非公開or公開済');
            $table->integer('click')->comment('クリック数') -> default(0);
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('evaluator_id')->references('id')->on('evaluators')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
