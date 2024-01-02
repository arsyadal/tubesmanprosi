<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Bootcamp;
use Illuminate\Http\Request;
use App\Models\EventAudience;
use App\Models\CourseCategory;
use App\Models\BootcampAudience;
use Illuminate\Support\Facades\Storage;

class EventBootcampController extends Controller
{
    public function index(){
        $category = CourseCategory::all();

        return view('admin.eventbootcamp.index', compact('category'));
    }

    public function detail(string $category){
        $events = Event::where('category_id', $category)->get();
        $bootcamps = Bootcamp::where('category_id', $category)->get();

        return view('admin.eventbootcamp.detail', compact('events', 'bootcamps', 'category'));
    }

    public function eventCreate(string $category){
        $category = CourseCategory::find($category);
        return view('admin.eventbootcamp.eventCreate', compact('category'));
    }

    public function eventStore(Request $request){
        $request->validate([
            'namaEvent' => 'required|string|max:255',
            'namaPemateri' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required',
            'harga' => 'required|integer',
            'tempatLink' => 'required|string|max:255',
            'foto' => 'required|mimes:jpg,jpeg,png,gif',
        ]);

        $filenameExt = $request->file('foto')->getClientOriginalName();
        $filename = pathinfo($filenameExt, PATHINFO_FILENAME);
        $extension = $request->file('foto')->getClientOriginalExtension();
        $filenameSave = $filename.'_'.time().'.'.$extension;
        $request->file('foto')->storeAs('public/eventFoto', $filenameSave);

        Event::create([
            'category_id' => $request->category_id,
            'namaEvent' => $request->namaEvent,
            'namaPemateri' => $request->namaPemateri,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'harga' => $request->harga,
            'tempatLink' => $request->tempatLink,
            'foto' => $filenameSave,
        ]);

        return redirect()->back()->with('success', 'Event berhasil dibuat');
    }

    public function bootcampCreate(string $category){
        $category = CourseCategory::find($category);
        return view('admin.eventbootcamp.bootcampCreate', compact('category'));
    }

    public function bootcampStore(Request $request){
        $request->validate([
            'namaBootcamp' => 'required|string|max:255',
            'prospekKarier' => 'required|string',
            'benefitBootcamp' => 'required|string',
            'kurikulum_silabus' => 'required|string',
            'sistemBelajar' => 'required|string',
            'tanggal' => 'required',
            'harga' => 'required|integer',
            'faq' => 'required|string|max:255',
            'forum' => 'required|string|max:255',
            'foto' => 'required|mimes:jpg,jpeg,png,gif',
        ]);

        $filenameExt = $request->file('foto')->getClientOriginalName();
        $filename = pathinfo($filenameExt, PATHINFO_FILENAME);
        $extension = $request->file('foto')->getClientOriginalExtension();
        $filenameSave = $filename.'_'.time().'.'.$extension;
        $request->file('foto')->storeAs('public/bootcampFoto', $filenameSave);

        Bootcamp::create([
            'category_id' => $request->category_id,
            'namaBootcamp' => $request->namaBootcamp,
            'prospekKarier' => $request->prospekKarier,
            'benefitBootcamp' => $request->benefitBootcamp,
            'kurikulum_silabus' => $request->kurikulum_silabus,
            'sistemBelajar' => $request->sistemBelajar,
            'tanggal' => $request->tanggal,
            'harga' => $request->harga,
            'faq' => $request->faq,
            'forum' => $request->forum,
            'foto' => $filenameSave,
        ]);

        return redirect()->back()->with('success', 'Bootcamp berhasil dibuat');
    }

    public function bootcampDetail(string $id){
        $bootcamp = Bootcamp::find($id);
        $category = CourseCategory::find($bootcamp->category_id);
        $audience = BootcampAudience::where('bootcamp_id', $bootcamp->id)->get();
        return view('admin.eventbootcamp.bootcampDetail', compact('bootcamp', 'category',  'audience'));
    }
    
    public function bootcampEdit(string $id){
        $bootcamp = Bootcamp::find($id);
        $category = CourseCategory::find($bootcamp->category_id);
        return view('admin.eventbootcamp.bootcampEdit', compact('bootcamp', 'category'));
    }

