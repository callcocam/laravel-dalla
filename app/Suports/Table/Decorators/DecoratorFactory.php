<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */
namespace App\Suports\Table\Decorators;


use Illuminate\Support\Str;

class DecoratorFactory
{
    private static $namespace;

    public static function factoryCell($name, $options){

        self::$namespace = "\\App\\Suports\\Table\\Decorators\\Cell\\Plugin";

        $decorator = self::plugin($name);

        return $decorator->newInstanceArgs([$options]);
    }

    public static function factoryRow($name, $options){

        self::$namespace = "\\App\\Suports\\Table\\Decorators\\Row\\Plugin";

        $decorator = self::plugin($name);

        return $decorator->newInstanceArgs([$options]);
    }


    private static function plugin($name){

        $instace = new \ReflectionClass(sprintf("%s\\%sDecorator",self::$namespace, Str::title($name)));

        return $instace;
    }
}