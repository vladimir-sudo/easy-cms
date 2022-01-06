<?php

namespace FactoryCms\FactoryCms\Seeds;

use FactoryCms\FactoryCms\Models\ItemType;
use FactoryCms\FactoryCms\Models\ItemTypesModel;
use Illuminate\Database\Seeder;

class InitDataSeeder extends Seeder
{
    /**
     * @var array
     */
    private $start = [
        'type' => 'main',
        'children' => [
            [
                'type' => 'controller',
                'children' => [
                    [
                        'type' => 'admin_controller',
                    ],
                ]
            ],
            [
                'type' => 'model',
            ]
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->models as $model => $types) {
            $typeModel = new ItemTypesModel();
            $typeModel->setName($model);
            $typeModel->save();

            foreach ($types['types'] as $type) {
                $itemType = new ItemType();
                $itemType->setModel($typeModel);
                $itemType->setName($type);
                $itemType->save();
            }
        }
    }

    /**
     * @return array
     */
    public function getStart(): array
    {
        return $this->start;
    }
}
