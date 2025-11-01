<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Notify;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            ['name' => 'banner read',  'category' => 'Banners'],
            ['name' => 'banner create',  'category' => 'Banners'],
            ['name' => 'banner edit',  'category' => 'Banners'],
            ['name' => 'banner delete',  'category' => 'Banners'],

            ['name' => 'admin read',  'category' => 'Admins'],
            ['name' => 'admin create',  'category' => 'Admins'],
            ['name' => 'admin edit',  'category' => 'Admins'],
            ['name' => 'admin delete',  'category' => 'Admins'],
            ['name' => 'admin send notification'  ,  'category' => 'Admins'],


            ['name' => 'role read',  'category' => 'Roles'],
            ['name' => 'role create',  'category' => 'Roles'],
            ['name' => 'role edit',  'category' => 'Roles'],
            ['name' => 'role delete',  'category' => 'Roles'],

            ['name' => 'language read',  'category' => 'Languages'],
            ['name' => 'language create',  'category' => 'Languages'],
            ['name' => 'language edit',  'category' => 'Languages'],
            ['name' => 'language delete',  'category' => 'Languages'],

          

            // ['name' => 'frequently asked question read'  ,  'category' => 'Frequently Asked Question'],
            // ['name' => 'frequently asked question create',  'category' => 'Frequently Asked Question'],
            // ['name' => 'frequently asked question edit'  ,  'category' => 'Frequently Asked Question'],
            // ['name' => 'frequently asked question delete',  'category' => 'Frequently Asked Question '],

            ['name' => 'database backup read',  'category' => 'Database Backup'],
            ['name' => 'database backup create',  'category' => 'Database Backup'],


            ['name' => 'join us read',  'category' => 'Join Us'],
            ['name' => 'join us edit',  'category' => 'Join Us'],

            // ['name' => 'learn about read'  ,  'category' => 'Learn About'],
            // ['name' => 'learn about create',  'category' => 'Learn About'],
            // ['name' => 'learn about edit'  ,  'category' => 'Learn About'],
            // ['name' => 'learn about delete',  'category' => 'Learn About'],

            ['name' => 'organizing committee read'  ,  'category' => 'Organizing Committee'],
            ['name' => 'organizing committee create',  'category' => 'Organizing Committee'],
            ['name' => 'organizing committee edit'  ,  'category' => 'Organizing Committee'],
            ['name' => 'organizing committee delete',  'category' => 'Organizing Committee'],

            ['name' => 'brand read'  ,  'category' => 'Brand'],
            ['name' => 'brand create',  'category' => 'Brand'],
            ['name' => 'brand edit'  ,  'category' => 'Brand'],
            ['name' => 'brand delete',  'category' => 'Brand'],

            ['name' => 'news read'  ,  'category' => 'news'],
            ['name' => 'news create',  'category' => 'news'],
            ['name' => 'news edit'  ,  'category' => 'news'],
            ['name' => 'news delete',  'category' => 'news'],

            ['name' => 'contact us read',  'category' => 'Contact Us'],
            ['name' => 'contact us edit',  'category' => 'Contact Us'],
            ['name' => 'contact message read',  'category' => 'Contact Us'],

            ['name' => 'newsletter read',  'category' => 'Newsletter'],

            ['name' => 'about us read',  'category' => 'About Us'],
            ['name' => 'about us edit',  'category' => 'About Us'],
            ['name' => 'history read',  'category' => 'About Us'],
            ['name' => 'history edit',  'category' => 'About Us'],
            ['name' => 'vision read',  'category' => 'About Us'],
            ['name' => 'vision edit',  'category' => 'About Us'],
            ['name' => 'mission read',  'category' => 'About Us'],
            ['name' => 'mission edit',  'category' => 'About Us'],
            ['name' => 'about champion read',  'category' => 'About Us'],
            ['name' => 'about champion edit',  'category' => 'About Us'],

            ['name' => 'events read'  ,  'category' => 'Event'],
            ['name' => 'events create',  'category' => 'Event'],
            ['name' => 'events edit'  ,  'category' => 'Event'],
            ['name' => 'events delete',  'category' => 'Event'],
            ['name' => 'event registration read'  ,  'category' => 'Event'],

            // ['name' => 'user read'  ,  'category' => 'User'],
            // ['name' => 'user edit'  ,  'category' => 'User'],

        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission['name']],[
                'name' => $permission['name'],
                'category' => $permission['category'],
            ]);
        }
    }
}
