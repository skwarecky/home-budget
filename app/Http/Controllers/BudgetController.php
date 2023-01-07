<?php

namespace App\Http\Controllers;

use App\Http\Requests\BudgetPatchRequest;
use App\Http\Requests\BudgetPostRequest;
use App\Models\Budget;
use App\Models\Type;
use App\Services\BudgetService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BudgetController extends Controller
{
	public function __construct(protected BudgetService $budgetService){}

	public function create(){
		$types = Type::all(['name', 'id']);

		return Inertia::render('Budget/Create',
			['types' => $types]);
	}

	public function store(BudgetPostRequest $request){

		if (!$this->budgetService->store($request->all())){
			return back()->with('message', 'Error occured while updating');
		}
		return redirect('dashboard');
	}

	public function edit(Budget $budget){
		$types = Type::all(['name', 'id']);

		return Inertia::render('Budget/Index', ['budget' => $budget, 'types' => $types]);
	}

	public function update(Budget $budget, BudgetPatchRequest $request){
		if (!$this->budgetService->update($budget, $request->all())) {
			return back()->with('message', 'Error occured while updating');
		}
		return redirect('dashboard');

	}
}
