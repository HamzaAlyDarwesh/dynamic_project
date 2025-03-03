<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * @OA\Schema(
     *     schema="ProjectResource",
     *     @OA\Property(
     *         property="id",
     *         type="integer",
     *         example=1
     *     ),
     *     @OA\Property(
     *         property="name",
     *         type="string",
     *         example="Project A"
     *     ),
     *     @OA\Property(
     *         property="status",
     *         type="string",
     *         example="active"
     *     ),
     * )
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status,
            'attributes' => AttributeValueResource::collection($this->attributeValues),
        ];
    }
}
