<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superUser = new User();
        $superUser->name = '阿泥';
        $superUser->image = 'https://instagram.frmq2-2.fna.fbcdn.net/v/t51.2885-19/s150x150/104462271_711458869632845_4620254332450582741_n.jpg?_nc_ht=instagram.frmq2-2.fna.fbcdn.net&_nc_ohc=0xGUAb_VsNsAX8ksAHV&oh=9e3222a0c262945381f0bb550fee923e&oe=5F4BF0BC';
        $superUser->email = 'dy99520@gmail.com';
        $superUser->password = bcrypt('yue123456');
        $superUser->title = 'Developer';
        $superUser->company = '靜宜大學';
        $superUser->department = '資訊工程學系';
        $superUser->introduction = 'Be a programmer, not a coder.';
        $superUser->facebook = 'https://www.facebook.com/yue99520/';
        $superUser->github = 'https://github.com/yue99520';
        $superUser->instagram = 'https://www.instagram.com/dy99520/';
        $superUser->save();
    }
}
