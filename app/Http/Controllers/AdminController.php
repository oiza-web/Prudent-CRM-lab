<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\Validator;
use App\Company;
use App\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employees.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //     $company = new Company;
    //     $user = new User;
        $companies = Company::all(['id', 'name']);
        $users = User::all(['id', 'name']);

        return view('employees.create', 
            [
                'companies' => $companies,
                'users' => $users
            ]
        );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'company_id'=> 'required|numeric',
            'user_id'=> 'required|numeric'


        ]);

        if ($validator->fails()) {
            return redirect('employee/create')
                     ->withErrors($validator)
                     ->withInput();
        }
        // store each form field in a variable

        $firstName= $request->first_name;
        $lastName= $request->last_name;
        $email= $request->email;
        $phone= $request->phone;
        $companyId= $request->company_id;
        $userId= $request->user_id;

        // save to the database

        $employee = new Employee;
        $employee->first_name = $firstName;
        $employee->last_name = $lastName;
        $employee->email = $email;
        $employee->phone = $phone;
        $employee->company_id = $companyId;
        $employee->user_id = $userId;
       
        $employee->save();

        // Redirect to employee/create
        return redirect('/employee/create')->with('success', 'Employee saved!');
 
        // dd($employee);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employees.show', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $companies = Company::all(['id', 'name']);
        $users = User::all(['id', 'name']);

        return view('employees.edit', 

        [
            'employee' => $employee,
            'companies' => $companies,
            'users' => $users
        ]);

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
        $validator = Validator::make($request->all(),
        [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'company_id'=> 'required|numeric',
            'user_id'=> 'required|numeric'
            
        ]);

        if ($validator->fails()) {
            return redirect('employee/edit')
                     ->withErrors($validator)
                     ->withInput();
        }
        // store each form field in a variable

        $firstName= $request->first_name;
        $lastName= $request->last_name;
        $email= $request->email;
        $phone= $request->phone;
        $companyId= $request->company_id;
        $userId= $request->user_id;


        // save to the database

        $employee = new Employee;
        $employee->first_name = $firstName;
        $employee->last_name = $lastName;
        $employee->email = $email;
        $employee->phone = $phone;
        $employee->company_id = $companyId;
        $employee->user_id = $userId;
       
        $employee->save();

        // Redirect to employee/create
        return redirect('/employee/index')->with('success', 'Employee Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect('/employee/index')->with('success', 'Employee deleted!');
    }
}
