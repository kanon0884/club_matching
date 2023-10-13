<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CheckEventAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $event = $request->route('event'); // イベントモデルへのアクセス方法はプロジェクトに依存するかもしれません

        if (Gate::denies('edit-event', $event)) {
            return redirect()->route('events.index')->with('error', 'アクセスが拒否されました');
        }
        
        return $next($request);
    }
}
