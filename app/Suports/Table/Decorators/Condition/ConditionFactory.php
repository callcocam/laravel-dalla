<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */
namespace App\Suports\Table\Decorators\Condition;


class ConditionFactory
{

    private static $namespace;

    public static function factoryCondition($name, $options)
    {

        self::$namespace = "\\App\\Suports\\Decorators\\Condition\\Plugin";

        $decorator = self::plugin($name);

        return $decorator->newInstanceArgs([$options]);
    }

    private static function plugin($name)
    {

        $instace = new \ReflectionClass(sprintf("%s\\%s", self::$namespace, $name));

        return $instace;
    }
}