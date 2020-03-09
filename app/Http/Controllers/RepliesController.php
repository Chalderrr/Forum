<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
	protected $fillable = ["description", "user_id"];
	protected $guarded = [];
	public function __construct()
	{
	    $this->middleware('auth');
	}

	/**
	 * @param $channelId
	 * @param Thread $thread
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store($channelId, Thread $thread)
    {
        $thread->addReply([
        	'body' => request('body'),
	        'user_id' => auth()->id()
        ]);

        return back();
    }
}
