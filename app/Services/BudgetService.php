<?php

namespace App\Services;

use App\Models\Budget;

class BudgetService
{

	public function update(Budget $budget, array $request)
	{
		return $budget->fill($request)->save();
	}

	public function store(array $request)
	{
		return Budget::create(array_merge(['user_id' => data_get(auth()->user(), 'id')], $request));
	}
}
