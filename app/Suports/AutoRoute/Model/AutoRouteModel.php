<?php

/**
 * ==============================================================================================================
 *
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 * ==============================================================================================================
 */
namespace App\Suports\AutoRoute\Model;


use App\AbstractModel;
use App\Suports\AutoRoute\Contracts\iAutoRouteModel;
use Illuminate\Support\Facades\DB;

class AutoRouteModel extends AbstractModel implements iAutoRouteModel
{
    protected $table    = 'stored_routes';
    protected $fillable = [
        'user_id',
        'verb',
        'prefix',
        'name',
        'slug',
        'route',
        'pattern',
        'controller',
        'method',
        'middleware',
        'resource',
        'description',
        'updated_at'
    ];
    public $timestamps = false;

    public function tableExists(): bool
    {
        $driver = config('database.default');
        switch ($driver) {
            case 'mysql':
                return $this->inMySQL();
            case 'pgsql':
                return $this->inPostgres();
            case 'mssql':
                // TO DO
                return false;
            case 'sqlite':
                // TO DO
                return false;
        }
        return false;
    }
    protected function inMySQL(): bool
    {
        $stmt = "SHOW TABLES LIKE '{$this->getTable()}'";
        return DB::connection()->getPdo()->query($stmt)->rowCount() > 0;
    }
    protected function inPostgres(): bool
    {
        $stmt  = "SELECT to_regclass('public.{$this->getTable()}');";
        $conn  = DB::connection()->getPdo();
        $check = $conn->prepare($stmt);
        if ($check->execute()) {
            $result = $check->fetchAll(\PDO::FETCH_ASSOC);
            if (count($result) > 0) {
                return !!$result[0]['to_regclass'];
            }
        }
        return false;
    }
}
