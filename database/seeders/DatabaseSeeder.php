<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Course;
use App\Models\Curriculum;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
//    {
//        $role->givePermissionTo($permission);
//        $permission->assignRole($role);
//
//        $this->create_user_with_role('Communication', 'Communication Team', 'communication@lms.test');
//        $teacher = $this->create_user_with_role('Teacher', 'Teacher', 'teacher@lms.test');
//        $this->create_user_with_role('Leads', 'Leads', 'leads@lms.test');
//
//        //create leads
//        Lead::factory()->create();
//        $course = Course::create([
//            'name' => 'laravel',
//            'description' => 'Laravel is a framework of Php ,its a great opportunity for all to develop any kind of application',
//            'image' => 'https://laravel.com/img/logomark.min.svg',
//            'user_id' => $teacher->id,
//            'user_id' => 1,
//        ]);
//        Curriculum::factory()->create();
//        $communicationRole = Role::create([
//            'name' => 'communication'
//        ]);
//        $user->new User([
//        'name' => 'Communication Team',
//        'email' => 'communication@lms.test',
//        'password' => bcrypt('password'),
//    ]);
//        $user->assignRole($communicationRole);
//
//
//     private function create_user_with_role($type, $name, $email) {
//        $role = Role::create([
//            'name' => $type
//        ]);
//
//        $user = User::create([
//            'name' => $name,
//            'email' => $email,
//            'password' => bcrypt('password')
//        ]);
//
//        if($type == 'Super Admin') {
//            $role->givePermissionTo(Permission::all());
//        } elseif($type == 'Leads') {
//            $role->givePermissionTo('lead-management');
//        }
//
//        $user->assignRole($role);
//
//        return $user;
        $defaultPermissions = ['lead-management', 'create-admin', 'user-management'];
        foreach($defaultPermissions as $permission) {
            Permission::create(['name' => $permission]);
        }


        $this->create_user_with_role('Super Admin', 'Super Admin', 'super-admin@lms.test');
        $this->create_user_with_role('Communication', 'Communication Team', 'communication@lms.test');
        $teacher = $this->create_user_with_role('Teacher', 'Teacher', 'teacher@lms.test');
        $this->create_user_with_role('Leads', 'Leads', 'leads@lms.test');


        // create leads
        Lead::factory(100)->create();

        $course = Course::create([
            'name' => 'Laravel',
            'description' => 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.',
            'image' => 'https://laravel.com/img/logomark.min.svg',
            'user_id' => $teacher->id,

        ]);


        Curriculum::factory(10)->create();

    }

    private function create_user_with_role($type, $name, $email) {
        $role = Role::create([
            'name' => $type
        ]);

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt('password')
        ]);

        if($type == 'Super Admin') {
            $role->givePermissionTo(Permission::all());
        } elseif($type == 'Leads') {
            $role->givePermissionTo('lead-management');
        }

        $user->assignRole($role);

        return $user;

}
}
