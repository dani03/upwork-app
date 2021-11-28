<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Job;
use App\Models\Conversation;
use App\Models\CoverLetter;
use App\Models\Message;
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

    public function confirm(Request $request)
    {
        $proposal = Proposal::find($request->proposal);
        $proposal->fill(["validated" => 1]);

        if ($proposal->isDirty()) {
            $proposal->save();
            $conversation = Conversation::create([
                'from' => auth()->user()->id,
                'to' => $proposal->user->id,
                'job_id' => $proposal->job_id,

            ]);

            Message::create([
                'user_id' => auth()->user()->id,
                'conversation_id' => $conversation->id,
                'content' => "Bonjour, félicitation je valide votre offre"
            ]);

            return redirect()->route('jobs.index');
        }
    }
}
