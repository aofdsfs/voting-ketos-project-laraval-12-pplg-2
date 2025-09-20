<?php
// app/Http/Controllers/VoteController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Vote;

class VoteController extends Controller
{
    public function index()
{
    $candidates = Candidate::all();
    return view('vote.index', compact('candidates'));
}


    public function store(Request $request)
    {
        $request->validate(['candidate_id'=>'required']);

        $user = auth()->user();

        if($user->vote){
            return redirect()->back()->with('error','Anda sudah memilih.');
        }

        Vote::create([
            'user_id' => $user->id,
            'candidate_id' => $request->candidate_id
        ]);

        return redirect()->route('vote.result')->with('success','Terima kasih, suara Anda telah masuk.');
    }

    public function result()
{
    // Ambil votes dengan relasi candidate sekaligus
    $results = Vote::with('candidate')
        ->selectRaw('candidate_id, COUNT(*) as total')
        ->groupBy('candidate_id')
        ->get();

    return view('vote.result', compact('results'));
}

}

