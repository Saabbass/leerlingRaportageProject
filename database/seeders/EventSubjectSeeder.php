<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSubjectSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    \App\Models\Event::create([
      'subject_id' => '5',
      'subject_name' => 'Test Event',
      'start' => today(),
      'end'=> today(),
      'status'=> 'active',
    ]);
  }
}
