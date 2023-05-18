<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Programme;

use App\Models\Department;

use App\Models\User;

class ProgramController extends Controller
{   
    public function addprogramme()
    {
        $departments = Department::all(); // Fetch all departments

        return view('admin.add_programme', compact('departments'));
    }

    public function uploadprogramme(Request $request)
    {
        $programme = new Programme;

        $programme->programme_name = $request->programme_name;
        $programme->department_id = $request->department_id; // Assign the selected department ID

        $programme->save();

        return redirect()->back()->with('success', 'Programme added successfully.');
    }
 
   
}
