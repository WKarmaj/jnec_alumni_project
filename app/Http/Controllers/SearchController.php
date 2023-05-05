<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
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
                'programme' => $programme,
                'department' => $department,
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
                  ->orWhere('programme', 'like', '%'.$search.'%')
                  ->orWhere('department', 'like', '%'.$search.'%')
                  ->orWhere('employment_status', 'like', '%'.$search.'%');
            });
        }
        
        if (!empty($programme)) {
            $query->where('programme', $programme);
        }
        
        if (!empty($department)) {
            $query->where('department', $department);
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
            'programme' => $programme,
            'department' => $department,
            'year' => $year,
            'employment_status' => $employment_status
        ]);
    }
    
    
    



}
