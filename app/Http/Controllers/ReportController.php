<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(Request $request){

        $sort = $request->input('sort');
        if ($sort != 'asc' && $sort != 'desc'){
            $sort = 'desc';
        }

        $status = $request->input('status');
        $validate = $request->validate([
            'status' => "exists:statuses,id"
        ]);

        if($validate)
        {
            $reports = Report::where('status_id', $status)
                ->where('user_id', Auth::user()->id)
                ->orderBy('created_at', $sort)
                ->paginate(8);
        }
        else{
            $reports = Report::where('user_id', Auth::user()->id)
                ->orderBy('created_at', $sort)
                ->paginate(8);
        }
        $statuses = Status::all();

        return view('report.index', compact('reports', 'statuses', 'sort', 'status'));
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
        if(Auth::user()->id === $report->user_id)
        {
            return view('report.edit', compact('report')); 
        }
        else
        {
            abort(403, 'у вас нет прав на редактирование этого заявления.');
        }
       
    }
    public function update(Request $request, Report $report){
        $data = $request->validate([
            'number' => 'string|required|max:255',
            'description' => 'string|required'
        ]); //валидация
        $data['user_id'] = Auth::user()->id;
        $data['status_id'] = 1;
        $report->update($data); //создаем новую запись в БД
        return redirect()->route('report.index');
    }
}
