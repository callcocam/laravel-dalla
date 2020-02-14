<?php


namespace App\Services;


use App\Stage;

class StageService
{
    /**
     * @var Stage
     */
    private $stage;

    /**
     * StageSevice constructor.
     * @param Stage $stage
     */
    public function __construct(Stage $stage)
    {
        $this->stage = $stage;
    }

    public function load(){

        return $this->stage->orderBy('ordering','ASC')->get();
    }
}