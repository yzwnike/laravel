<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'city'; // Per defecte la taula es diu igual que el model en plural i "snake_case".

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ID'; // Per defecte busca la columna "id".

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
      'ID',
      'Name',
      'CountryCode',
      'District',
      'Population'
    ];

    /**
     * Get the country that has the city.
     * 1st param: Model
     * 2nd param: Foreign key
     * 3rd param: Primary Key of the related table
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'CountryCode', 'Code');
    }
}
