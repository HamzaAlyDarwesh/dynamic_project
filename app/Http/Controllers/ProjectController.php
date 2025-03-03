<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Interfaces\ProjectServiceInterface;
use App\Models\Project;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    use ApiResponse;

    public function __construct(protected ProjectServiceInterface $projectService)
    {
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $filters = $request->input('filters', []);

        $projects = $this->projectService->getAllProjects($filters);
        return ProjectResource::collection($projects)->response();
    }

    /**
     * @param CreateProjectRequest $request
     * @return JsonResponse
     */
    public function store(CreateProjectRequest $request): JsonResponse
    {
        $project = $this->projectService->createProject($request->validated());

        return $this->response(
            __('response.created_successfully'),
            $project,
            null,
            Response::HTTP_CREATED
        );
    }

    /**
     * @param Project $project
     * @return ProjectResource
     */
    public function show(Project $project): ProjectResource
    {
        $project = $this->projectService->getProject($project);
        return new ProjectResource($project);
    }

    /**
     * @param UpdateProjectRequest $request
     * @param Project $project
     * @return JsonResponse
     */
    public function update(UpdateProjectRequest $request, Project $project): JsonResponse
    {
        $project = $this->projectService->updateProject($project, $request->validated());

        return $this->response(
            __('response.updated_successfully'),
            $project,
            null,
            Response::HTTP_OK
        );
    }

    /**
     * @param Project $project
     * @return JsonResponse
     */
    public function destroy(Project $project): JsonResponse
    {
        $this->projectService->deleteProject($project);

        return $this->response(
            __('response.deleted_successfully'),
            null,
            null,
            Response::HTTP_OK
        );
    }
}
