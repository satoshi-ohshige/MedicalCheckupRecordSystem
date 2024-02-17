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
        Schema::create('medical_record', function (Blueprint $table) {
            $table->comment('受診記録テーブル');
            $table->ulid('medical_record_id')->comment('受診記録ID');
            $table->ulid('user_id')->comment('ユーザーID');
            $table->string('course')->comment('受診コース');
            $table->string('place')->comment('受診場所');
            $table->date('checkup_date')->comment('受診日');
            $table->year('checkup_fiscal_year')->storedAs('YEAR(DATE_ADD(checkup_date, INTERVAL 275 DAY)) - 1')->comment('受診年度');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->primary('medical_record_id');
            $table->unique(['checkup_fiscal_year', 'user_id']);
            $table->foreign('user_id')->references('user_id')->on('user')->cascadeOnDelete();
            $table->foreign('course')->references('course')->on('checkup_course_master')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_record');
    }
};
