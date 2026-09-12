<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'super_admin',
            'school_admin',
            'teacher',
            'dormitory_staff',
            'mentor',
            'staff',
            'security',
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate([
                'name' => $role,
                'guard_name' => 'web',
            ]);
        }

        $permissions = [
            // School
            'schools.view',
            'schools.create',
            'schools.update',
            'schools.delete',

            // Users
            'users.view',
            'users.create',
            'users.update',
            'users.delete',

            // Employees
            'employees.view',
            'employees.create',
            'employees.update',
            'employees.delete',

            // Students
            'students.view',
            'students.create',
            'students.update',
            'students.delete',

            // Subjects
            'subjects.view',
            'subjects.create',
            'subjects.update',
            'subjects.delete',

            // Attendance
            'attendance.view',
            'attendance.create',
            'attendance.update',
            'attendance.delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | SUPER ADMIN
        |--------------------------------------------------------------------------
        */

        $superAdmin = Role::findByName('super_admin');

        $superAdmin->syncPermissions(
            Permission::all()
        );

        /*
        |--------------------------------------------------------------------------
        | SCHOOL ADMIN
        |--------------------------------------------------------------------------
        */

        $schoolAdmin = Role::findByName('school_admin');

        $schoolAdmin->syncPermissions([
            'users.view',
            'users.create',
            'users.update',

            'employees.view',
            'employees.create',
            'employees.update',
            'employees.delete',

            'students.view',
            'students.create',
            'students.update',
            'students.delete',

            'subjects.view',
            'subjects.create',
            'subjects.update',
            'subjects.delete',

            'attendance.view',
            'attendance.create',
            'attendance.update',
        ]);

        /*
        |--------------------------------------------------------------------------
        | TEACHER
        |--------------------------------------------------------------------------
        */

        $teacher = Role::findByName('teacher');

        $teacher->syncPermissions([
            'students.view',

            'attendance.view',
            'attendance.create',
            'attendance.update',
        ]);

        /*
        |--------------------------------------------------------------------------
        | DORMITORY STAFF
        |--------------------------------------------------------------------------
        */

        $dormitoryStaff = Role::findByName('dormitory_staff');

        $dormitoryStaff->syncPermissions([
            'students.view',
            'attendance.view',
        ]);

        /*
        |--------------------------------------------------------------------------
        | MENTOR / WALI ASUH
        |--------------------------------------------------------------------------
        */

        $mentor = Role::findByName('mentor');

        $mentor->syncPermissions([
            'students.view',
            'attendance.view',
        ]);

        /*
        |--------------------------------------------------------------------------
        | STAFF
        |--------------------------------------------------------------------------
        */

        $staff = Role::findByName('staff');

        $staff->syncPermissions([
            'attendance.view',
            'attendance.create',
        ]);

        /*
        |--------------------------------------------------------------------------
        | SECURITY
        |--------------------------------------------------------------------------
        */

        $security = Role::findByName('security');

        $security->syncPermissions([
            'attendance.view',
            'attendance.create',
        ]);
    }
}