<?php

namespace FactoryCms\FactoryCms\Services\Router;

use FactoryCms\FactoryCms\Services\Utils\Utils;

class RouterService
{
    /**
     * @var Utils
     */
    private $utils;

    private $adminNamespace = 'Admin';

    private $systemNamespace = 'SystemAdmin';

    public function __construct(Utils $utils)
    {
        $this->utils = $utils;
    }

    public function getAdminPrefix()
    {
        return config('easy.admin_prefix') ?? 'admin';
    }

    public function getSystemAdminPrefix()
    {
        return config('easy.system_admin_prefix') ?? 'admin';
    }

    public function adminAction(string $controller, $method)
    {
        $class = $this->utils->hasController($this->adminNamespace . '\\' . $controller);

        return [
            $class,
            $method
        ];
    }

    public function systemAction(string $controller, $method)
    {
        $class = $this->utils->hasController($this->systemNamespace . '\\' . $controller, true);

        return [
            $class,
            $method
        ];
    }

    /**
     * @return Utils
     */
    public function getUtils(): Utils
    {
        return $this->utils;
    }
}
