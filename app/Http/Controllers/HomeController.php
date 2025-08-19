<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Inertia\Inertia;

use function PHPUnit\Framework\isNull;

class HomeController extends Controller
{
    public function __invoke()
    {
        return Inertia::render("Dashboard/Index");   
    }
}
