<?php


namespace FactoryCms\FactoryCms\Traits;


use FactoryCms\FactoryCms\Exceptions\UndefinedMethodException;

trait CallableSetGetMethodsTrait
{
    public function __call($method, $parameters)
    {
        if (mb_substr($method, 0, 3) === 'set') {

            if (empty($parameters)) {
                //TODO: add exception
            }

            $property = $this->fromCamelCase(mb_substr($method, 3));

            if (gettype($parameters[0]) === 'object') {
                $object = $parameters[0];

                if (!empty($object->id)) {
                    //TODO: add exception
                }

                $this->{$property . '_id'} = $object->id;
            } else {
                $this->$property = $parameters[0];
            }

            return $this;
        }

        foreach (class_parents($this) as $parent) {
            if (method_exists($parent, '__call')) {
                return parent::__call($method, $parameters);
            }
        }

        $className = self::class;

        throw new UndefinedMethodException("Undefined method $method in class $className");
    }

    public function fromCamelCase($input)
    {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);

        $ret = $matches[0];

        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }
}
