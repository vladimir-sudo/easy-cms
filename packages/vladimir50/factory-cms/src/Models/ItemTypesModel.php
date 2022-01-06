<?php


namespace FactoryCms\FactoryCms\Models;


use FactoryCms\FactoryCms\Traits\CallableSetMethodsTrait;
use Illuminate\Database\Eloquent\Model;

class ItemTypesModel extends Model
{
    use CallableSetMethodsTrait;

    protected $table = 'item_types_models';

    protected $fillable = [
        'name'
    ];
}
