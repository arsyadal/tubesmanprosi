<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Kuisioner;
use App\Models\Activities;
use Illuminate\Http\Request;
use App\Models\CourseCategory;

class AdminController extends Controller
{
    public function index(){
        $allUser = User::role('user')->where('courseType', '!=', null)->get();
        $pending = User::role('user')->where('courseType', null)->count();
        $courseCategory = CourseCategory::all();

        $goOnlineDone = 0;
        $goModernDone = 0;
        $goGlobalDone = 0;
        $goOnlineUser = User::role('user')->where('courseType', 'GoOnline')->count();
        $goModernUser = User::role('user')->where('courseType', 'GoModern')->count();
        $goGlobalUser = User::role('user')->where('courseType', 'GoGlobal')->count();

        foreach($allUser as $user){
            $courseCategoryUser = CourseCategory::where('name', $user->courseType)->first();
            $courses = Course::where('category_id', $courseCategoryUser->id)->get();
            $categoryValue = 0;
            $categoryActivities = 0;
            foreach($courses as $course){
                $course->checked = 0;
                $course->allActivities = 0;
                foreach($course->coursemoduls as $value){
                    foreach($value->modulQuestions as $activities){
                        $activities = Activities::where('user_id', $user->id)
                        ->where('modul_questions_id', $activities->id)->first();
                        if($activities){
                            $course->checked++;
                        }
                        $course->allActivities++;
                    }
                }
                $course->progress = 0;
                if($course->allActivities > 0){
                    $course->progress = ($course->checked / $course->allActivities) * 100;
                }
                $categoryValue+= $course->progress;
                $categoryActivities++;
            }
            $categoryProgress = 0;
            if($categoryActivities > 0){
                $categoryProgress = $categoryValue / $categoryActivities;
            }
            if($categoryProgress == 100){
                if($user->courseType == 'GoModern'){
                    $goModernDone++;
                }elseif($user->courseType == 'GoOnline'){
                    $goOnlineDone++;
                }elseif($user->courseType == 'GoGlobal'){
                    $goGlobalDone++;
                }
            }
        }
        $goOnlineProgress = 0;
        $goModernProgress = 0;
        $goGlobalProgress = 0;
        if($goOnlineUser > 0){
            $goOnlineProgress = ($goOnlineDone / $goOnlineUser) * 100;
        }
        if($goModernUser > 0){
            $goModernProgress = ($goModernDone / $goModernUser) * 100;
        }
        if($goGlobalUser > 0){
            $goGlobalProgress = ($goGlobalDone / $goGlobalUser) * 100;
        }


        return view('admin.index', compact('allUser', 'pending', 'courseCategory', 'goOnlineProgress', 'goModernProgress', 'goGlobalProgress'));
    }

    public function kuisioner(){
        $kuisioner = Kuisioner::pluck('questionType')->unique()->values()->toArray();
        $kuisionerData = [];
        foreach($kuisioner as $key => $data){
            $kuisionerData['kuisioner' . ($key + 1)] = Kuisioner::where('questionType', $data)->get();
        }
        return view('admin.kuisioner', compact('kuisionerData'));
    }

    public function editKuisioner(Request $request, string $id){
        $question = Kuisioner::find($id);
        $question->update(['question' => $request->question]);
        
        return redirect()->back()->with('success', 'Pertanyaan berhasil diupdate');
    }

    public function deleteKuisioner(string $id){
        $question = Kuisioner::find($id);

        $question->delete();

        return redirect()->back()->with('success', 'Pertanyaan berhasil dihapus');
    }

    public function addKuisioner(Request $request, string $type){
        $request->validate(['question' => 'required|string']);

        Kuisioner::create([
            'question' => $request->question,
            'questionType' => $type
        ]);

        return redirect()->back()->with('success', 'Pertanyaan berhasil ditambahkan');
    }
    
    public function editKuisionerType(Request $request, string $type){
        $questionType = Kuisioner::where('questionType', $type)->get();
        foreach($questionType as $data){
            $data->update(['questionType' => $request->questionType]);;
        }
        return redirect()->back()->with('success', 'Tipe Pertanyaan berhasil diupdate');
    }

    public function course(string $idCourse){
        $course = Course::where('category_id', $idCourse)->get();
        $courseCategory = CourseCategory::find($idCourse);
        return view('admin.course.index', compact('course', 'courseCategory'));
    }

    public function umkmlist(){
        $umkmlist = User::role('user')->get();
        $goModern = User::where('courseType', 'goModern')->get();
        $goOnline = User::where('courseType', 'goOnline')->get();
        $goGlobal = User::where('courseType', 'goGlobal')->get();
        return view('admin.umkmlist', compact('umkmlist', 'goModern', 'goOnline', 'goGlobal'));
    }
}
