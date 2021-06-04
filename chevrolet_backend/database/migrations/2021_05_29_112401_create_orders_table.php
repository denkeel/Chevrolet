<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->comment('id мастера')
                ->nullable()
                ->constrained('users');
            $table->foreignId('client_id')
                ->nullable()
                ->comment('id клиента')
                ->constrained('users');
            $table->dateTime('start_time')
                ->nullable()
                ->comment('Дата начала выполнения работ');
            $table->tinyText('vin_code')
                ->nullable()
                ->comment('VIN номер автомобиля');
            $table->dateTime('end_time')
                ->nullable()
                ->comment('Дата окончания выполнения работ');
            $table->text('description')
                ->nullable(false)
                ->comment('Описание заказа');
            $table->text('completed_work')
                ->nullable()
                ->comment('Описание проделанной работы');
            $table->enum('status', ['active', 'in_progress', 'completed', 'inactive'])
                ->nullable(false)
                ->default('active')
                ->comment('Статус заказа');
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
        Schema::dropIfExists('orders');
    }
}
