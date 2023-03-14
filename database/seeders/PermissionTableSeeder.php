<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permissions
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            ///produto
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            //ficha
            'ficha-list',
            'ficha-create',
            'ficha-edit',
            'ficha-editconselho',
            'ficha-delete',
            //ficha_conselho
            'ficha_conselho-list',
            'ficha_conselho-create',
            'ficha_conselho-edit',
            'ficha_conselho-editconselho',
            'ficha_conselho-delete',
            //ficha_ministerio
            'ficha_ministerio-list',
            'ficha_ministerio-create',
            'ficha_ministerio-edit',
            'ficha_ministerio-editconselho',
            'ficha_ministerio-delete',
            //ministerio
            'ministerio-list',
            'ministerio-create',
            'ministerio-edit',
            'ministerio-delete',
            //polo
            'polo-list',
            'polo-create',
            'polo-edit',
            'polo-delete',
            //escola
            'escola-list',
            'escola-create',
            'escola-edit',
            'escola-delete',
            //aluno
            'aluno-list',
            'aluno-create',
            'aluno-edit',
            'aluno-delete',
            //tb_categoria
            'cat-list',
            'cat-create',
            'cat-edit',
            'cat-delete',
            //categoria
            'categoria-list',
            'categoria-create',
            'categoria-edit',
            'categoria-delete',
            //prazo
            'prazo-list',
            'prazo-create',
            'prazo-edit',
            'prazo-delete',
            //conselho
            'conselho-list',
            'conselho-create',
            'conselho-edit',
            'conselho-delete',
            //violencia
            'violencia-list',
            'violencia-create',
            'violencia-edit',
            'violencia-delete',
            
        ];
       
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}