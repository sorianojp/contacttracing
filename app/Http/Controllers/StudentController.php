<?php

namespace App\Http\Controllers;
use App\Grade;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => [
            'create', 'store'
        ]]);
    }

    public function index()
    {
        $students = Student::latest()->paginate(5);
        return view('students.index',compact('students'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $grades = Grade::all();
        return view('students.create', compact('grades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'grade_id' => 'required',
            'lastname' => 'required',
            'firstname' => 'required',
            'mi' => 'required',
            'address' => 'required',
            'email' => 'required',
            'contactno' => 'required',
            'image' => 'required'
        ]);

        $input = $request->all();

        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $imageName = uniqid() . '.png';

        $imageFullPath = "images/".$imageName;

        Storage::disk('local')->put("public/".$imageFullPath, $image_base64 );
        $input['image'] = "$imageFullPath";


        $student = Student::create($input);
        return redirect()->route('guardianscreate', $student->id)->with('success','Success! Now Enter The Details of Your Guardian');
    }
}
