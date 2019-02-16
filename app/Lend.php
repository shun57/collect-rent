<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Lend extends Model
{
    const STATUS = [
         1 => [ 'status-label' => '未回収', 'class' => 'label-danger' ],
         2 => [ 'status-label' => '回収済', 'class' => 'label-info' ],
        ];
        
    public function getStatusLabelAttribute()
    {
        $status = $this->attributes['status'];
        
        if(!isset(self::STATUS[$status])){
            return '';
        }
        
        return self::STATUS[$status]['status-label'];
    }
    
    public function getStatusClassAttribute()
    {
    $status = $this->attributes['status'];

    if (!isset(self::STATUS[$status])) {
        return '';
    }

    return self::STATUS[$status]['class'];
    }
    
    const INTERVAL = [
         1 => [ 'interval-label' => '1日', 'class' => 'label-default' ],
         2 => [ 'interval-label' => '1週間', 'class' => 'label-default' ],
        ];
        
    public function getIntervalLabelAttribute()
    {
        $interval = $this->attributes['interval'];
        
        if(!isset(self::INTERVAL[$interval])){
            return '';
        }
        
        return self::INTERVAL[$interval]['interval-label'];
    }
    
    public function getIntervalClassAttribute()
    {
    $interval = $this->attributes['interval'];

    if (!isset(self::INTERVAL[$interval])) {
        return '';
    }

    return self::INTERVAL[$interval]['class'];
    }
    
    public function getFormattedCreatedAtAttribute()
    {
        $created_at = $this->attributes['created_at'];
        
        if (!isset($created_at)) {
        return '';
    }

         return Carbon::createFromFormat('Y-m-d H:i:s', $created_at)
             ->format('Y/m/d');
     }
}
