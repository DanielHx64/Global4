<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'address',
	];

	/**
	 * Get the tariff for the service.
	 * @return HasMany
	 */
	public function contracts(): HasMany
	{
		return $this->hasMany(Contract::class);
	}
}
