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
use Carbon\Carbon;

class VotesByBuildingSheet implements FromCollection, WithTitle, WithHeadings, ShouldAutoSize, WithStyles
{
  private $building;

  public function __construct(Building $building)
  {
    $this->building = $building;
  }

  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    $voters = $this->building->voters()->withPivot('voted_at')->get();
    $data = [];
    foreach($voters as $voter)
    {
      $data[] = [
        'Datum' => Carbon::parse($voter->pivot->voted_at)->format('d.m.Y H:i:s'),
        'IP Adresse' => $voter->ip_address,
        'Hash' => $voter->hash
      ];
    }
    return collect($data);
  }

  public function headings(): array
  {
    return [
      'Datum',
      'IP Adresse',
      'Hash'
    ];
  }

  public function title(): string
  {
    return $this->building->title;
  }

  public function styles(Worksheet $sheet)
  {
    return [
      1 => ['font' => ['bold' => true]],
    ];
  }
}