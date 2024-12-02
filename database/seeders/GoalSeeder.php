<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import DB facade

class GoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('goals')->insert([ // Insert example goals
            [
                'goal_name' => 'Leer Laravel',
                'goal_description' => 'Voltooi de Laravel-documentatie en bouw een klein project.',
                'target_date' => '2024-12-31',
                'user_id' => 1, // Assuming user with ID 1 exists
            ],
            [
                'goal_name' => 'Fit worden',
                'goal_description' => 'Minimaal 3 keer per week sporten en gezonder eten.',
                'target_date' => '2024-06-30',
                'user_id' => 1, // Assuming user with ID 1 exists
            ],
            [
                'goal_name' => 'Engels verbeteren',
                'goal_description' => 'Verbeter cijfer voor Engels.',
                'target_date' => '2024-12-31',
                'user_id' => 1, // Assuming user with ID 1 exists
            ],
            [
                'goal_name' => 'Programmeren leren',
                'goal_description' => 'Voltooi een cursus Python.',
                'target_date' => '2024-05-15',
                'user_id' => rand(1, 39),
            ],
            [
                'goal_name' => 'Gezond koken',
                'goal_description' => 'Leer 10 nieuwe gezonde recepten.',
                'target_date' => '2024-07-20',
                'user_id' => rand(1, 39),
            ],
            [
                'goal_name' => 'Boek lezen',
                'goal_description' => 'Lees 5 boeken dit jaar.',
                'target_date' => '2024-12-31',
                'user_id' => rand(1, 39),
            ],
            [
                'goal_name' => 'Meditatie beoefenen',
                'goal_description' => 'Mediteer elke dag 10 minuten.',
                'target_date' => '2024-08-01',
                'user_id' => rand(1, 39),
            ],
            [
                'goal_name' => 'Fietsen',
                'goal_description' => 'Fiets 500 km dit jaar.',
                'target_date' => '2024-09-30',
                'user_id' => rand(1, 39),
            ],
            [
                'goal_name' => 'Vrienden ontmoeten',
                'goal_description' => 'Organiseer maandelijks een vriendenbijeenkomst.',
                'target_date' => '2024-10-15',
                'user_id' => rand(1, 39),
            ],
            [
                'goal_name' => 'Tuinieren',
                'goal_description' => 'Plant een groentetuin.',
                'target_date' => '2024-04-30',
                'user_id' => rand(1, 39),
            ],
            [
                'goal_name' => 'Fotografie leren',
                'goal_description' => 'Voltooi een online fotografie cursus.',
                'target_date' => '2024-11-20',
                'user_id' => rand(1, 39),
            ],
            [
                'goal_name' => 'Nieuwe taal leren',
                'goal_description' => 'Leer Spaans op een basisniveau.',
                'target_date' => '2024-12-31',
                'user_id' => rand(1, 39),
            ],
            [
                'goal_name' => 'Vrijwilligerswerk',
                'goal_description' => 'Doe 20 uur vrijwilligerswerk.',
                'target_date' => '2024-06-15',
                'user_id' => rand(1, 39),
            ],
            [
                'goal_name' => 'Kunst maken',
                'goal_description' => 'Maak 10 schilderijen dit jaar.',
                'target_date' => '2024-12-31',
                'user_id' => rand(1, 39),
            ],
            [
                'goal_name' => 'Reizen',
                'goal_description' => 'Bezoek 3 nieuwe landen.',
                'target_date' => '2024-09-01',
                'user_id' => rand(1, 39),
            ],
            [
                'goal_name' => 'Gezondheidscheck',
                'goal_description' => 'Maak een jaarlijkse gezondheidscheck.',
                'target_date' => '2024-05-01',
                'user_id' => rand(1, 39),
            ],
            [
                'goal_name' => 'Sparen',
                'goal_description' => 'Bespaar 1000 euro dit jaar.',
                'target_date' => '2024-12-31',
                'user_id' => rand(1, 39),
            ],
            [
                'goal_name' => 'Mindfulness',
                'goal_description' => 'Volg een mindfulness cursus.',
                'target_date' => '2024-07-15',
                'user_id' => rand(1, 39),
            ],
            [
                'goal_name' => 'Sporten',
                'goal_description' => 'Doe mee aan een sportteam.',
                'target_date' => '2024-08-30',
                'user_id' => rand(1, 39),
            ],
            [
                'goal_name' => 'Koken',
                'goal_description' => 'Leer 5 nieuwe kooktechnieken.',
                'target_date' => '2024-11-10',
                'user_id' => rand(1, 39),
            ],
            [
                'goal_name' => 'Bloggen',
                'goal_description' => 'Start een blog en schrijf 10 artikelen.',
                'target_date' => '2024-12-31',
                'user_id' => rand(1, 39),
            ],
            [
                'goal_name' => 'Zwemmen',
                'goal_description' => 'Zwem elke week 2 keer.',
                'target_date' => '2024-06-30',
                'user_id' => rand(1, 39),
            ],
            [
                'goal_name' => 'Duurzaam leven',
                'goal_description' => 'Verminder plastic gebruik met 50%.',
                'target_date' => '2024-12-31',
                'user_id' => rand(1, 39),
            ],
        ]);
    }
}
