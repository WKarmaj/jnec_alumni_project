<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\department;

use App\Models\programme;

use Illuminate\Support\Facades\DB;

class ViewAlumniController extends Controller
{
    public function find(Request $request)
    {
        $name = $request->input('search');
        $programme = $request->input('programme');
        $department = $request->input('department');
        $year = $request->input('year');
    
        $query = DB::table('users')
            ->where('name', 'LIKE', '%'.$name.'%')
            ->when($programme, function ($query, $programme) {
                return $query->where('programme', $programme);
            })
            ->when($department, function ($query, $department) {
                return $query->where('department', $department);
            })
            ->when($year, function ($query, $year) {
                return $query->where('year', $year);
            })
            ->get();
    
        return view('admin.view_details', ['query' => $query]);
    }
    
    
}


