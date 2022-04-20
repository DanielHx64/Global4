<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    /**
     * @var int $ID
     */
    public $ID;

    /**
     * @var int $customerID
     */
    public $customerID;

    /**
     * @var int $tariffID
     */
    public $tariffID;

    /**
     * @var dateTime $startDate
     */
    public $startDate;

    /**
     * @var dateTime $endDate
     */
    public $endDate;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'customer_id', 'tariff_id', 'startDate', 'endDate'
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
}
