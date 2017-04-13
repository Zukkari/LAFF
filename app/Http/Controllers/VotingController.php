<?php

namespace App\Http\Controllers;

use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class VotingController extends Controller
{
    public function vote(Request $request) {
        if (Auth::check()) {
            if ($request->ajax()) {
                $post = $request->input('id');
                $vote = $request->input('vote');
                $user = Auth::user()->id;

                $entry = Vote::where('kasutajaID', $user) -> where('postitusID', $post)->first();

                if ($entry != null)
                {
                    if ($entry->status == $vote) {
                        $entry->status = 0;
                        $entry->timestamps = false;
                        $entry->save();
                    } else {
                        $entry->status = $vote;
                        $entry->timestamps = false;
                        $entry->save();
                    }
                }
                else
                {
                    $entry = new Vote;
                    $entry->kasutajaID = $user;
                    $entry->postitusID = $post;
                    $entry->timestamps = false;
                    $entry->save();
                }
            } else {
                return "Not AJAX request";
            }
        } else {
            return "User not signed in";
        }
    }

    public function getRating(Request $request) {
        if ($request->ajax()) {
            $postitusID = $request->input('postitusID');

            if (is_null(Vote::where('postitusID', $postitusID))) {
                $response = 0;
                return $response;
            } else {
                $response = Vote::where('postitusID', $postitusID)->sum('status');
                return $response;
            }
        } else {
            return 'Not AJAX request';
        }
    }

    public function getUpvoted(Request $request) {
        if ($request->ajax()){
            $userid = $request->input('userid');

            $response = Vote::where('kasutajaID', $userid)->where('status', 1)->get()->pluck('postitusID')->toArray();

            return $response;
        }
    }

    public function getDownvoted(Request $request) {
        if ($request->ajax()) {
            $userid = $request->input('userid');

            $response = Vote::where('kasutajaID', $userid)->where('status', -1)->get()->pluck('postitusID')->toArray();

            return $response;
        }
    }
}
