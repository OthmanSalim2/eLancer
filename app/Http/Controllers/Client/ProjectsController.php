<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ProjectRequest;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Project;
use App\Models\Tag;
use Auth;
use DB;
use Illuminate\Http\Request;
use Storage;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = Auth::user();

        // this's best in performance



        // this's relation just between projects and categories tables without parent in categories table
        // $projects = DB::table('projects')
        //     ->select('projects.*', 'parent.name as parent_name')
        //     ->leftJoin('categories as parent', 'projects.category_id', '=', 'parent.id')
        //     ->where('user_id', '=', $user->id)
        //     ->paginate();

        // dd($projects[0]);

        //other way
        $projects = $user->projects()->with('category.parent')->paginate();

        return view('client.projects.index', [
            'projects' => $projects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.projects.create', [
            'project' => new Project(),
            'types' => Project::types(),
            'categories' => $this->categories(),
            'tags' => [],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProjectRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ProjectRequest $request)
    {
        $user = $request->user();

        $data = $request->except('attachments');

        // here I add key to data array and value it attachments array
        $data['attachments'] = $this->uploadAttachments($request);

        // other way to insert project
        // $request->merge([
        //     'user_id' => Auth::id(),
        //     //other way to get id of user authentication
        //     // 'user_id' => $user->id,
        // ]);
        // $project = Project::create($request->all());

        // here already will take user_id from authentication user and insert it
        $project = $user->projects()->create($data);
        $tags = explode(',', $request->input('tags'));
        $project->syncTags($tags);

        return redirect()->route('client.projects.index')->with('success', 'Project added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $user = Auth::user();
        $project = DB::table('projects')->where([
            'user_id' => $user->id,
            'id' => $id,
        ])->get();

        // other way to get project
        // $project = $user->projects()->findOrFail($id);

        return view('client.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $project = $user->projects()->findOrFail($id);

        return view('client.projects.edit', [
            'project' => $project,
            'types' => Project::types(),
            'categories' => $this->categories(),
            'tags' => $project->tags()->pluck('name')->toArray(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProjectRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(ProjectRequest $request, string $id)
    {
        $user = Auth::user();
        $project = $user->projects()->findOrFail($id);

        $data = $request->except('attachments');

        $data['attachments'] = array_merge(($project->attachments ?? []), $this->uploadAttachments($request));

        $project->update($data);

        $tags = explode(',', $request->input('tags'));
        $project->syncTags($tags);


        return redirect()->route('client.projects.index')->with('success', 'Project updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(string $id)
    {
        // $project = Project::where('user_id', Auth::id())
        //     ->where('id', $id)
        //     ->delete();

        // other way to deleting processing
        $user = Auth::user();
        $project = $user->projects()->where('id', $id);
        $project->delete();

        foreach ($project->attachments as $file) {
            // other way
            // unlink(storage_path('app/public/' . $file));
            Storage::disk('public')->delete($file);
        }

        return redirect()->route('client.projects.index')->with('success', 'Project deleted');
    }

    protected function categories()
    {
        // here id represent key and name represent value
        // here always will return collection
        return Category::pluck('name', 'id')->toArray();
    }

    protected function uploadAttachments(Request $request)
    {
        if (!$request->hasFile('attachments')) {
            return;
        }
        $files = $request->file('attachments');
        $attachments = [];
        foreach ($files as $file) {
            if ($file->isValid()) {
                // path will take the path of file with name it
                $path = $file->store('/attachments', [
                    // here uploads it's represent custom disk in filesystem.php in config folder
                    'disk' => 'uploads',
                ]);
                $attachments[] = $path;
            }
        }

        return $attachments;
    }
}
