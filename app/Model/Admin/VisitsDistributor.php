<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */

namespace App\Model\Admin;


use App\AbstractModel;

class VisitsDistributor extends AbstractModel
{
    protected $fillable = [
        'user_id','name','fantasy','slug','resbonsible','phone','date_visit',
        'cities_serving_region','meet_each_city',
        'disclose_and_increase_sales','date_works','comparative_privious_year','considerations_beer','comparative_privious_year','status', 'description','updated_at',
    ];


    protected $dates = [
        'date_visit','updated_at'
    ];

    protected $casts = [
        'date_visit'=>'date:d-m-Y','updated_at'=>'date:d-m-Y'
    ];

    protected $question;

    public function beers_scores(){

        return $this->hasMany(BeersScore::class);
    }
    public function beers_score($question){

        return $this->hasMany(BeersScore::class)->where('assets', $question)->first(['visits_distributor_id','name','assets','selected','date_option', 'description']);
    }

    public function setQuestion($question){

        $this->question =$question;

        return $this;
    }

    public function getQuestion01Attribute()
    {

        return $this->beers_score($this->question);
    }

    public function getQuestion02Attribute()
    {

        return $this->beers_score($this->question);
    }


    public function getQuestion03Attribute()
    {

        return $this->beers_score($this->question);
    }


    public function getQuestion04Attribute()
    {

        return $this->beers_score($this->question);
    }


    public function getQuestion05Attribute()
    {

        return $this->beers_score($this->question);
    }


    public function getQuestion06Attribute()
    {

        return $this->beers_score($this->question);
    }


    public function getQuestion07Attribute()
    {

        return $this->beers_score($this->question);
    }


    public function getQuestion08Attribute()
    {

        return $this->beers_score($this->question);
    }


    public function getQuestion09Attribute()
    {

        return $this->beers_score($this->question);
    }


    public function getQuestion10Attribute()
    {

        return $this->beers_score($this->question);
    }


    public function getQuestion11Attribute()
    {

        return $this->beers_score($this->question);
    }


    public function getQuestion12Attribute()
    {

        return $this->beers_score($this->question);
    }


    public function getQuestion13Attribute()
    {

        return $this->beers_score($this->question);
    }


    public function getQuestion14Attribute()
    {

        return $this->beers_score($this->question);
    }

    public function getQuestion15Attribute()
    {

        return $this->beers_score($this->question);
    }


    public function getQuestion16Attribute()
    {

        return $this->beers_score($this->question);
    }


    public function getQuestion17Attribute()
    {

        return $this->beers_score($this->question);
    }


    public function getQuestion18Attribute()
    {

        return $this->beers_score($this->question);
    }


    public function getQuestion19Attribute()
    {

        return $this->beers_score($this->question);
    }


    public function getQuestion20Attribute()
    {

        return $this->beers_score($this->question);
    }
}