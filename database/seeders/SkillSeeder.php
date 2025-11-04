<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skill::create([
            'name' => 'Patient Assessment',
            'image' => 'https://res.cloudinary.com/dmmbiqyub/image/upload/v1720242039/portfolio-saskia/placeholder-5_b1b1b1.png',
            'is_showcased' => true,
        ]);

        Skill::create([
            'name' => 'Wound Care',
            'image' => 'https://res.cloudinary.com/dmmbiqyub/image/upload/v1720242039/portfolio-saskia/placeholder-6_b1b1b1.png',
            'is_showcased' => true,
        ]);

        Skill::create([
            'name' => 'Medication Administration',
            'image' => 'https://res.cloudinary.com/dmmbiqyub/image/upload/v1720242039/portfolio-saskia/placeholder-7_b1b1b1.png',
            'is_showcased' => true,
        ]);

        Skill::create([
            'name' => 'IV Therapy',
            'image' => 'https://res.cloudinary.com/dmmbiqyub/image/upload/v1720242039/portfolio-saskia/placeholder-8_b1b1b1.png',
            'is_showcased' => true,
        ]);

        Skill::create([
            'name' => 'Electronic Health Records (EHR)',
            'image' => 'https://res.cloudinary.com/dmmbiqyub/image/upload/v1720242039/portfolio-saskia/placeholder-9_b1b1b1.png',
            'is_showcased' => true,
        ]);

        Skill::create([
            'name' => 'Patient Education',
            'image' => 'https://res.cloudinary.com/dmmbiqyub/image/upload/v1720242039/portfolio-saskia/placeholder-12_b1b1b1.png',
            'is_showcased' => true,
        ]);

        Skill::create([
            'name' => 'Critical Care',
            'image' => 'https://res.cloudinary.com/dmmbiqyub/image/upload/v1720242039/portfolio-saskia/placeholder-13_b1b1b1.png',
            'is_showcased' => false,
        ]);

        Skill::create([
            'name' => 'Team Collaboration',
            'image' => 'https://res.cloudinary.com/dmmbiqyub/image/upload/v1720242039/portfolio-saskia/placeholder-14_b1b1b1.png',
            'is_showcased' => false,
        ]);
    }
}