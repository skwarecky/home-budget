<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserBudget extends Model
{
    use HasFactory;

	/**
	 * The table name
	 * @var string
	 */
	protected $table = 'user_budget';


	/**
	 * Turn off timestamps
	 * @var bool
	 */
	public $timestamps = false;


	/**
	 * The attributes that are mass assignable.
	 * @var array<int, string>
	 */
	protected $fillable = [
		'user_id',
		'budget_id',
	];

	/**
	 * Relation article_asset.asset_id = assets.id
	 * @return BelongsTo
	 */
	public function budget(): BelongsTo
	{
		return $this->belongsTo(Budget::class);
	}

	/**
	 * Relation article_asset.asset_id = assets.id
	 * @return BelongsTo
	 */
	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}
