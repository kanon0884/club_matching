<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use App\Models\Event;

class EventController extends Controller
{
    public function index(Event $event)
    {
        return view('events/index')->with(['events' => $event->get()]);
    }
    
    public function event_index(Event $event)
    {
        return view('events/event_index')->with(['events' => $event->get()]);
    }
    
    public function event_show(Event $event)
    {
        return view('events/event_show')->with(['event' => $event]);
    }
    
    public function event_create(Event $event)
    {
        return view('events/event_create');
    }
    
    
    public function event_store(Request $request)
    {
        // フォームからのデータを受け取り、新しいイベントを作成
        $data = $request->input('event');
        
        // ログインユーザーの ID を 'user_id' フィールドに設定
        $data['user_id'] = Auth::id();
        
        // イベントを作成
        $event = new Event($data);
        $event->save();
        
        return redirect('/events/' . $event->id);
    }

    
    public function event_edit(Event $event)
    {
        if (Gate::denies('edit-event', $event)) {
            return redirect()->route('events.index')->with('error', 'アクセスが拒否されました');
        }
        return view('events/event_edit')->with(['event' => $event]);
    }
    
    public function event_update(Request $request, Event $event)
    {
        $input_event = $request['event'];
        $event->fill($input_event)->save();
        
        return redirect('/events/' . $event->id);
    }
    
    public function delete(Event $event)
    {
        $event->delete();
        return redirect('/events');
    }
    
    public function event_search()
    {
        return view('events.event_search');
    }
    
    public function event_results(Request $request)
    {
        $keyword = $request->input('keyword');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        
        $events = Event::where(function ($query) use ($keyword) {
            $query->where('title', 'like', "%$keyword%")
                  ->orWhere('place', 'like', "%$keyword%")
                  ->orWhereHas('user', function ($query) use ($keyword) {
                      $query->where('club', 'like', "%$keyword%");
                  });
        })
        ->whereBetween('datetime', [$start_date, $end_date])
        ->get();
    
        return view('events.event_search_results', compact('events'));
    }

    
}