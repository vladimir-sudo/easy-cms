<?php


namespace FactoryCms\FactoryCms\Models;


use FactoryCms\FactoryCms\Traits\CallableSetGetMethodsTrait;
use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    use CallableSetGetMethodsTrait;

    protected $table = 'item_types';

}
