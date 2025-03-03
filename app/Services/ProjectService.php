<?php

namespace App\Services;

use App\Filters\DepartmentFilter;
use App\Filters\NameFilter;
use App\Interfaces\ProjectServiceInterface;
use App\Models\Project;
use App\Pipeline\FilterPipeline;
use Illuminate\Pagination\LengthAwarePaginator;

class ProjectService implements ProjectServiceInterface
{

    /**
     * @param array $filters
     * @return LengthAwarePaginator
     */
    public function getAllProjects(array $filters = []): LengthAwarePaginator
    {
        $query = Project::query();

        $filteredQuery = (new FilterPipeline)
            ->add(new NameFilter)
            ->add(new DepartmentFilter)
            ->apply($query, $filters);

        return $filteredQuery->with('attributeValues.attribute')->paginate();
    }

    /**
     * @param Project $project
     * @return Project
     */
    public function getProject(Project $project): Project
    {
        return $project;
    }

    /**
     * @param array $data
     * @return Project
     */

    public function createProject(array $data): Project
    {
        $project = Project::create([
            'name' => $data['name'],
            'status' => $data['status'],
        ]);
        if (isset($data['attributes'])) {
            $project->attributeValues()->createMany($data['attributes']);
        }

        return $project->load('attributeValues.attribute');
    }


    /**
     * @param Project $project
     * @param array $data
     * @return Project
     */
    public function updateProject(Project $project, array $data): Project
    {
        $project->update($data);

        if (isset($data['attributes'])) {
            $attributeValues = $data['attributes'];
            $project->attributeValues()->each(function ($attributeValue, $index) use ($attributeValues) {
                $attributeValue->update($attributeValues[$index]);
            });
        }

        return $project->load('attributeValues.attribute');
    }


    /**
     * @param Project $project
     * @return bool
     */
    public function deleteProject(Project $project): bool
    {
        return $project->delete();
    }
}
