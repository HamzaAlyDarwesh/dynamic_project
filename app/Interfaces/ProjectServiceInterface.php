<?php

namespace App\Interfaces;

use App\Models\Project;

interface ProjectServiceInterface
{
    public function getAllProjects(array $filters);

    public function getProject(Project $project);

    public function createProject(array $data);

    public function updateProject(Project $project, array $data);

    public function deleteProject(Project $project);
}
