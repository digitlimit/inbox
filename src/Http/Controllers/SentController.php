<?php

namespace Digitlimit\Inbox\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Digitlimit\Inbox\Models\Participant;
use Digitlimit\Inbox\Models\Thread;

class SentController extends Controller
{
    protected $threadClass, $participantClass;

    public function __construct()
    {
        parent::__construct();

        $this->threadClass = config('inbox.models.thread');
        $this->participantClass = config('inbox.models.participant');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $threads = $user->sent();

        $threads = $threads->paginate(config('inbox.paginate', 10));

        return view('inbox::index', compact('threads'));
    }

    /**
     * Display the specified resource.
     *
     * @param Thread $thread
     *
     * @return \Illuminate\Http\Response
     */
    public function show($thread)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Thread $thread
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($thread)
    {

    }
}
