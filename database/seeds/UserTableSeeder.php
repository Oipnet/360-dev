<?php

use App\Model\Permission;
use App\Model\Role;
use App\Model\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 50)->create();

        /** Exemple d'utilisation du système de role et de permission */

        $user = new Role();
        $user->name = 'user';
        $user->display_name = 'Classic User';
        $user->description = 'All user registered';
        $user->save();

        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'Administrator';
        $admin->description = 'User is allowed to manage and edit users';
        $admin->save();

        $redactor = new Role();
        $redactor->name = 'redactor';
        $redactor->display_name = 'Redactor';
        $redactor->description = 'User can write a post';
        $redactor->save();

        $editUser = new Permission();
        $editUser->name = 'edit-user';
        $editUser->display_name = "Edit Users";
        $editUser->description = 'Edit existing users';
        $editUser->save();

        $createPost = new Permission();
        $createPost->name = 'create-post';
        $createPost->display_name = 'Create Posts';
        $createPost->description = 'Create new post';
        $createPost->save();

        $redactor->attachPermission($createPost);
        $admin->attachPermissions([$createPost, $editUser]);

        $users = User::get();
        $users[0]->attachRole($user);
        $users[1]->attachRole($admin);
        $users[2]->attachRole($redactor);
    }
}
