<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function index(){
        $reports = Report::with('status')->get();
        return view('report.index', compact('reports'));
    }
    public function destroy(Report $report){
        $report->delete();
        return redirect()->back();
    }
    public function store(Request $request, Report $report){
        $data = $request->validate(
            [
                'number'=>'string',
                'description'=>'string'
            ]
        );
        Report::create($data);
        return redirect('reports');
    }
    public function edit(Request $request, Report $report){
        return view('report.edit', compact('report'));
    }
    public function update(Request $request, Report $report){
        $data = $request->validate([
            'number' => 'string|required|max:255',
            'description' => 'string|required'
        ]); //валидация
        $report->update($data); //создаем новую запись в БД
        return redirect()->route('report.index');
    }
}
