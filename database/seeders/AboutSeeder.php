<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'category' => 'Academic Education',
            'title' => 'Bachelor of Science in Nursing',
            'description' => 'Graduated with honors, focusing on critical care and patient safety.',
            'start_date' => '2018-09-01',
            'end_date' => '2022-06-01',
            'is_showcased' => true,
        ]);

        About::create([
            'category' => 'Academic Education',
            'title' => 'Diploma in Nursing',
            'description' => 'Completed a comprehensive diploma program covering fundamental nursing skills.',
            'start_date' => '2015-09-01',
            'end_date' => '2018-06-01',
            'is_showcased' => false,
        ]);

        About::create([
            'category' => 'Experience',
            'title' => 'Registered Nurse at City Hospital',
            'description' => 'Provided direct patient care in the medical-surgical unit, managed patient medications, and collaborated with the healthcare team.',
            'start_date' => '2022-08-01',
            'is_showcased' => true,
        ]);

        About::create([
            'category' => 'Experience',
            'title' => 'Nurse Intern at Community Clinic',
            'description' => 'Assisted with patient intake, vital signs monitoring, and health education under the supervision of senior nurses.',
            'start_date' => '2021-06-01',
            'end_date' => '2021-12-31',
            'is_showcased' => false,
        ]);

        About::create([
            'category' => 'Certifications',
            'title' => 'Basic Life Support (BLS)',
            'description' => 'Certified by the American Heart Association.',
            'start_date' => '2022-07-01',
            'is_showcased' => true,
        ]);

        About::create([
            'category' => 'Certifications',
            'title' => 'Advanced Cardiovascular Life Support (ACLS)',
            'description' => 'Certified by the American Heart Association.',
            'start_date' => '2023-01-15',
            'is_showcased' => true,
        ]);

        About::create([
            'category' => 'Non-Formal Education',
            'title' => 'Seminar on Palliative Care',
            'description' => 'Attended a seminar on providing compassionate care for patients with life-limiting illnesses.',
            'start_date' => '2023-05-20',
            'is_showcased' => false,
        ]);

        About::create([
            'category' => 'Non-Formal Education',
            'title' => 'Workshop on Infection Control',
            'description' => 'Participated in a hands-on workshop to learn the latest best practices in infection control and prevention.',
            'start_date' => '2023-03-10',
            'is_showcased' => false,
        ]);

        About::create([
            'category' => 'Non-Formal Education',
            'title' => 'Online Course: Pediatric Advanced Life Support (PALS)',
            'description' => 'Completed an online certification course for pediatric emergency care.',
            'start_date' => '2023-02-01',
            'end_date' => '2023-02-28',
            'is_showcased' => false,
        ]);
    }
}
