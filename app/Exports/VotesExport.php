<?php
namespace App\Exports;
use App\Models\Building;
use App\Models\Voter;
use App\Exports\Sheets\VotesByBuildingSheet;
use App\Exports\Sheets\VotesSummarySheet; 
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class VotesExport implements WithMultipleSheets
{
  use Exportable;
  
  /**
   * @return array
   */
  public function sheets(): array
  {
    $sheets = []; 

    // Add summary sheet
    $sheets[] = new VotesSummarySheet();

    // Create a sheet per building
    $buildings = Building::with('voters')->orderBy('title')->get();
    foreach($buildings as $building)
    {
      if ($building->voters->count() > 0)
      {
        $sheets[] = new VotesByBuildingSheet($building);
      }
    }
    return $sheets;
  }
}
