<?php

use App\Core\Controller;

class Pages extends Controller
{
    public function index()
    {
        $this->view('pages/index', [
            'title' => 'SharePosts',
            'description' => 'Simple social network built on the TraversyMVC PHP framework.'
        ]);
    }

    public function about()
    {
        $this->view('pages/about', [
            'title' => 'About Us',
            'description' => 'App to share posts with other users.'
        ]);
    }
}
