<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class CreateRoles extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    { 
        $adminRole = Role::create(['name' => 'admin']);
        $lectorRole = Role::create(['name' => 'lector']);
        
        $user = User::find(1);
        if ($user) {
            $user->assignRole($adminRole);
        }
        
        // Crea los permisos
        Permission::create(['name' => 'administracion']);

        // Asigna permisos a los roles
        $adminRole->givePermissionTo('administracion');

        // Crea un usuario y asigna el rol "admin"
        
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
}