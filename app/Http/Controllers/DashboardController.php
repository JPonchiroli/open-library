<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Book;
use App\Models\Loan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $booksCount = Book::where('available_copies', '>', 0)->count();
        $loansCount = Loan::where('user_id', '=', Auth::id())->count();

        $loans = DB::select('SELECT bk.title, bk.author, ln.loan_date, ln.return_date
                            FROM loans ln
                            LEFT JOIN books bk on (bk.id = ln.book_id)
                            WHERE ln.user_id = ?', [Auth::id()]);

        return Inertia::render('dashboard', [
            'books' => $books,
            'booksCount' => $booksCount,
            'loans' => $loans,
            'loansCount' => $loansCount
        ]);
    }
}
