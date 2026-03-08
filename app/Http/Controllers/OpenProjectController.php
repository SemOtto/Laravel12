<?php

namespace App\Http\Controllers;

use App\Models\Project;

class OpenProjectController extends Controller
{
    /**
     * Display a listing of public projects.
     */
    public function index()
    {
        $projects = Project::paginate(10);
        return view('open.projects.index', compact('projects'));
    }
}
