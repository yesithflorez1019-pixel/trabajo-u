<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Usamos Schema::table para modificar la tabla 'users' que ya existe
        Schema::table('users', function (Blueprint $table) {
            
            // Como NOT NULL porque todos los empleados deben tener un rol
            $table->foreignId('role_id')
                  ->after('id') // Se añade después del ID
                  ->constrained('roles') // Asegura que el ID exista en la tabla 'roles'
                  ->onDelete('restrict'); 
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropForeign(['role_id']);
             $table->dropColumn('role_id');
        });
    }
};