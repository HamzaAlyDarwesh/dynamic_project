<?php

namespace App\Services;

use App\Interfaces\AttributeServiceInterface;
use App\Models\Attribute;
use Illuminate\Pagination\LengthAwarePaginator;

class AttributeService implements AttributeServiceInterface
{
    /**
     * @return LengthAwarePaginator
     */
    public function getAllAttributes(): LengthAwarePaginator
    {
        return Attribute::paginate();
    }

    /**
     * @param array $data
     * @return Attribute
     */
    public function createAttribute(array $data): Attribute
    {
        return Attribute::create($data);
    }

    /**
     * @param Attribute $attribute
     * @return Attribute
     */
    public function getAttribute(Attribute $attribute): Attribute
    {
        return $attribute;
    }

    /**
     * @param Attribute $attribute
     * @param array $data
     * @return Attribute
     */
    public function updateAttribute(Attribute $attribute, array $data): Attribute
    {
        $attribute->update($data);
        return $attribute;
    }

    /**
     * @param Attribute $attribute
     * @return bool
     */
    public function deleteAttribute(Attribute $attribute): bool
    {
        return $attribute->delete();
    }
}
