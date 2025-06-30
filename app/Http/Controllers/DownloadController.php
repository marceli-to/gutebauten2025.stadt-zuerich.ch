<?php
namespace App\Http\Controllers;
use App\Exports\CommentsExport;
use App\Exports\VotesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
  public function comments()
  {
    $timestamp = date('d.m.Y', time());
    return Excel::download(new CommentsExport, 'gute-bauten-2025-kommentare-'.$timestamp.'-'.\Str::random(8).'.xlsx');
  }

  public function votes()
  {
    $timestamp = date('d.m.Y', time());
    return Excel::download(new VotesExport, 'gute-bauten-2025-stimmen-'.$timestamp.'-'.\Str::random(8).'.xlsx');
  }
} 
