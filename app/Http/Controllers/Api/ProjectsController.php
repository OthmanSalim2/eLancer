<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Models\User;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Response;
use Storage;

class ProjectsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $entries = Project::latest()->paginate();
        $entries = Project::with([
            'category:id,name',
            'user:id,name',
            'tags:id,name'
        ])->latest()->paginate();
        // $entries = Project::latest()->get([
        //     'id', 'title', 'description', 'category_id', 'type'
        // ]);

        // here from features of laravel when return collection laravel direct convert to json
        // return $entries;

        // here use this way if I need pass collection to resource
        return ProjectResource::collection($entries);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        // $user = $request->user();
        $user = User::find(1);

        // $request->merge([
        //     'user_id' => $user->id, // Auth::id()
        // ]);
        // $project = Project::create($request->all());

        $data = $request->except('attachments');

        $project = $user->projects()->create($data);

        $tags = explode(',', $request->input('tags'));
        $project->syncTags($tags);

        return $project;
        //here I send the data and the status clearly. and the same result if sent the $project only
        // return response($project, 201);
        // other way
        //     return response()->json($project, 201);
        //     return Response::json($project, 201);
        //     return new JsonResponse($project, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // return Project::with('category')->find($id);

        // here load() ,method the same with() it's with Model but load() be with object
        // return $project->load(['category:id,name', 'user', 'tags']);

        // here just the data that determined by me
        return new ProjectResource($project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'description' => ['sometimes', 'required', 'string'],
            'type' => ['sometimes', 'required', 'in:hourly,fixed'],
            'budget' => ['nullable', 'numeric', 'min:0'],
        ]);


        $project->update($request->all());

        return $project;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $user = Auth::guard('sanctum')->user();

        if (!$user->tokenCan('projects.delete')) {
            return Response::json([
                'message' => 'Permission denied!'
            ], 403);
        }

        $project->delete();

        foreach ($project->attachments as $file) {
            Storage::disk('public')->delete($file);
        }

        // here laravel automatic will convert to json object
        return [
            'message' => 'Project deleted',
        ];
    }
}
