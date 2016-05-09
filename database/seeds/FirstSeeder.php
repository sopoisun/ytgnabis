<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Member;
use App\Role;
use App\Permission;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Ahmad Rizal Afani',
            'email' => 'ahmadrizalafani@gmail.com',
            'password' => bcrypt('administrator'),
        ]);

        # Member
        Member::create([
            'name' => 'Foo',
            'email' => 'foo@gmail.com',
            'password' => bcrypt('administrator'),
        ]);

        // Basic roles data
        Role::insert([
            ['name' => 'Super User', 'key' => 'superuser'],
        ]);

        // Basic permissions data
        Permission::insert([
            ['name' => 'Baca bisnis', 'key' => 'business.read'],
            ['name' => 'Tambah bisnis', 'key' => 'business.create'],
            ['name' => 'Ubah bisnis', 'key' => 'business.update'],
            ['name' => 'Hapus bisnis', 'key' => 'business.delete'],

            ['name' => 'Baca kategory bisnis', 'key' => 'business_category.read'],
            ['name' => 'Tambah kategory bisnis', 'key' => 'business_category.create'],
            ['name' => 'Ubah kategory bisnis', 'key' => 'business_category.update'],
            ['name' => 'Hapus kategory bisnis', 'key' => 'business_category.delete'],

            ['name' => 'Baca produk', 'key' => 'product.read'],
            ['name' => 'Tambah produk', 'key' => 'product.create'],
            ['name' => 'Ubah produk', 'key' => 'product.update'],
            ['name' => 'Hapus produk', 'key' => 'product.delete'],

            ['name' => 'Baca kategori produk', 'key' => 'product_category.read'],
            ['name' => 'Tambah kategori produk', 'key' => 'product_category.create'],
            ['name' => 'Ubah kategori produk', 'key' => 'product_category.update'],
            ['name' => 'Hapus kategori produk', 'key' => 'product_category.delete'],

            ['name' => 'Baca member', 'key' => 'member.read'],
            ['name' => 'Tambah member', 'key' => 'member.create'],
            ['name' => 'Ubah member', 'key' => 'member.update'],
            ['name' => 'Hapus member', 'key' => 'member.delete'],

            ['name' => 'Baca user', 'key' => 'user.read'],
            ['name' => 'Tambah user', 'key' => 'user.create'],
            ['name' => 'Ubah user', 'key' => 'user.update'],
            ['name' => 'Hapus user', 'key' => 'user.delete'],

            ['name' => 'Baca role', 'key' => 'role.read'],
            ['name' => 'Tambah role', 'key' => 'role.create'],
            ['name' => 'Ubah role', 'key' => 'role.update'],
            ['name' => 'Hapus role', 'key' => 'role.delete'],

            ['name' => 'Baca permission', 'key' => 'permission.read'],
            ['name' => 'Tambah permission', 'key' => 'permission.create'],
            ['name' => 'Ubah permission', 'key' => 'permission.update'],
            ['name' => 'Hapus permission', 'key' => 'permission.delete'],
        ]);

        $superuser = App\Role::where('key', 'superuser')->first();
        $superuser->addPermission('business.read');
        $superuser->addPermission('business.create');
        $superuser->addPermission('business.update');
        $superuser->addPermission('business.delete');

        $superuser->addPermission('business_category.read');
        $superuser->addPermission('business_category.create');
        $superuser->addPermission('business_category.update');
        $superuser->addPermission('business_category.delete');

        $superuser->addPermission('product.read');
        $superuser->addPermission('product.create');
        $superuser->addPermission('product.update');
        $superuser->addPermission('product.delete');

        $superuser->addPermission('product_category.read');
        $superuser->addPermission('product_category.create');
        $superuser->addPermission('product_category.update');
        $superuser->addPermission('product_category.delete');

        $superuser->addPermission('member.read');
        $superuser->addPermission('member.create');
        $superuser->addPermission('member.update');
        $superuser->addPermission('member.delete');

        $superuser->addPermission('user.read');
        $superuser->addPermission('user.create');
        $superuser->addPermission('user.update');
        $superuser->addPermission('user.delete');

        $superuser->addPermission('role.read');
        $superuser->addPermission('role.create');
        $superuser->addPermission('role.update');
        $superuser->addPermission('role.delete');

        $superuser->addPermission('permission.read');
        $superuser->addPermission('permission.create');
        $superuser->addPermission('permission.update');
        $superuser->addPermission('permission.delete');

        $user->assignRole('superuser');
    }
}
