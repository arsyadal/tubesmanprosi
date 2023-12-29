<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseModul;
use Illuminate\Http\Request;
use App\Models\ModulQuestion;
use App\Models\CourseCategory;

class ModulController extends Controller
{
    public function create(string $id){
        $course = Course::find($id);
        $courseCategory = CourseCategory::find($course->category_id);
        return view('admin.modul.create', compact('course', 'courseCategory'));
    }

    public function store(Request $request){
        $request->validate([
            'namaModul' => 'required|string|max:255',
            'forum' => 'required|string|max:255'
        ]);

        CourseModul::create([
            'course_id' => $request->course_id,
            'course_category_id' => $request->course_category_id,
            'modul_name' => $request->namaModul,
            'forum' => $request->forum,
        ]);

        return redirect()->back()->with('success', "Modul berhasil dibuat");
    }

    public function questionCreate(string $id){
        $modul = CourseModul::find($id);
        $course = Course::find($modul->course_id);
        $courseCategory = CourseCategory::find($course->category_id);

        return view('admin.modul.createQuestion', compact('modul', 'course', 'courseCategory'));
    }

    public function questionStore(Request $request){
        $request->validate([
            'modulType' => 'required|string',
            'deskripsi' => 'required|string',
            'materi' => 'required',
        ]);

        $filenameExt = $request->file('materi')->getClientOriginalExtension();
        $filename = pathinfo($filenameExt, PATHINFO_EXTENSION);
        $extension = $request->file('materi')->getClientOriginalExtension();
        $filenameSave = $filename.'_'.time().'.'.$extension;
        $request->file('materi')->storeAs('public/modulMateri', $filenameSave);

        ModulQuestion::create([
            'modul_id' => $request->modul_id,
            'modulType' => $request->modulType,
            'deskripsi' => $request->deskripsi,
            'materi' => $filenameSave
        ]);

        return redirect()->back()->with('success', 'Modul Question Berhasil Dibuat!!!');
    }
}
