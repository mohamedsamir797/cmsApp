<?php

namespace App\Http\Middleware;

use App\Category;
use Closure;


class checkCategories
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
        $check = Category::all()->count();

        if ($check == 0){
            session()->flash('error','you need to add category');
            return redirect(route('categories.create'));
        }
        return $next($request);
    }
}
