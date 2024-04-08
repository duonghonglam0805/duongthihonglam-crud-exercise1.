<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $students;
    public function __construct()
    {
        $this->students = new Student();
    }
    public function index()
    {
        $listStudents = $this->students->getAllStudents();
        return view('listStudents', compact('listStudents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('add');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'phone' => 'required|unique:phone',
        // ], [
        //     'name.required' => 'Bắt buộc nhập tên',
        //     'phone.required' => 'Bắt buộc nhập số điện thoại',
        //     'phone.unique' => 'Số điện thoại này đã tồn tại',
        // ]);
        
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
        ];
        $this->students->create($data);
        return redirect(route('list'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $student =  $this->students->getOneStudent($id);
        return view('edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = $request->id;
        $name = $request->name;
        $phone = $request->phone;
        $data = [
            'name' => $name,
            'phone' => $phone
        ];
        $this->students->updatestudent($id, $data);
        return redirect(route('list'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->students->deleteStudent($id);
        return redirect(route('list'));
    }
}