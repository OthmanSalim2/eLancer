<?php

namespace App\Http\Controllers\Freelancer;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Project;
use App\Models\Proposal;
use App\Notifications\NewProposalNotification;
use App\Notifications\NewPropsalNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ProposalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::guard('web')->user();

        $proposals = $user->proposals()
            ->with('project')
            ->latest()
            ->paginate();

        return view('freelancer.proposals.index', [
            'proposals' => $proposals,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {

        return view('freelancer.proposals.create', [
            'project' => $project,
            'proposal' => new Proposal(),
            'units' => [
                'day' => 'Day',
                'week' => 'Week',
                'month' => 'Month',
                'year' => 'Year',
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $project_id)
    {
        $project = Project::findOrFail($project_id);
        if ($project->status !== 'open') {
            return redirect()->route('freelancer.proposals.index')
                ->with('error', 'You can not submit proposal to this project');
        }
        $user = Auth::guard('web')->user();
        if ($user->proposedProjects()->find($project->id)) {
            return redirect()->route('freelancer.proposals.index')
                ->with('error', 'You already submitted proposal to this project');
        }

        $request->validate([
            'description' => ['required', 'string'],
            'cost' => ['required', 'numeric', 'min:1'],
            'duration' => ['required', 'int', 'min:1'],
            'duration_unit' => ['required', 'in:day,week,month,year'],
        ]);
        $request->merge([
            'project_id' => $project_id
        ]);

        $proposal = $user->proposals()->create($request->all());

        // Notifications
        // Channels: mail, database, nexmo (sms), broadcast (real-time), slack

        $project->user->notify(new NewProposalNotification($proposal, $user));

        $admins = Admin::all();
        // foreach ($admins as $admin) {
        //     $admin->notify(new NewProposalNotification($proposal, $user));
        // }

        // this other way to send notification email to multiple user or admins
        //Notification::send($admins, new NewProposalNotification($proposal, $user));

        // this's use to send the NotificationEmail to any email
        /*
            here must make this condition if (!$notifiable instanceof AnonymousNotifiable)
            because if don't apply this condition will display AnonymousNotifiable
            mean here I send the notificationEmail to anonymousUser
        */
        // Notification::route('mail', 'test@example.org')
        //     ->notify(new NewProposalNotification($proposal, $user));


        return redirect()->route('projects.show', $project->id)
            ->with('success', 'Your proposal has been submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
