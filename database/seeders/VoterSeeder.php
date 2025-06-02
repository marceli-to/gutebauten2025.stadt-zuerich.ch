<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoterSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $voters = [];

    for ($i = 0; $i < 2000; $i++) {
      $ip = fake()->ipv4();
      $ipHash = md5($ip);
      $fingerprintHash = md5(fake()->uuid());

      $voters[] = [
        'ip_address' => $ipHash,
        'hash' => $fingerprintHash,
      ];
    }

    // Insert in batches for performance
    foreach (array_chunk($voters, 500) as $batch) {
      DB::table('voters')->insert($batch);
    }
  }
}
