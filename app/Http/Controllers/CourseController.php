<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\UserCourse;
use Illuminate\Http\Request;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $courses = Course::select(
            'courses.id',
            'courses.name',
            'courses.video',
            'courses.description',
            'users_courses.user_id'
        )->leftJoin('users_courses', 'users_courses.course_id', '=', 'courses.id')
        ->groupBy('courses.name')->get();
  
        return view('welcome', [
            'courses' => $courses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all() ;
        $course = new Course();
        $course->create($data);
        
        return view('welcome');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function subscribe(Request $request)
    {
        //
        $data = $request->all() ;
        $course = new UserCourse();
        $course->create($data);
        
        return $this->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function unsubscribe(Request $request)
    {
        //
        $data = $request->all();
        $user_course = UserCourse::where([
            'course_id' => $data['course_id'],
            'user_id' => $data['user_id']
            ])->first();
        $user_course->delete();
        return $this->index();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
