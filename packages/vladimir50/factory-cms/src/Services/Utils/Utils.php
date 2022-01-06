<?php

namespace FactoryCms\FactoryCms\Services\Utils;

use FactoryCms\FactoryCms\Exceptions\UndefinedControllerException;

class Utils
{
    /**
     * @var string
     */
    private $laravelControllersPrefix = "App\Http\Controllers\\";

    /**
     * @var string
     */
    private $easyControllersPrefix = 'FactoryCms\FactoryCms\Controllers\\';

    /**
     * @return string
     */
    public function getEasyControllersPrefix(): string
    {
        return $this->easyControllersPrefix;
    }

    /**
     * @return string
     */
    public function getLaravelControllersPrefix(): string
    {
        return $this->laravelControllersPrefix;
    }

    /**
     * @param string $class
     * @param bool $isSystem
     * @return string
     * @throws UndefinedControllerException
     */
    public function hasController(string $class, bool $isSystem = false): string
    {
        $laravelController = $this->getLaravelControllersPrefix() . $class;
        $easyController = $this->getEasyControllersPrefix() . $class;

        if (class_exists($laravelController) and $isSystem) {
            return $laravelController;
        } elseif (class_exists($easyController)) {
            return $easyController;
        }

        throw new UndefinedControllerException($class);
    }
}
