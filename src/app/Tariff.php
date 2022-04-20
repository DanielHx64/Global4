<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tariff extends Model
{
   	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'service_id', 'contractLength', 'price',
	];


	/**
	 * @return BelongsTo
	 */
	public function service(): BelongsTo
	{
		return $this->belongsTo(Service::class);
	}

	public function contracts(): HasMany
	{
		return $this->hasMany(Contract::class);
	}
}
