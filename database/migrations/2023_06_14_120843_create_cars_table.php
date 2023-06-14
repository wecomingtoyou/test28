<?php

declare(strict_types=1);

use Domains\Models\Models\Model;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('color', 12)->nullable();
            $table->unsignedInteger('mileage')->nullable();
            $table->date('issued')->nullable();
            $table->timestamps();

            $table->foreignIdFor(Model::class)
                ->unique()
                ->references('id')
                ->on('models')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
