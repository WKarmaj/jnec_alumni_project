<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Department;
use App\Models\Programme;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{   
    public function getProgrammes(Request $request, $department_id)
    {
        // Fetch the programmes based on the selected department ID
        $programmes = Programme::where('department_id', $department_id)->pluck('name', 'id');

        // Return the programmes as a JSON response
        return response()->json($programmes);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $programme = $request->input('programme');
        $department = $request->input('department');
        $year = $request->input('year');
        $employment_status = $request->input('employment_status');
        
        // Check if any of the search parameters are present
        if (!$search && !$programme && !$department && !$year && !$employment_status) {
            return view('user.view_alumni', [
                'results' => [],
                'search' => $search,
                'department' => $department,
                'programme' => $programme,
                'year' => $year,
                'employment_status' => $employment_status
            ]);
        }
        
        $query = DB::table('users');
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%'.$search.'%')
                  ->orWhere('email', 'like', '%'.$search.'%')
                  ->orWhere('phone', 'like', '%'.$search.'%')
                  ->orWhere('year', 'like', '%'.$search.'%')
                  ->orWhere('address', 'like', '%'.$search.'%')
                  ->orWhere('department', 'like', '%'.$search.'%')
                  ->orWhere('programme', 'like', '%'.$search.'%') 
                  ->orWhere('employment_status', 'like', '%'.$search.'%');
            });
        }
        
        if (!empty($department)) {
            // get the department ID based on the selected department name
            $department_id = DB::table('departments')->where('department_name', $department)->value('id');
            // add a condition to select the program that belongs to the selected department
            $query->where('department_id', $department_id);
        }
        

        
        if (!empty($year)) {
            $query->where('year', $year);
        }
        
        if (!empty($employment_status)) {
            $query->where('employment_status', $employment_status);
        }
    
        $results = $query->get();
        
        return view('user.view_alumni', [
            'results' => $results,
            'search' => $search,
            'department' => $department,
            'programme' => $programme,
            'year' => $year,
            'employment_status' => $employment_status
        ]);
    }
    public function getProgrammeByDepartment($department_id)
    {
    $programs = \App\Models\Programme::where('department_id', $department_id)->get();
    return response()->json($programs);
    }


}
