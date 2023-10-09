<?php

namespace App\Http\Controllers;
use App\Models\Channel ;
use App\Models\CommunityLink;
use App\Models\User ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;
;

class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = CommunityLink::where('approved', 1)->paginate(25);
        $channels = Channel::orderBy('title','asc')->get();
        return view('community/index', compact('links', 'channels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([

            'title' => 'required|max:255',



            'link' => 'required|unique:community_links|url|max:255',

            'channel_id' => 'required|exists:channels,id'

            ]);

            $user = Auth::user();

            $isTrusted = $user->isTrusted();

            $approved = $isTrusted ? true : false;

            $data['user_id'] = Auth::id();

            $data['approved'] = $approved;

            CommunityLink::create($data);

            return back();

            if ($isTrusted) {
            return redirect()->back()->with('success', 'el enlace se ha creado correctamente');
            } else {
            return redirect()->back()->with('info', 'el enlace se validara mas tarde');
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommunityLink $communityLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommunityLink $communityLink)
    {
        //
    }
}
