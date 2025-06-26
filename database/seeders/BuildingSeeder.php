<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BuildingSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $buildings = [
      'Büro und Gewerbehaus Binzstrasse',
      'Gesamtsanierung Gebäude Q',
      'Gesamtsanierung Hauptbahnhof Südtrakt',
      'Guggach Siedlung Hofwiesenstrasse',
      'Haus im Garten',
      'Hochhausensemble WolkenWerk',
      'Kongresshaus und Tonhalle',
      'Kreislaufhaus Herbstweg',
      'Musikpavillon Sihlhölzli',
      'Neubau Universitäts-Kinderspital',
      'Provisorische Schulbauten',
      'Rathaus Kirche Hard',
      'Sanierung Hochhaus Herdern',
      'Schulanlage Allmend',
      'Wohnsiedlung Im Birkenhof',
      'Wohnüberbauung Klopstock',
    ];

    foreach ($buildings as $title) {
      $slug = Str::slug($title);
      $shortTitle = Str::limit($title, 15);
      $lat = fake()->latitude(47.35, 47.45); // Around Zurich
      $long = fake()->longitude(8.45, 8.65); // Around Zurich
      $maps = 'https://maps.google.com/?q=' . $lat . ',' . $long;

      DB::table('buildings')->insert([
        'slug' => $slug,
        'title' => $title,
        'lat' => $lat,
        'long' => $long,
        'maps' => $maps,
      ]);
    }
  }
}
