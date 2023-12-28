<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseModul;
use Illuminate\Http\Request;

class ModulController extends Controller
{
    public function create(string $id){
        $course = Course::find($id);
        return view('admin.modul.create', compact('course'));
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
        return view('admin.modul.createQuestion', compact('modul'));
    }
}
