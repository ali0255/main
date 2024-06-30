<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('dec');
            $table->string('befor_dec');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->date('start_time');
            $table->string('Mabdah');
            $table->string('Maqsad');
            $table->decimal('price',10,2)->unsigned();
            $table->string('totaldays');
            $table->integer('totaluser');
            $table->string('avg_age_min');
            $table->string('avg_age_max');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
