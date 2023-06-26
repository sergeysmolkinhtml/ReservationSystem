<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke() : \Illuminate\Contracts\View\View | \Illuminate\Foundation\Application | \Illuminate\Contracts\View\Factory | \Illuminate\Contracts\Foundation\Application
    {
        $activities = Activity::where('start_time', '>', now())
            ->orderBy('start_time')
            ->paginate(9);

        return view('home', compact('activities'));
    }
}