    public function bootcampUpdate(Request $request, string $id){
        $request->validate([
            'namaBootcamp' => 'required|string|max:255',
            'prospekKarier' => 'required|string',
            'benefitBootcamp' => 'required|string',
            'kurikulum_silabus' => 'required|string',
            'sistemBelajar' => 'required|string',
            'tanggal' => 'required',
            'harga' => 'required|integer',
            'faq' => 'required|string|max:255',
            'forum' => 'required|string|max:255',
            'foto' => 'mimes:jpg,jpeg,png,gif',
        ]);

        $bootcamp = Bootcamp::find($id);
        if($request->hasFile('foto')){
            if(Storage::disk('public')->exists('bootcampFoto/'. $bootcamp->foto)){
                Storage::disk('public')->delete('bootcampFoto/'. $bootcamp->foto);
            }
            $filenameExt = $request->file('foto')->getClientOriginalName();
            $filename = pathinfo($filenameExt, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $filenameSave = $filename.'_'.time().'.'.$extension;
            $request->file('foto')->storeAs('public/bootcampFoto', $filenameSave);
            
            $bootcamp->update(['foto' => $filenameSave]);
        }

        $bootcamp->update([
            'namaBootcamp' => $request->namaBootcamp,
            'prospekKarier' => $request->prospekKarier,
            'benefitBootcamp' => $request->benefitBootcamp,
            'kurikulum_silabus' => $request->kurikulum_silabus,
            'sistemBelajar' => $request->sistemBelajar,
            'tanggal' => $request->tanggal,
            'harga' => $request->harga,
            'faq' => $request->faq,
            'forum' => $request->forum,
        ]);

        return redirect()->back()->with('success', 'Bootcamp berhasil diupdate');
    }

    public function bootcampDestroy(string $id){
        $bootcamp = Bootcamp::find($id);
        $category = $bootcamp->category_id;
        $bootcamp->delete();

        return redirect()->route('admin.eventBootcamp.detail', $category)->with('success', 'Bootcamp Berhasil Dihapus');
    }
    
    public function eventDetail(string $id){
        $event = Event::find($id);
        $category = CourseCategory::find($event->category_id);
        $audience = EventAudience::where('event_id', $event->id)->get();
        
        return view('admin.eventbootcamp.eventDetail', compact('event', 'category', 'audience'));
    }

    public function eventEdit(string $id){
        $event = Event::find($id);
        $category = CourseCategory::find($event->category_id);

        return view('admin.eventbootcamp.eventEdit', compact('event', 'category'));
    }

    public function eventUpdate(Request $request, string $id){
        $request->validate([
            'namaEvent' => 'required|string|max:255',
            'namaPemateri' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required',
            'harga' => 'required|integer',
            'tempatLink' => 'required|string|max:255',
            'foto' => 'mimes:jpg,jpeg,png,gif',
        ]);
        $event = Event::find($id);
        if($request->hasFile('foto')){
            if(Storage::disk('public')->exists('eventFoto/'. $event->foto)){
                Storage::disk('public')->delete('eventFoto/'. $event->foto);
            }

            $filenameExt = $request->file('foto')->getClientOriginalName();
            $filename = pathinfo($filenameExt, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $filenameSave = $filename.'_'.time().'.'.$extension;
            $request->file('foto')->storeAs('public/eventFoto', $filenameSave);

            $event->update(['foto' => $filenameSave]);
        }

        $event->update([
            'category_id' => $request->category_id,
            'namaEvent' => $request->namaEvent,
            'namaPemateri' => $request->namaPemateri,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'harga' => $request->harga,
            'tempatLink' => $request->tempatLink,
        ]);

        return redirect()->back()->with('success', 'Event berhasil diupdate');
    }

    public function eventDestroy(string $id){
        $event = Event::find($id);
        $category = $event->category_id;
        $event->delete();

        return redirect()->route('admin.eventBootcamp.detail', $category)->with('success', 'Event Berhasil Dihapus');
    }
}
