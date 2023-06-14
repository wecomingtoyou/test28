<?php

declare(strict_types=1);

use Domains\Brands\Models\Brand;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('models', function (Blueprint $table) {
            $table->id();
            $table->string('name', 32);
            $table->timestamps();

            $table->foreignIdFor(Brand::class)
                ->references('id')
                ->on('brands')
                ->cascadeOnDelete();

            $table->unique(['name', 'brand_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('models');
    }
};
