<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CommentSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $buildingIds = DB::table('buildings')->pluck('id')->toArray();
    $germanComments = [
      'Sehr gelungenes Projekt!',
      'Architektonisch ein Highlight.',
      'Funktional, aber etwas langweilig.',
      'Ich finde die Fassadengestaltung sehr schön.',
      'Nicht mein Geschmack, aber solide Arbeit.',
      'Tolles Beispiel für nachhaltiges Bauen.',
      'Zu viel Beton, zu wenig Grünflächen.',
      'Ein Gewinn für das Quartier.',
      'Sehr innovativ umgesetzt.',
      'Modern und offen – gefällt mir.',
      'Erinnert an ältere Bauten – charmant.',
      'Die Proportionen wirken etwas unharmonisch.',
      'Spannender Nutzungsmix!',
      'Könnte mehr Aufenthaltsqualität bieten.',
      'Die Farbwahl überzeugt mich nicht ganz.',
      'Ein mutiger Entwurf!',
      'Gefällt mir besonders bei Nacht.',
      'Wirklich gut in den Kontext eingefügt.',
      'Die Materialien wirken hochwertig.',
      'Ich hätte mir mehr Fenster gewünscht.',
      'Endlich mal etwas anderes!',
      'Gefällt mir gar nicht.',
      'Zukunftsweisende Architektur!',
      'Sehr pragmatisch gebaut.',
      'Das Dach ist mein Lieblingsdetail.',
    ];

    $comments = [];

    foreach ($buildingIds as $buildingId) {
      $numComments = rand(5, 50);

      for ($i = 0; $i < $numComments; $i++) {
        $text = fake()->randomElement($germanComments);
        // Add some variety with additional phrases
        if (rand(0, 3) === 0) {
          $text .= ' ' . fake()->randomElement([
            'Ich bin gespannt, wie es sich entwickelt.',
            'Man sollte es sich mal vor Ort ansehen.',
            'Da steckt viel Arbeit drin.',
            'So etwas sieht man selten in der Stadt.',
            'Mehr davon!',
          ]);
        }

        $comments[] = [
          'building_id' => $buildingId,
          'comment' => Str::limit($text, 250),
          'published' => true,
          'created_at' => \Carbon\Carbon::now()->subDays(rand(0, 90))->subMinutes(rand(0, 1440)),
          'updated_at' => now(),
        ];
      }
    }

    // Insert in chunks
    foreach (array_chunk($comments, 500) as $chunk) {
      DB::table('comments')->insert($chunk);
    }
  }
}
