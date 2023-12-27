<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseCategory;

class CourseController extends Controller
{
    public function index(){
        $courseCategory = CourseCategory::all();
        return view('admin.course.index', compact('courseCategory'));
    }
    public function detail(string $idCourseCategory){
        $course = Course::where('category_id', $idCourseCategory)->get();
        $courseCategory = CourseCategory::find($idCourseCategory);
        return view('admin.course.detail', compact('course', 'courseCategory'));
    }
    public function create(string $idCourseCategory){
        $courseCategory = CourseCategory::find($idCourseCategory);
        return view('admin.course.create', compact('courseCategory'));
    }

    public function store(Request $request){
        $request->validate([
            'category_id' => 'required',
            'courseName' => 'required|string|max:255',
            'namaPemateri' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'file' => 'required|mimes:jpg,jpeg,png,gif,svg,ico,pdf',
            'sertifikat' => 'required|mimes:jpg,jpeg,png,gif,svg,ico,pdf',
        ]);

        $filenameExt = $request->file('file')->getClientOriginalExtension();
        $filename = pathinfo($filenameExt, PATHINFO_EXTENSION);
        $extension = $request->file('file')->getClientOriginalExtension();
        $filenameSave = $filename.'_'.time().'.'.$extension;
        $request->file('file')->storeAs('public/coursephoto', $filenameSave);

        $sertifikatExt = $request->file('sertifikat')->getClientOriginalExtension();
        $sertifikat = pathinfo($sertifikatExt, PATHINFO_EXTENSION);
        $sertifikatExtension = $request->file('sertifikat')->getClientOriginalExtension();
        $sertifikatSave = $sertifikat.'_'.time().'.'.$sertifikatExtension;
        $request->file('sertifikat')->storeAs('public/sertifikatcourse', $sertifikatSave);

        Course::create([
            'category_id' => $request->category_id,
            'courseName' => $request->courseName,
            'namaPemateri' => $request->namaPemateri,
            'deskripsi' => $request->deskripsi,
            'file' => $filenameSave,
            'sertifikat' => $sertifikatSave
        ]);

        return redirect()->back()->with("success", "Course $request->courseName berhasil dibuat");
    }

    public function detailCourse(string $courseId){
        $course = Course::find($courseId);
        return view('admin.course.detailCourse', compact('course'));
    }
}
