<?php

namespace App\Interfaces;

use App\Models\Attribute;

interface AttributeServiceInterface
{
    public function getAllAttributes();

    public function createAttribute(array $data);

    public function getAttribute(Attribute $attribute);

    public function updateAttribute(Attribute $attribute, array $data);

    public function deleteAttribute(Attribute $attribute);
}
