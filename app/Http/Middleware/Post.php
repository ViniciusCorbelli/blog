<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Post
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->access == "Administrador" || $request->post == NULL || $request->post->user_id == Auth::user()->id) {
            return $next($request);
        }
        return redirect()->route('admin.posts.index')->withMessage('Você não possui acesso à está página!');
    }
}
