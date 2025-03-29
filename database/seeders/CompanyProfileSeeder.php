<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyProfileSeeder extends Seeder
{
    public function run()
    {
        DB::table('company_profiles')->insert([
            [
                'company_name' => 'Tech Innovators',
                'company_website' => 'https://techinnovators.com',
                'industry' => 'Technology',
                'location' => 'Silicon Valley, CA',
                'employees_count' => 150,
                'logo' => null,
                'about_us' => 'Innovating the future of technology.',
                'contact_email' => 'contact@techinnovators.com',
                'contact_phone' => '+1 123 456 7890',
                'contact_address' => '1234 Innovation Way, Silicon Valley, CA',
                'social_links' => json_encode([
                    'facebook' => 'https://facebook.com/techinnovators',
                    'linkedin' => 'https://linkedin.com/company/techinnovators',
                    'twitter' => 'https://twitter.com/techinnovators',
                    'instagram' => 'https://instagram.com/techinnovators',
                ]),
            ],
            // Add more entries as needed
        ]);
    }
}
