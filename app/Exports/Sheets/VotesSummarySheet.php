<?php
namespace App\Exports\Sheets;
use App\Models\Building;
use App\Models\Voter;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class VotesSummarySheet implements FromCollection, WithTitle, WithHeadings, ShouldAutoSize, WithStyles
{
  public function __construct()
  {
  }

  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    $buildings = Building::withCount('voters')->orderBy('title')->get();

    $data = [];
    $totalVotes = 0;
    foreach($buildings as $b)
    { 
      $data[] = [
        'Objekt' => $b->title,
        'Stimmen' => $b->voters_count
      ];
      $totalVotes += $b->voters_count;
    }

    $data[] = [
      'Objekt' => '',
      'Stimmen' => ''
    ];

    $data[] = [
      'Objekt' => 'Total abgegebene Stimmen',
      'Stimmen' => $totalVotes
    ];

    return collect($data);
  }

  public function headings(): array
  {
    return [
      'Objekt',
      'Stimmen',
    ];
  }

  public function title(): string
  {
    return 'Zusammenfassung';
  }

  public function styles(Worksheet $sheet)
  {
    return [
      1 => ['font' => ['bold' => true]],
      24 => ['font' => ['bold' => true]],
    ];
  }
}