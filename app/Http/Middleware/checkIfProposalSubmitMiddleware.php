<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkIfProposalSubmitMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // dd($request->job);

        //on verifie si l'utilisateur a contient ce job dans ses propositions
        if (auth()->user()->proposals->contains('job_id', (int)$request->job)) {
            return redirect()->route('jobs.index')->with('error', 'message');
        }
        return $next($request);
    }
}
