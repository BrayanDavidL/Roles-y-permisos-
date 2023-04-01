<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use App\Models\User;

class CreateAdminUser extends Migration
{
    public function up()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('admin');
        $user->givePermissionTo('administracion');
    }

    public function down()
    {
        $user = User::where('email', 'admin@example.com')->first();
        if ($user) {
            $user->delete();
        }
    }
}
