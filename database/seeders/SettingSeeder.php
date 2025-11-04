<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::updateOrCreate(
            ['key' => 'contact_email'],
            ['value' => 'anwarfaishal86@gmail.com']
        );

        Setting::updateOrCreate(
            ['key' => 'linkedin_url'],
            ['value' => 'https://www.linkedin.com/in/saskia-mariska']
        );

        Setting::updateOrCreate(
            ['key' => 'instagram_url'],
            ['value' => 'https://www.instagram.com/saskiamariska']
        );

        Setting::updateOrCreate(
            ['key' => 'facebook_url'],
            ['value' => 'https://www.facebook.com/saskia.mariska']
        );
    }
}
