<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB; // Corrected import
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            'Nederlands', 'Aardrijkskunde', 'Natuurkunde', 'Beeldende vorming',
            'Engels', 'Geschiedenis', 'Scheikunde', 'Muziek',
            'Duits', 'Maatschappijleer', 'Wiskunde', 'Kunst algemeen (KUA)',
            'Frans', 'Levensbeschouwing', 'Biologie', 'Lichamelijke opvoeding',
            'Spaans', 'Filosofie', 'ICT', 'Culturele kunstzinnige vorming (CKV)',
            'Chinees', 'Algemene economie', 'Informatica',
            'Klassieke talen', 'Bedrijfseconomie', 'Techniek',
            'Verzorging', 'ANW'
        ];

        foreach ($subjects as $subject) {
            DB::table('subjects')->insert([
                'subject_name' => $subject,
                'description' => 'Random description for ' . $subject,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
