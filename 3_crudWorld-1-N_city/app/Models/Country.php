<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'country'; // Per defecte la taula es diu igual que el model en plural i "snake_case".

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'Code'; // Per defecte busca la columna "id".

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false; // Per defecte és true.

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string'; // Per defecte és int.

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false; // Per defecte és true.

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'Code',
      'Name',
      'Continent',
      'Region',
      'SurfaceArea',
      'IndepYear',
      'Population',
      'LifeExpectancy',
      'GNP',
      'GNPOld',
      'LocalName',
      'GovernmentForm',
      'HeadOfState',
      'Capital',
      'Code2'
    ];
    /**
     * Get the cities of the country.
     * 1st param: Model
     * 2nd param: Foreign key of the related table
     */
    public function cities()
    {
        return $this->hasMany(City::class, 'CountryCode');
    }
}
