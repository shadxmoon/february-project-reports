<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $reports = Report::with(['user', 'status'])->get();
        $statuses = Status::all();

        return view('admin.index', compact('reports', 'statuses'));
    }

    public function statusUpdate(Request $request, Report $report)
    {
        $data = $request->validate([
            'status_id' => 'required|exists:statuses,id',
        ]);
        if($report->status->id != 1){
          return redirect()->route('admin.index')->with('error', 'Статус можно изменить только у новых заявлений.');  
        }
        $report->update([
                'status_id' => $data['status_id'],
            ]);
            return redirect()->route('admin.index')->with('success', 'Статус заявления успешно обновлен.');
    }
}
