<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Schema::disableForeignKeyConstraints();
        Admin::truncate();
        Role::truncate();
        Permission::truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        Schema::enableForeignKeyConstraints();



        $user = new Admin;
        $user->name = 'anis';
        $user->username = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('password');
        $user->status = 'active';
        $user->save();


        // Create Roles
        $roleSuperAdmin = Role::create(['guard_name' => 'admin', 'name' => 'superadmin']);
        $roleAdmin = Role::create(['guard_name' => 'admin', 'name' => 'admin']);
        $roleEditor = Role::create(['guard_name' => 'admin', 'name' => 'editor']);


        // Permission List as array
        $permissions = [

            [
                'group_name' => 'home',
                'permissions' => [
                    'home.view',
                ]
            ],
            [
                'group_name' => 'blog',
                'permissions' => [
                    // Blog Permissions
                    'blog.create',
                    'blog.view',
                    'blog.edit',
                    'blog.delete',
                    'blog.approve',
                ]
            ],
            [
                'group_name' => 'admin',
                'permissions' => [
                    // admin Permissions
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                    'admin.approve',
                ]
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    // role Permissions
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',
                ]
            ],
            [
                'group_name' => 'order',
                'permissions' => [

                    'order.create',
                    'order.view',
                    'order.edit',
                    'order.delete',
                    'order.approve',
                ]
            ],
            [
                'group_name' => 'order-settings',
                'permissions' => [

                    'order-settings.create',
                    'order-settings.view',
                    'order-settings.edit',
                    'order-settings.delete',
                    'order-settings.approve',
                ]
            ],
            [
                'group_name' => 'product',
                'permissions' => [

                    'product.create',
                    'product.view',
                    'product.edit',
                    'product.delete',
                    'product.approve',
                ]
            ],
            [
                'group_name' => 'category',
                'permissions' => [

                    'category.create',
                    'category.view',
                    'category.edit',
                    'category.delete',
                    'category.approve',
                ]
            ],
            [
                'group_name' => 'brand',
                'permissions' => [

                    'brand.create',
                    'brand.view',
                    'brand.edit',
                    'brand.delete',
                    'brand.approve',
                ]
            ],
            [
                'group_name' => 'vendor',
                'permissions' => [

                    'vendor.create',
                    'vendor.view',
                    'vendor.edit',
                    'vendor.delete',
                    'vendor.approve',
                ]
            ],
            [
                'group_name' => 'about',
                'permissions' => [

                    'about.create',
                    'about.view',
                    'about.edit',
                    'about.delete',
                    'about.approve',
                ]
            ],
            [
                'group_name' => 'contact',
                'permissions' => [

                    'contact.create',
                    'contact.view',
                    'contact.edit',
                    'contact.delete',
                    'contact.approve',
                ]
            ],
            [
                'group_name' => 'slider',
                'permissions' => [

                    'slider.create',
                    'slider.view',
                    'slider.edit',
                    'slider.delete',
                    'slider.approve',
                ]
            ],
            [
                'group_name' => 'setting',
                'permissions' => [

                    'setting.create',
                    'setting.view',
                    'setting.edit',
                    'setting.delete',
                    'setting.approve',
                ]
            ],
            [
                'group_name' => 'pages',
                'permissions' => [

                    'pages.create',
                    'pages.view',
                    'pages.edit',
                    'pages.delete',
                    'pages.approve',
                ]
            ],
            [
                'group_name' => 'rating',
                'permissions' => [

                    'rating.create',
                    'rating.view',
                    'rating.edit',
                    'rating.delete',
                    'rating.approve',
                ]
            ],
            [
                'group_name' => 'social',
                'permissions' => [

                    'social.create',
                    'social.view',
                    'social.edit',
                    'social.delete',
                    'social.approve',
                ]
            ],
            [
                'group_name' => 'user',
                'permissions' => [

                    'user.create',
                    'user.view',
                    'user.edit',
                    'user.delete',
                    'user.approve',
                ]
            ],
            [
                'group_name' => 'visitor',
                'permissions' => [

                    'visitor.create',
                    'visitor.view',
                    'visitor.edit',
                    'visitor.delete',
                    'visitor.approve',
                ]
            ],
        ];


        // Create and Assign Permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                // Create Permission
                $permission = Permission::create(['guard_name' => 'admin', 'name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                $roleSuperAdmin->hasPermissionTo($permission, 'admin');
                $permission->assignRole($roleSuperAdmin);
            }
        }

        // Editor Permission

        $editorPermissions = [


            'home.view',

            'blog.create',
            'blog.view',
            'blog.edit',
            'blog.approve',

            'order.create',
            'order.view',
            'order.edit',
            'order.approve',

            'order-settings.create',
            'order-settings.view',
            'order-settings.edit',
            'order-settings.approve',

            'product.create',
            'product.view',
            'product.edit',
            'product.approve',

            'category.create',
            'category.view',
            'category.edit',
            'category.approve',

            'brand.create',
            'brand.view',
            'brand.edit',
            'brand.approve',

            'vendor.create',
            'vendor.view',
            'vendor.edit',
            'vendor.approve',

            'about.create',
            'about.view',
            'about.edit',
            'about.approve',

            'contact.create',
            'contact.view',
            'contact.edit',
            'contact.approve',

            'slider.create',
            'slider.view',
            'slider.edit',
            'slider.delete',
            'slider.approve',

            'setting.create',
            'setting.view',
            'setting.edit',
            'setting.approve',
            'pages.create',
            'pages.view',
            'pages.edit',
            'pages.approve',

            'rating.create',
            'rating.view',
            'rating.approve',

        ];

        $roleEditor->syncPermissions($editorPermissions);



        //Admin Permission

        $adminPermissions = [

            'home.view',

            'blog.create',
            'blog.view',
            'blog.edit',
            'blog.delete',
            'blog.approve',


            'admin.view',



            'order.create',
            'order.view',
            'order.edit',
            'order.delete',
            'order.approve',

            'order-settings.create',
            'order-settings.view',
            'order-settings.edit',
            'order-settings.delete',
            'order-settings.approve',

            'product.create',
            'product.view',
            'product.edit',
            'product.delete',
            'product.approve',

            'category.create',
            'category.view',
            'category.edit',
            'category.delete',
            'category.approve',

            'brand.create',
            'brand.view',
            'brand.edit',
            'brand.delete',
            'brand.approve',

            'vendor.create',
            'vendor.view',
            'vendor.edit',
            'vendor.delete',
            'vendor.approve',

            'about.create',
            'about.view',
            'about.edit',
            'about.delete',
            'about.approve',

            'contact.create',
            'contact.view',
            'contact.edit',
            'contact.delete',
            'contact.approve',

            'slider.create',
            'slider.view',
            'slider.edit',
            'slider.delete',
            'slider.approve',

            'setting.create',
            'setting.view',
            'setting.edit',
            'setting.delete',
            'setting.approve',

            'pages.create',
            'pages.view',
            'pages.edit',
            'pages.delete',
            'pages.approve',

            'rating.create',
            'rating.view',
            'rating.edit',
            'rating.delete',
            'rating.approve',

            'social.create',
            'social.view',
            'social.edit',
            'social.delete',
            'social.approve',

            'user.create',
            'user.view',
            'user.edit',
            'user.delete',
            'user.approve',

            'visitor.create',
            'visitor.view',
            'visitor.edit',
            'visitor.delete',
            'visitor.approve',

        ];

        $roleAdmin->syncPermissions($adminPermissions);

        //Model Has Roles Create

        DB::table('model_has_roles')->insert([
            'role_id' => $roleSuperAdmin->id,
            'model_type' => 'App\Models\Admin',
            'model_id' => $user->id
        ]);
    }
}
