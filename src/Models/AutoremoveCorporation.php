<?php


namespace Lvlo\Autoremove\Models;

use Illuminate\Database\Eloquent\Model;
use Seat\Eveapi\Models\Corporation\CorporationInfo;

class AutoremoveCorporation extends Model
{

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'corporation_id',
    ];

    protected $primaryKey = "corporation_id";

    public function getCorporation()
    {
        return CorporationInfo::find($this->corporation_id);
    }
}