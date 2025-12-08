<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view("auth.home");   
    }
}
