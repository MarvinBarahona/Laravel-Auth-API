<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsAndUsersSeeder extends Seeder
{
    /**
     * Crear permisos, roles y usuarios de prueba
     *
     * @return void
     */
    public function run()
    {
        // Resetear permisos en caché (copiado de ejemplo)
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear permisos
        Permission::create(['name' => 'listar algo']);
        Permission::create(['name' => 'actualizar algo']);
        Permission::create(['name' => 'crear algo']);
        Permission::create(['name' => 'eliminar algo']);

        // Crear roles y asignar permisos
        $role1 = Role::create(['name' => 'general']);
        $role1->givePermissionTo('listar algo');
        $role1->givePermissionTo('actualizar algo');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('crear algo');
        $role2->givePermissionTo('eliminar algo');

        // El super-admin tiene permisos para todo
        $role3 = Role::create(['name' => 'super-admin']);

        // create demo users
        $user = Factory(App\User::class)->create([
            'name' => 'Usuario general',
            'email' => 'test@example.com',
            'password' => bcrypt('jyCT8TkggF7h1LkK3kbT')
        ]);
        $user->assignRole($role1);

        $user = Factory(App\User::class)->create([
            'name' => 'Usuario Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('zPGbKq9MLWjnG17lCxLZ')
        ]);
        $user->assignRole($role2);

        $user = Factory(App\User::class)->create([
            'name' => 'Usuario Super Admin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('i381laUnznz931eRpTC8')
        ]);
        $user->assignRole($role3);
    }
}
