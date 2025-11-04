<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Experience;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Experience::create([
            'title' => 'Clinical Rotation at General Hospital',
            'overview' => 'Completed a 3-month clinical rotation at a busy general hospital, gaining experience in various departments including emergency, pediatrics, and surgery.',
            'image' => 'https://res.cloudinary.com/dmmbiqyub/image/upload/v1720242039/portfolio-saskia/placeholder-3_b1b1b1.png',
            'slug' => Str::slug('Clinical Rotation at General Hospital'),
            'is_featured' => true,
            'category' => 'Clinical',
        ]);

        Experience::create([
            'title' => 'Community Health Volunteer',
            'overview' => 'Volunteered at a community health clinic, providing basic health screenings, health education, and support to underserved populations.',
            'image' => 'https://res.cloudinary.com/dmmbiqyub/image/upload/v1720242039/portfolio-saskia/placeholder-4_b1b1b1.png',
            'slug' => Str::slug('Community Health Volunteer'),
            'is_featured' => false,
            'category' => 'Volunteer',
        ]);

        Experience::create([
            'title' => 'Pediatric Care Externship',
            'overview' => 'Assisted in providing care to pediatric patients, including administering medications, monitoring vital signs, and offering emotional support to children and their families.',
            'image' => 'https://res.cloudinary.com/dmmbiqyub/image/upload/v1720242039/portfolio-saskia/placeholder-5_b1b1b1.png',
            'slug' => Str::slug('Pediatric Care Externship'),
            'is_featured' => true,
            'category' => 'Clinical',
        ]);

        Experience::create([
            'title' => 'Surgical Nurse Training Program',
            'overview' => 'Participated in a specialized training program for surgical nurses, learning about pre-operative, intra-operative, and post-operative care.',
            'image' => 'https://res.cloudinary.com/dmmbiqyub/image/upload/v1720242039/portfolio-saskia/placeholder-10_b1b1b1.png',
            'slug' => Str::slug('Surgical Nurse Training Program'),
            'is_featured' => false,
            'category' => 'Training',
        ]);

        Experience::create([
            'title' => 'Geriatric Care Assistant',
            'overview' => 'Provided compassionate care to elderly residents in a long-term care facility, assisting with daily activities and monitoring health conditions.',
            'image' => 'https://res.cloudinary.com/dmmbiqyub/image/upload/v1720242039/portfolio-saskia/placeholder-11_b1b1b1.png',
            'slug' => Str::slug('Geriatric Care Assistant'),
            'is_featured' => false,
            'category' => 'Clinical',
        ]);
    }
}