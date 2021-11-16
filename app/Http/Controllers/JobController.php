<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs =  Job::Online()->latest()->paginate(3);
        return view('jobs.index', compact('jobs'));
    }

    public function show(Job $id)
    {

        return view('jobs.show', ["job" => $id]);
    }
}
