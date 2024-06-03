<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): View
    {
        $events = $this->fetchEvent();
        $categories = $this->fetchCategory();
        return view('frontend.index',compact('events','categories'));
    }

    // fetch data event

    private function fetchEvent(){
        $category =request()->query('category');

        $event = Event::upcoming();
        //limit event 6
        if (!request()->query('all_events')) {
            $event->limit(6);
        }

        if ($category) {
            $event->withCategory($category);
        }

        return $event->get();
    }

    private function fetchCategory(): Collection
    {
        $categories = Category::sortByMostEvents();

        if (!request()->query('all_categories')) {
            $categories->limit(4);
        }

        return $categories->get();
    }
}
