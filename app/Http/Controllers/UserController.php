<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Course;
use App\Models\Bootcamp;
use App\Models\Kuisioner;
use App\Models\Activities;
use App\Models\CourseModul;
use Illuminate\Http\Request;
use App\Models\EventAudience;
use App\Models\ModulQuestion;
use App\Models\CourseCategory;
use App\Models\BootcampAudience;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request){
        $courseCategory = CourseCategory::where('name', auth()->user()->courseType)->first();
        if($request->has('query')){
            $searchTerm = $request->input('query');
            $course = Course::where('category_id', $courseCategory->id)->where('courseName', 'LIKE', '%' . $searchTerm . '%')->get();
        } else{
            $course = Course::where('category_id', $courseCategory->id)->get();
        }
        $eventAttend = EventAudience::where('user_id', auth()->user()->id)->get();
        $bootcampAttend = BootcampAudience::where('user_id', auth()->user()->id)->get();
        $events = EventAudience::where('user_id', auth()->user()->id)->get();
        $bootcamps = BootcampAudience::where('user_id', auth()->user()->id)->get();
        $categoryValue = 0;
        $categoryActivities = 0;
        $courseCheck = Course::where('category_id', $courseCategory->id)->get();
        foreach($courseCheck as $data){
            $data->checked = 0;
            $data->allActivities = 0;
            foreach($data->coursemoduls as $value){
                foreach($value->modulQuestions as $activities){
                    $activities = Activities::where('user_id', auth()->user()->id)
                    ->where('modul_questions_id', $activities->id)->first();
                    if($activities){
                        $data->checked++;
                    }
                    $data->allActivities++;
                }
            }
            $data->progress = ($data->checked / $data->allActivities) * 100;
            $categoryValue+= $data->progress;
            $categoryActivities++;
        }
        $categoryProgress = 0;
        if($categoryActivities > 0){
            $categoryProgress = $categoryValue / $categoryActivities;
        }

        return view('user.index', compact('courseCategory', 'course', 'categoryProgress', 'events', 'bootcamps', 'eventAttend', 'bootcampAttend'));
    }

    public function course(){
        $courseCategory = CourseCategory::where('name', auth()->user()->courseType)->first();
        $course = Course::where('category_id', $courseCategory->id)->get();
        foreach($course as $data){
            $data->checked = 0;
            $data->allActivities = 0;
            foreach($data->coursemoduls as $value){
                foreach($value->modulQuestions as $activities){
                    $activities = Activities::where('user_id', auth()->user()->id)
                    ->where('modul_questions_id', $activities->id)->first();
                    if($activities){
                        $data->checked++;
                    }
                    $data->allActivities++;
                }
            }
            $data->progress = 0;
            if($data->allActivities > 0){
                $data->progress = ($data->checked / $data->allActivities) * 100;
            }
        }

        return view('user.course', compact('courseCategory', 'course'));
    }

    public function courseModul(string $id){
        $course = Course::find($id);
        $courseCategory = CourseCategory::find($course->category_id);
        $modul = CourseModul::where('course_id', $course->id)->get();
        $peserta = User::where('courseType', $courseCategory->name)->get();
        $videoCount = 0;
        $checked = 0;
        $totalActivities = 0;
        foreach($modul as $data){
            foreach($data->modulQuestions as $value){
                $activities = Activities::where('user_id', auth()->user()->id)
                ->where('modul_questions_id', $value->id)->first();
                $value->progress = "unchecked";
                if($activities){
                    $value->progress = "checked";
                    $checked++;
                }
                $totalActivities++;
                if($value->modulType == 'Video'){
                    $videoCount++;
                }
            }
        }
        $progressCourse = 0;
        if($totalActivities > 0){
            $progressCourse = ($checked / $totalActivities) * 100;
        }

        return view('user.courseModul', compact('course', 'courseCategory', 'modul', 'peserta', 'videoCount', 'progressCourse'));
    }

    public function bootcampEvent(){
        $category = CourseCategory::where('name', auth()->user()->courseType)->first();
        $events = Event::where('category_id', $category->id)->get();
        $bootcamps = Bootcamp::where('category_id', $category->id)->get();

        return view('user.bootcampEvent', compact('events', 'bootcamps'));
    }

    public function daftarEventBootcamp(Request $request){
        
    }

    public function goOnline(){
        return view('goOnline');
    }
    
    public function goModern(){
        return view('goModern');
    }
    public function goGlobal(){
        return view('goGlobal');
    }

    public function kuisionerSessionOne(Request $request){
        $kuisioner = Kuisioner::pluck('questionType')->unique()->values()->toArray();
        $kuisionerType = $kuisioner[0];
        $question = Kuisioner::where('questionType', $kuisionerType)->get();
        $answer = $request->session()->get('answer');

        return view('kuisioner.index', compact('question', 'answer', 'kuisioner'));
    }

    public function kuisionerSessionOneStore(Request $request){
        $validationRules = [
            'question-*' => 'required|numeric|between:1,5'
        ];

        $validator = Validator::make($request->all(), $validationRules);

        $answer = $request->session()->get('answer', []);
        $combinedAsnwer = array_merge($answer, $request->all());
        $request->session()->put('answer', $combinedAsnwer);

        return redirect()->route('user.kuisionerSessionTwo');
    }

    public function kuisionerSessionTwo(Request $request){
        $kuisioner = Kuisioner::pluck('questionType')->unique()->values()->toArray();
        $kuisionerType = $kuisioner[1];
        $question = Kuisioner::where('questionType', $kuisionerType)->get();
        $answer = $request->session()->get('answer');
        return view('kuisioner.question2', compact('question', 'answer', 'kuisioner'));
    }

    public function kuisionerSessionTwoStore(Request $request){
        $validationRules = [
            'question-*' => 'required|numeric|between:1,5'
        ];

        $answer = $request->session()->get('answer', []);
        $combinedAsnwer = array_merge($answer, $request->all());
        $request->session()->put('answer', $combinedAsnwer);

        return redirect()->route('user.kuisionerSessionThree');
    }

    public function kuisionerSessionThree(Request $request){
        $kuisioner = Kuisioner::pluck('questionType')->unique()->values()->toArray();
        $kuisionerType = $kuisioner[2];
        $question = Kuisioner::where('questionType', $kuisionerType)->get();
        $answer = $request->session()->get('answer');

        return view('kuisioner.question3', compact('question', 'answer', 'kuisioner'));
    }

    public function kuisionerSessionThreeStore(Request $request){
        $validationRules = [
            'question-*' => 'required|numeric|between:1,5'
        ];

        $validator = Validator::make($request->all(), $validationRules);

        $answer = $request->session()->get('answer', []);
        $combinedAsnwer = array_merge($answer, $request->all());
        $request->session()->put('answer', $combinedAsnwer);

        return redirect()->route('user.kuisionerSessionFour');
    }

    public function kuisionerSessionFour(Request $request){
        $kuisioner = Kuisioner::pluck('questionType')->unique()->values()->toArray();
        $kuisionerType = $kuisioner[3];
        $question = Kuisioner::where('questionType', $kuisionerType)->get();
        $answer = $request->session()->get('answer');

        return view('kuisioner.question4', compact('question', 'answer', 'kuisioner'));
    }

    public function kuisionerSessionFourStore(Request $request){
        $validationRules = [
            'question-*' => 'required|numeric|between:1,5'
        ];
        $answer = $request->session()->get('answer', []);
        $combinedAsnwer = array_merge($answer, $request->all());
        $sum = 0;
        foreach($combinedAsnwer as $key => $data){
            if(preg_match('/^question-\d+$/', $key)) {
                $sum += (int)$data;
            }
        }
        $totalQuestion = Kuisioner::count();
        $average = ($sum / $totalQuestion);
        $user = Auth::user();
        if($average <= 2){
            $user->update(['courseType' => 'GoOnline']);
        } elseif($average > 2 && $average < 4) {
            $user->update(['courseType' => 'GoModern']);
        } elseif ($average >= 4){
            $user->update(['courseType' => 'GoGlobal']);
        }
        $request->session()->forget('answer');
        return redirect()->route('user.index')->with('success',"Your Course Type is $user->courseType");
    }

    public function activities(string $id){
        $activities = ModulQuestion::find($id);
        $modul = CourseModul::find($activities->modul_id);
        $course = Course::find($modul->course_id);
        $courseCategory = CourseCategory::find($course->category_id);

        return view('user.activities', compact('activities', 'course', 'courseCategory', 'modul'));
    }

    public function activitiesProgress(string $id){
        $activities = ModulQuestion::find($id);
        $modul = CourseModul::find($activities->modul_id);
        $course = Course::find($modul->course_id);
        $courseCategory = CourseCategory::find($course->category_id);

        Activities::create([
            'user_id' => auth()->user()->id,
            'modul_questions_id' => $activities->id,
            'modul_id' => $modul->id,
            'course_id' => $course->id,
            'category_id' => $courseCategory->id,
        ]);

        return redirect()->back()->with('success', 'Your progress has been saved');
    }

    public function bootcampRegister(Request $request){
        $check = BootcampAudience::where('user_id', auth()->user()->id)->where('bootcamp_id', $request->bootcamp_id)->first();
        
        if($check){
            return redirect()->back()->with('warning', "You're already registered on this bootcamp");
        }
        
        BootcampAudience::create([
            'user_id' => auth()->user()->id,
            'bootcamp_id' => $request->bootcamp_id
        ]);
        
        return redirect()->back()->with('success', 'Your registration has been registered');
    }
    
    public function eventRegister(Request $request){
        $check = EventAudience::where('user_id', auth()->user()->id)->where('event_id', $request->event_id)->first();
        
        if($check){
            return redirect()->back()->with('warning', "You're already registered on this event");
        }

        EventAudience::create([
            'user_id' => auth()->user()->id,
            'event_id' => $request->event_id
        ]);

        return redirect()->back()->with('success', 'Your registration has been registered');
    }
}
