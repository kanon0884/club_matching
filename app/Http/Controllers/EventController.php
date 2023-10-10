<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    
    public function event_store(Request $request, Event $event)
    {  
        $input = $request['event'];
       
        // $input の中身がnullでないことを確認
        if ($input) {
            // モデルにデータを設定
            $event->fill($input)->save();
    
            // 登録後のリダイレクトなどの処理を追加
            return redirect('/events/' . $event->id);
        } else {
            // 入力データがnullの場合、エラーメッセージを表示またはエラーハンドリングを行う
            return back()->with('error', '入力データが不正です。');
        }
    }
    
    public function event_edit(Event $event)
    {
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
    
}