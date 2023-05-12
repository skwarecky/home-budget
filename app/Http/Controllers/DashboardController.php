<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Inertia\Inertia;

class DashboardController extends Controller
{

	public function index(){
















		return Inertia::render('Dashboard', [
			'budgets' => Budget::with('type')->get()
		]);
	}

    public function store()
    {
        return 'eeee';
    }
}
