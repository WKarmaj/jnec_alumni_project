<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Department;
use App\Models\Programme;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{   
    public function getProgrammeByDepartment($department_id)
{
    $programs = \App\Models\Programme::where('department_id', $department_id)->get(['id', 'programme_name']);
    return response()->json($programs);
}


public function getProgrammes(Request $request, $department_id)
{
    // Fetch the programmes based on the selected department ID
    $programmes = Programme::where('department_id', $department_id)->get(['id', 'programme_name'])->toArray();

    // Return the programmes as a JSON response
    return response()->json($programmes);
}

public function search(Request $request)
{
    $search = $request->input('search');
    $department_id = $request->input('department_id');
    $programme_id = $request->input('programme_id');
    $year = $request->input('year');
    $employment_status = $request->input('employment_status');

    // Check if any of the search parameters are present
    if (!$search && !$department_id && !$programme_id && !$year && !$employment_status) {
        if ($request->ajax()) {
            return response()->json([]); // Return an empty JSON response for AJAX requests
        }

        return view('user.view_alumni', [
            'results' => [],
            'search' => $search,
            'department_id' => $department_id,
            'programme_id' => $programme_id,
            'year' => $year,
            'employment_status' => $employment_status,
            'departments' => Department::pluck('department_name', 'id'),
            'programmes' => Programme::pluck('programme_name', 'id'),
        ]);
    }

    $query = DB::table('users')
        ->join('departments', 'users.department_id', '=', 'departments.id')
        ->join('programmes', 'users.programme_id', '=', 'programmes.id')
        ->select('users.*', 'departments.department_name', 'programmes.programme_name');

    if (!empty($department_id)) {
        $query->where('users.department_id', $department_id);
    }

    if (!empty($programme_id)) {
        $query->where('users.programme_id', $programme_id);
    } else if (!empty($department_id)) {
        $programmes = Programme::where('department_id', $department_id)->pluck('id');
        $query->whereIn('users.programme_id', $programmes);
    }

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('users.name', 'like', '%' . $search . '%')
                ->orWhere('users.email', 'like', '%' . $search . '%')
                ->orWhere('users.year', 'like', '%' . $search . '%')
                ->orWhere('users.address', 'like', '%' . $search . '%')
                ->orWhere('users.employment_status', 'like', '%' . $search . '%');
        });
    }

    if (!empty($year)) {
        $query->where('year', $year);
    }

    if (!empty($employment_status)) {
        $query->where('employment_status', $employment_status);
    }

    $results = $query->get();

    if ($request->ajax()) {
        return response()->json($results); // Return the search results as JSON response for AJAX requests
    }

    return view('user.view_alumni', [
        'results' => $results,
        'search' => $search,
        'department_id' => $department_id,
        'programme_id' => $programme_id,
        'year' => $year,
        'employment_status' => $employment_status,
        'departments' => Department::pluck('department_name', 'id'),
        'programmes' => Programme::pluck('programme_name', 'id'),
    ]);
}

    
}
