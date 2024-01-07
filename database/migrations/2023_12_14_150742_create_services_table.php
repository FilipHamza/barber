<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->string('title');
            $table->string('icon');
            $table->text('desc');
            $table->integer('position')->default(0);
            $table->boolean('active')->default(0);
        });

        DB::table('services')->insert([
            ['title' => 'Střih vlasů', 'icon' => 'hand-scissors', 'desc' => 'Střih šitý na míru, umytí vlasů, úprava obočí, vysušení, styling.', 'position' => 1, 'active' => true],
            ['title' => 'Beardtrim', 'icon' => 'cut', 'desc' => 'Péče o pěstovaný plnovous - zastřižení, horký ručník (hot towel), zaholení kontur břitvou, hydratační balzam, masáž tváře', 'position' => 2, 'active' => true],
            ['title' => 'Royal Max', 'icon' => 'crown', 'desc' => 'Stříhání vlasů, umytí vlasů, hloubková ošetřující masáž hlavy, napářka horkým ručníkem, holení tváře-úprava, odstranění pórů pomocí black mask, hloubková ošetřující masáž tváře, úprava obočí, upálení ušních chlupů, depilace chlupů z nosu, vysušení, styling.', 'position' => 3, 'active' => true],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
