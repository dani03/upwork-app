<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Job;
use App\Models\CoverLetter;
use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function store(Request $request, $jobId)
    {
        // dd($request, $jobId);
        $jobId = (int) $jobId;
        
        $proposal = Proposal::create([
            'job_id' => $jobId,
            'validated' => 0,

        ]);
        // dd($proposal);
        CoverLetter::create([
            'proposal_id' => $proposal->id,
            'content' => $request->content,
        ]);

        return redirect()->route('jobs.index');
    }
}
