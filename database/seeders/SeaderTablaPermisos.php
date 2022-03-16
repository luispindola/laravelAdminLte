<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


//spatie
use Spatie\Permission\Models\Permission;

class SeaderTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //Operaciones sobre tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //Operacions sobre tabla blogs
            'ver-user',
            'crear-user',
            'editar-user',
            'borrar-user'
        ];

        

        foreach($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }
    }
}
