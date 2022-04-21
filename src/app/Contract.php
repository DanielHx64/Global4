<?php

namespace App;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'customer_id', 'tariff_id', 'startDate', 'endDate',
	];

	/**
	 *
	 * @var string[]
	 */
	protected $casts = [
		'startDate' => 'date:d-m-Y',
		'endDate' => 'date:d-m-Y',
	];

	/**
	 * Get the customer for this contract.
	 */
	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}

	/**
	 * Get the tariff for this contract.
	 */
	public function tariff()
	{
		return $this->belongsTo(Tariff::class);
	}

	/**
	 * Prepare a date for array / JSON serialization.
	 *
	 * @param  \DateTimeInterface  $date
	 * @return string
	 */
	protected function serializeDate(DateTimeInterface $date)
	{
		return $date->format('Y-m-d');
	}
}
