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
        Schema::create('roles_permission_names', function (Blueprint $table) {
            $table->id();
            $table->string('role_name')->nullable();
            $table->timestamps();
        });

        DB::table('roles_permission_names')->insert(
        [
            ['role_name' => 'Administrator'],
            ['role_name' => 'Developer'],
            ['role_name' => 'Analyst'],
            ['role_name' => 'Support'],
        ]);
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles_permission_names');
    }
};
