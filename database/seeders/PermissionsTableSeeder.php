<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'basic_detail_create',
            ],
            [
                'id'    => 18,
                'title' => 'basic_detail_edit',
            ],
            [
                'id'    => 19,
                'title' => 'basic_detail_show',
            ],
            [
                'id'    => 20,
                'title' => 'basic_detail_delete',
            ],
            [
                'id'    => 21,
                'title' => 'basic_detail_access',
            ],
            [
                'id'    => 22,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 23,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 24,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 25,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 26,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 27,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 28,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 29,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 30,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 31,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 32,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 33,
                'title' => 'user_detail_create',
            ],
            [
                'id'    => 34,
                'title' => 'user_detail_edit',
            ],
            [
                'id'    => 35,
                'title' => 'user_detail_show',
            ],
            [
                'id'    => 36,
                'title' => 'user_detail_delete',
            ],
            [
                'id'    => 37,
                'title' => 'user_detail_access',
            ],
            [
                'id'    => 38,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
