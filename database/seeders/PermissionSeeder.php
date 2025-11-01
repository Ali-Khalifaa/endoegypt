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

            ['name' => 'category read'  ,  'category' => 'Categories'],
            ['name' => 'category create',  'category' => 'Categories'],
            ['name' => 'category edit'  ,  'category' => 'Categories'],
            ['name' => 'category delete',  'category' => 'Categories'],

            ['name' => 'age category read'  ,  'category' => 'Age Categories'],
            ['name' => 'age category create',  'category' => 'Age Categories'],
            ['name' => 'age category edit'  ,  'category' => 'Age Categories'],
            ['name' => 'age category delete',  'category' => 'Age Categories'],

            ['name' => 'country read'  ,  'category' => 'Countries'],
            ['name' => 'country create',  'category' => 'Countries'],
            ['name' => 'country edit'  ,  'category' => 'Countries'],
            ['name' => 'country delete',  'category' => 'Countries'],

            ['name' => 'frequently asked question read'  ,  'category' => 'Frequently Asked Question'],
            ['name' => 'frequently asked question create',  'category' => 'Frequently Asked Question'],
            ['name' => 'frequently asked question edit'  ,  'category' => 'Frequently Asked Question'],
            ['name' => 'frequently asked question delete',  'category' => 'Frequently Asked Question '],

            ['name' => 'database backup read',  'category' => 'Database Backup'],
            ['name' => 'database backup create',  'category' => 'Database Backup'],

            ['name' => 'color read'  ,  'category' => 'Colors'],
            ['name' => 'color create',  'category' => 'Colors'],
            ['name' => 'color edit'  ,  'category' => 'Colors'],
            ['name' => 'color delete',  'category' => 'Colors'],

            ['name' => 'outfit color read'  ,  'category' => 'Outfit Colors'],
            ['name' => 'outfit color create',  'category' => 'Outfit Colors'],
            ['name' => 'outfit color edit'  ,  'category' => 'Outfit Colors'],
            ['name' => 'outfit color delete',  'category' => 'Outfit Colors'],

            ['name' => 'join us read',  'category' => 'Join Us'],
            ['name' => 'join us edit',  'category' => 'Join Us'],

            ['name' => 'area read'  ,  'category' => 'Areas'],
            ['name' => 'area create',  'category' => 'Areas'],
            ['name' => 'area edit'  ,  'category' => 'Areas'],
            ['name' => 'area delete',  'category' => 'Areas'],

            ['name' => 'learn about read'  ,  'category' => 'Learn About'],
            ['name' => 'learn about create',  'category' => 'Learn About'],
            ['name' => 'learn about edit'  ,  'category' => 'Learn About'],
            ['name' => 'learn about delete',  'category' => 'Learn About'],

            ['name' => 'tournament information read',  'category' => 'Terms and conditions'],
            ['name' => 'tournament information edit',  'category' => 'Terms and conditions'],
            ['name' => 'tournament regulation read',  'category' => 'Terms and conditions'],
            ['name' => 'tournament regulation edit',  'category' => 'Terms and conditions'],
            ['name' => 'general condition read',  'category' => 'Terms and conditions'],
            ['name' => 'general condition edit',  'category' => 'Terms and conditions'],
            ['name' => 'child safety policy read',  'category' => 'Terms and conditions'],
            ['name' => 'child safety policy edit',  'category' => 'Terms and conditions'],

            ['name' => 'latest video read',  'category' => 'Latest Video'],
            ['name' => 'latest video create',  'category' => 'Latest Video'],
            ['name' => 'latest video edit',  'category' => 'Latest Video'],
            ['name' => 'latest video delete',  'category' => 'Latest Video'],

            ['name' => 'team gallery read'  ,  'category' => 'Galleries'],
            ['name' => 'team gallery create',  'category' => 'Galleries'],
            ['name' => 'team gallery edit'  ,  'category' => 'Galleries'],
            ['name' => 'team gallery delete',  'category' => 'Galleries'],

            ['name' => 'championship gallery read'  ,  'category' => 'Galleries'],
            ['name' => 'championship gallery create',  'category' => 'Galleries'],
            ['name' => 'championship gallery edit'  ,  'category' => 'Galleries'],
            ['name' => 'championship gallery delete',  'category' => 'Galleries'],

            ['name' => 'champion award read'  ,  'category' => 'Galleries'],
            ['name' => 'champion award create',  'category' => 'Galleries'],
            ['name' => 'champion award edit'  ,  'category' => 'Galleries'],
            ['name' => 'champion award delete',  'category' => 'Galleries'],

            ['name' => 'player read'  ,  'category' => 'Galleries'],
            ['name' => 'player create',  'category' => 'Galleries'],
            ['name' => 'player edit'  ,  'category' => 'Galleries'],
            ['name' => 'player delete',  'category' => 'Galleries'],

            ['name' => 'testimonial read'  ,  'category' => 'Testimonials'],
            ['name' => 'testimonial create',  'category' => 'Testimonials'],
            ['name' => 'testimonial edit'  ,  'category' => 'Testimonials'],
            ['name' => 'testimonial delete',  'category' => 'Testimonials'],

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

            ['name' => 'club team read'  ,  'category' => 'Club Team'],
            ['name' => 'club team create',  'category' => 'Club Team'],
            ['name' => 'club team edit'  ,  'category' => 'Club Team'],
            ['name' => 'club team delete',  'category' => 'Club Team'],

            ['name' => 'club match read'  ,  'category' => 'Club Match'],
            ['name' => 'club match create',  'category' => 'Club Match'],
            ['name' => 'club match edit'  ,  'category' => 'Club Match'],
            ['name' => 'club match delete',  'category' => 'Club Match'],

            ['name' => 'result read'  ,  'category' => 'Result'],
            ['name' => 'result create',  'category' => 'Result'],
            ['name' => 'result edit'  ,  'category' => 'Result'],
            ['name' => 'result delete',  'category' => 'Result'],

            ['name' => 'user read'  ,  'category' => 'User'],
            ['name' => 'user edit'  ,  'category' => 'User'],

            ['name' => 'popup ad read'  ,  'category' => 'Popup Ad'],
            ['name' => 'popup ad edit'  ,  'category' => 'Popup Ad'],

        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission['name']],[
                'name' => $permission['name'],
                'category' => $permission['category'],
            ]);
        }
    }
}
