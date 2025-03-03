<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Project;
use Illuminate\Database\Seeder;

class AttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project = Project::first();

        $departmentAttribute = Attribute::where('name', 'department')->first();
        $startDateAttribute = Attribute::where('name', 'start_date')->first();
        $endDateAttribute = Attribute::where('name', 'end_date')->first();

        AttributeValue::create([
            'attribute_id' => $departmentAttribute->id,
            'entity_id' => $project->id,
            'entity_type' => Project::class,
            'value' => 'IT',
        ]);

        AttributeValue::create([
            'attribute_id' => $startDateAttribute->id,
            'entity_id' => $project->id,
            'entity_type' => Project::class,
            'value' => '2025-05-01',
        ]);

        AttributeValue::create([
            'attribute_id' => $endDateAttribute->id,
            'entity_id' => $project->id,
            'entity_type' => Project::class,
            'value' => '2025-12-01',
        ]);
    }
}
