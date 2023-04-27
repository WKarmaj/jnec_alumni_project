<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\event;

use App\Models\User;

use App\Models\department;

use App\Models\programme;

use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{
    public function addview()
    {

        return view('admin.add_event');
    }
    public function adduser()
    {
        return view('admin.add_user');
    }
    public function editevent()
    {   
        $editevents = event::all();
        return view('admin.edit_event',compact('editevents'));
    }
    public function add_user(Request $request)
    {
        $data=new user;

        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $password = $request->input('password');
        $data->password = Hash::make($password);
        $data->save();

        return redirect()->back()->with('message','User Uploaded Successfully');
    }
  
    public function upload(Request $request)
    {
        $event=new event;

        $image=$request->file;

        $imagename=time().'.'.$image->getClientoriginalExtension();

        $request->file->move('eventimage',$imagename);

        $event->image=$imagename;

        $event->name=$request->name;

        $event->date=$request->date;

        $event->time=$request->time;

        $event->venue=$request->venue;

        $event->about=$request->about;

        $event->person=$request->person;

        $event->phone=$request->number;

        $event->save();

        return redirect()->back()->with('message','Event Uploaded Successfully');


    }
    public function viewdetails()
    {   $data = user::all(); 

        return view('admin.view_details',compact('data'));
    }
    public function deleteuser ($id)
    {
        $data=user::find($id);

        $data->delete();

        return redirect()->back();
    }
   public function updateevent($id)
   {    
        $events = event::find($id);

        return view('admin.update_event',compact('events'));
   }
   public function editevents(Request $request, $id)
   {
    $events=event::find($id);

    $events->name=$request->name;

    $image=$request->file;

    if($image)
    {

    $imagename=time().'.'.$image->getClientOriginalExtension();

    $request->file->move('eventimage',$imagename);

    $events->image=$imagename;

    }

    $events->date=$request->date;

    $events->time=$request->time;

    $events->venue=$request->venue;

    $events->about=$request->about;

    $events->person=$request->person;

    $events->phone=$request->phone;

    $events->save();

    return redirect()->back();


   }
   public function deleteevents($id)
   {
        $infom=event::find($id);

        $infom->delete();

        return redirect()->back();
   }
   public function editdepartment()
   {
    return view('admin.edit_department');
   }
   public function adddepartment(Request $request)
   {
        $department=new department;

        $department->department_name=$request->department_name;

        $department->save();

         return redirect()->back();

   }
   public function addprogramme()
   {
    return view('admin.add_programme');
   }
    
   public function uploadprogramme(Request $request)
   {
        $programme = new programme;

        $programme->programme_name=$request->programme_name;

        $programme->save();

        return redirect()->back();
   }
 

}
