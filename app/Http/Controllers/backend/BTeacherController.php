<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

class BTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers=Teacher::all();
        return view('backend.teacher.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $code="teachercode";
        $current_date=now();
        $fmt_date=$current_date->format('YmdHis');
        //genderate radom
        $generatecode=strtoupper(substr(md5(uniqid($code,true)),0,6));
        $teachercode='TCH'.$fmt_date."-".$generatecode;
        return view('backend.teacher.create',compact('teachercode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validated_teacher = $request->validate([
        //     'teacher_name' => 'required|string|max:10',
        //     'teacher_dob' => 'required',
        //     'teacher_email' => 'required',
        //     'teacher_phone' => 'required|mix:9|max:10',
        //     'teacher_profile' => 'required',
        // ],[
        //     'teacher_name.required'=>'Please Input Data',
        //     'teacher_dob.required'=>'Please Input Data',
        //     'teacher_email.required'=>'Please Input Data',
        //     'teacher_phone.required'=>'Please Input Data',
        //     'teacher_phone.min'=>'Please Input Data more than 9 Number',
        //     'teacher_phone.max'=>'Please Input Data more than 9 Number',
        //     'teacher_profile.required'=>'Please Input Data'
            
        // ]);

        // $dobString=$request->teacher_dob;
        // $fmt_teacher_dob=Carbon::createFromFormat('d/m/Y',$dobString)->format('Y-m-d');

        if($request->teacher_photo){
            $image_name = $request->file('teacher_photo');

            $input['teacher_photo'] = time().'.'.$image_name->getClientOriginalExtension();

            $destinationPath = public_path('/uploads/thumbnail/teacher');
            $imgFile = Image::read($image_name->getRealPath());
            $imgFile->resize(150, 150, function ($constraint) {
               $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['teacher_photo']);
            $destinationPath = public_path('/uploads/teacher');
            $image_name->move($destinationPath, $input['teacher_photo']);
        }

        Teacher::create([
            'teacher_code'=>$request->teacher_code,
            'teacher_name'=>$request->teacher_name,
            'gender_id'=>$request->gender_id,
            'teacher_dob'=>$request->teacher_dob,
            'teacher_email'=>$request->teacher_email,
            'teacher_phone'=>$request->teacher_phone,
            'teacher_profile'=>$request->teacher_profile,
            'teacher_photo'=>$input['teacher_photo'],
        ]);
        return redirect('/teacher')->with('flash_message','Teacher Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teachers=Teacher::find($id);
        return view('backend.teacher.edit')
        ->with('teachers',$teachers);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $teachers=Teacher::find($id);
        $input=$request->all();
        $teachers->update($input);

        return redirect('/teacher')
        ->with('flash_message','Teacher Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Teacher::destroy($id);
        return redirect('/teacher')
        ->with('flash_message','Teacher Delete!');
    }
}
