<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        TODO думаю днанная таблица лишняя но отсутствуют данные о автомобиле (если сделать сложный вопрос по автомобилю будет получена история автомобиля)
        Schema::create('order_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')
                ->comment('id заказа')
                ->constrained('orders');
            $table->foreignId('user_id')
                ->comment('id мастера')
                ->constrained('users');
//            TODO думаю start_time, end_time лишние дублируются в таблице orders
            $table->dateTime('start_time')
                ->default(null)
                ->comment('Дата начала события');
            $table->dateTime('end_time')
                ->default(null)
                ->comment('Дата окончания события');
//            TODO думаю description_work лишний дублируются в таблице orders
            $table->text('description_work')->nullable()
                ->comment('описание события (выполненной работы)');
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
        Schema::dropIfExists('order_history');
    }
}
