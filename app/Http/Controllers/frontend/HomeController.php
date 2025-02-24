<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){

        $teachers= DB::table('teachers')->count();
        $courses= DB::table('courses')->count();

        $teacher_Details = DB::table('teacher_details')
                        ->join('teachers', 'teacher_details.teacher_id', '=', 'teachers.id')
                        ->join('schedules', 'teacher_details.schedule_id', '=', 'schedules.id')
                        ->join('majors', 'teacher_details.major_id', '=', 'majors.id')
                        ->join('courses', 'teacher_details.course_id', '=', 'courses.id')
                        ->select('teacher_details.*',
                                'teachers.teacher_code as t_code', 
                                'teachers.teacher_name as t_name', 
                                'schedules.schedule_day as s_day',
                                'majors.major_type as m_type',
                                'courses.course_name as c_name')
                        ->get();
        
        return view('frontend.home.index')
                ->with('teacher_Details',$teacher_Details)
                ->with('teachers',$teachers)
                ->with('courses',$courses);
    }
}
