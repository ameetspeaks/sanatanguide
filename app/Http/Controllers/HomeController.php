<?php

namespace App\Http\Controllers;

use App\Models\DailyWisdom;
use App\Models\Blog;
use App\Models\Temple;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get today's daily wisdom
        $dailyWisdom = DailyWisdom::where('is_active', true)
            ->where('date', today())
            ->first();

        // Get featured blogs
        $featuredBlogs = Blog::where('is_active', true)
            ->where('is_featured', true)
            ->latest()
            ->take(3)
            ->get();

        // Get featured temples
        $featuredTemples = Temple::where('is_active', true)
            ->where('is_featured', true)
            ->latest()
            ->take(3)
            ->get();

        return view('home', compact('dailyWisdom', 'featuredBlogs', 'featuredTemples'));
    }
} 