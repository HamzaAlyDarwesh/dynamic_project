<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAttributeRequest;
use App\Http\Requests\UpdateAttributeRequest;
use App\Http\Resources\AttributesResource;
use App\Interfaces\AttributeServiceInterface;
use App\Models\Attribute;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AttributeController extends Controller
{
    use ApiResponse;

    public function __construct(protected AttributeServiceInterface $attributeService)
    {
    }

    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $attributes = $this->attributeService->getAllAttributes();

        return AttributesResource::collection($attributes)->response();
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateAttributeRequest $request
     * @return JsonResponse
     */
    public function store(CreateAttributeRequest $request): JsonResponse
    {
        $attribute = $this->attributeService->createAttribute($request->validated());

        return $this->response(
            __('response.created_successfully'),
            $attribute,
            null,
            Response::HTTP_CREATED
        );    }

    /**
     * Display the specified resource.
     * @param Attribute $attribute
     * @return AttributesResource
     */
    public function show(Attribute $attribute): AttributesResource
    {
        $attribute = $this->attributeService->getAttribute($attribute);

        return new AttributesResource($attribute);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateAttributeRequest $request
     * @param Attribute $attribute
     * @return JsonResponse
     */
    public function update(UpdateAttributeRequest $request, Attribute $attribute): JsonResponse
    {
        $attribute = $this->attributeService->updateAttribute($attribute, $request->validated());

        return $this->response(
            __('response.updated_successfully'),
            $attribute,
            null,
            Response::HTTP_OK
        );    }

    /**
     * @param Attribute $attribute
     * @return JsonResponse
     */
    public function destroy(Attribute $attribute): JsonResponse
    {
        $this->attributeService->deleteAttribute($attribute);

        return $this->response(
            __('response.deleted_successfully'),
            null,
            null,
            Response::HTTP_OK
        );
    }
}
