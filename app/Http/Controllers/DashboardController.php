<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Books;

class DashboardController extends Controller
{
    public function index()
    {
        $books = Books::all();
        $booksCount = Books::where('available_copies', '>', 0)->count();

        return Inertia::render('dashboard', [
            'books' => $books,
            'booksCount' => $booksCount
        ]);
    }
}
