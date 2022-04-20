<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'type', 'name',
	];

	/**
	 * Get the tariff for the service.
	 */
	public function tariffs()
	{
		return $this->hasMany(Tariff::class);
	}
}
