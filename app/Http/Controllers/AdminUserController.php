<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\District;
use App\Models\Designation;
use App\Models\Project;
use App\Models\Organization;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::all()->sortBy('name');
        $designations = Designation::all()->sortBy('name');
        $projects = Project::all()->sortBy('name');
        $organizations = Organization::all()->sortBy('name');
        return view('admin.user.create',compact('districts','designations','projects','organizations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo ($request);
        $request->password = bcrypt($request->password);
        // echo ($request->password);
        if($request->role == 4){
            $formFields = $request->validate([
                'name' => 'required|max:255',
                'email'=> ['required', Rule::unique('users','email')],
                'password' => 'required|confirmed|min:6',
                'role' => 'required',
                'phno' => ['required', 'min:10', 'max:10', Rule::unique('users','phno')],
              ]);
              $success = User::create($formFields);
              if(ISSET($success->id)){
                session()->flash('record-created',$request['name']."has been added");
                return redirect('/admin_users');
              }
              else{
                return redirect('/admin_users/create');//add error message here and also in create user blade
              }        
        }
        else{
            $formFields = $request->validate([
                'name' => 'required|max:255',
                'email'=> ['required', Rule::unique('users','email')],
                'password' => 'required|confirmed|min:6',
                'role' => 'required',
                'phno' => ['required', 'min:10', 'max:10', Rule::unique('users','phno')],
                'gender' => 'required',
                'dob' => 'required',
                'addr' => 'required',
                'pincode' => 'required|max:6|min:6',
                'idtype' => 'required',
                'idno' => 'required',
                'ifsccode' => 'required',
                'bankaccno' => 'required',
                'project_id' => 'required',
                'doj' => 'required',
                'organisation_id' => 'required',
                'designation_id' => 'required',
                'category_id' => 'required',
                'district_id' => 'required',
              ]);
              $success = User::create($formFields);
              if(ISSET($success->id)){
                $formFields['user_id'] = $success->id;
                $formFields['addrdistrict'] = $request->addrdistrict;
                $formFields['state'] = $request->state;
                $success = UserInfo::create($formFields);
                session()->flash('record-created',$request['name']."has been added");
                return redirect('/admin_users');
              }
              else{
                return redirect('/admin/user/create');//add error message here and also in create user blade
              }
              //session()->flash('record-created',$request['name']." has been added");
            //   session()->flash('record-created',"ERROR");
            //   return redirect('/admin/user/create');
        }
            // $validator = $request->validate([
            //     'name' => 'required|max:255',
            //     'email'=> 'required|unique:users',
            //     'role' => 'required',
            //     'phno' => 'required',
            // ]);

            // if($validator->fails()){
            //     echo("Email/Phno already exist");
            // }
            // else{
            //     $success = User::create($usertable);
            // echo($success->id);
            // }
            
        
        // $success = User::create($validatedData);
        // $validatedData = $request->validate([
        //     'name' => 'required|max:255',
        // ]);
        // $success = District::create($validatedData);
        // session()->flash('record-created',$request['name']." has been added");
        // return redirect('/admin/district');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $districts = District::all()->sortBy('name');
        $designations = Designation::all()->sortBy('name');
        $projects = Project::all()->sortBy('name');
        $organizations = Organization::all()->sortBy('name');
        return view('admin.user.edit', compact('user','districts','designations','projects','organizations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $userinfo = UserInfo::where('user_id', $id)->first();

        $request->password = bcrypt($request->password);
        //check whether user had entries in userinfo or not. If yes then update else create
        if($userinfo){
            //check whether currently selectde value of role is guest or not. 
            //If yes then simply update User Table.
            //Else update both user table and update UserInfo Table
            if($request->role == 4){
                $formFields = $request->validate([
                    'name' => 'required|max:255',
                    'email'=> 'required',
                    'password' => 'required|confirmed|min:6',
                    'role' => 'required',
                    'phno' => ['required', 'min:10', 'max:10', Rule::unique('users','phno')],
                ]);
                $success = $user->update($request->all());
                if($success){
                    session()->flash('record-updated',$request['name']."has been updated");
                    return redirect('/admin_users');
                }
                else{
                    return redirect('/admin_users/create');//add error message here and also in create user blade
                }
            }
            else{
                $formFields = $request->validate([
                    'name' => 'required|max:255',
                    'email'=> 'required',
                    'password' => 'required|confirmed|min:6',
                    'role' => 'required',
                    'phno' => ['required', 'min:10', 'max:10', Rule::unique('users','phno')],
                    'gender' => 'required',
                    'dob' => 'required',
                    'addr' => 'required',
                    'pincode' => 'required|max:6|min:6',
                    'idtype' => 'required',
                    'idno' => 'required',
                    'ifsccode' => 'required',
                    'bankaccno' => 'required',
                    'project_id' => 'required',
                    'doj' => 'required',
                    'organisation_id' => 'required',
                    'designation_id' => 'required',
                    'category_id' => 'required',
                    'district_id' => 'required',
                ]);
                $success = $user->update($request->all());
                $formFields['addrdistrict'] = $request->addrdistrict;
                $formFields['state'] = $request->state;
                $success = $userinfo->update($request->all());
                if($success){
                    session()->flash('record-updated',$request['name']."has been updated");
                    return redirect('/admin_users');
                }
                else{
                    return redirect('/admin_users/create');//add error message here and also in create user blade
                }   
            }
        }
        else{
            if($request->role == 4){
                $formFields = $request->validate([
                    'name' => 'required|max:255',
                    'email'=> 'required',
                    'password' => 'required|confirmed|min:6',
                    'role' => 'required',
                    'phno' => ['required', 'min:10', 'max:10', Rule::unique('users','phno')],
                ]);
                $success = $user->update($request->all());
                if($success){
                    session()->flash('record-updated',$request['name']."has been updated");
                    return redirect('/admin_users');
                }
                else{
                    return redirect('/admin_users/create');//add error message here and also in create user blade
                }
            }
            else{
                $formFields = $request->validate([
                    'name' => 'required|max:255',
                    'email'=> 'required',
                    'password' => 'required|confirmed|min:6',
                    'role' => 'required',
                    'phno' => ['required', 'min:10', 'max:10', Rule::unique('users','phno')],
                    'gender' => 'required',
                    'dob' => 'required',
                    'addr' => 'required',
                    'pincode' => 'required|max:6|min:6',
                    'idtype' => 'required',
                    'idno' => 'required',
                    'ifsccode' => 'required',
                    'bankaccno' => 'required',
                    'project_id' => 'required',
                    'doj' => 'required',
                    'organisation_id' => 'required',
                    'designation_id' => 'required',
                    'category_id' => 'required',
                    'district_id' => 'required',
                ]);
                // $success = $user->update($request->all());
                // $formFields['addrdistrict'] = $request->addrdistrict;
                // $formFields['state'] = $request->state;
                // $success = $userinfo->update($request->all());
                // if($success){
                //     session()->flash('record-updated',$request['name']."has been updated");
                //     return redirect('/admin_users');
                // }
                // else{
                //     return redirect('/admin_users/create');//add error message here and also in create user blade
                // }   
            }

            // if($request->role == 4){
            //     $formFields = $request->validate([
            //         'name' => 'required|max:255',
            //         'email'=> 'required',
            //         'password' => 'required|confirmed|min:6',
            //         'role' => 'required',
            //         'phno' => ['required', 'min:10', 'max:10', Rule::unique('users','phno')],
            //     ]);
            //     $success = $user->update($request->all());
            //     if($success){
            //         session()->flash('record-updated',$request['name']."has been updated");
            //         return redirect('/admin_users');
            //     }
            //     else{
            //         return redirect('/admin_users/create');//add error message here and also in create user blade
            //     }
            // }
            // else{
            //     $formFields = $request->validate([
            //         'name' => 'required|max:255',
            //         'email'=> 'required',
            //         'password' => 'required|confirmed|min:6',
            //         'role' => 'required',
            //         'phno' => ['required', 'min:10', 'max:10', Rule::unique('users','phno')],
            //         'gender' => 'required',
            //         'dob' => 'required',
            //         'addr' => 'required',
            //         'pincode' => 'required|max:6|min:6',
            //         'idtype' => 'required',
            //         'idno' => 'required',
            //         'ifsccode' => 'required',
            //         'bankaccno' => 'required',
            //         'project_id' => 'required',
            //         'doj' => 'required',
            //         'organisation_id' => 'required',
            //         'designation_id' => 'required',
            //         'category_id' => 'required',
            //         'district_id' => 'required',
            //     ]);
            //     $success = $user->update($request->all());
            //     $formFields['addrdistrict'] = $request->addrdistrict;
            //     $formFields['state'] = $request->state;
            //     $success = $userinfo->update($request->all());
            //     if($success){
            //         session()->flash('record-updated',$request['name']."has been updated");
            //         return redirect('/admin_users');
            //     }
            //     else{
            //         return redirect('/admin_users/create');//add error message here and also in create user blade
            //     }   
            // }  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();// since in migration we have set ondelete(cascade) hence this will delete all datas related to this user from other tables also.
        session()->flash('record-deleted','User Record was Deleted');
        return back();
    }
}
