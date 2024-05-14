<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Search extends Users
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showRecords()
    {
        $records = DB::select("SELECT * FROM users");
        $this->TPL["records"] = $records;
        return view("search", $this->TPL);
    }

    public function searchRecords(Request $request)
    {
        $userInput = $request->input('userInput');
        $records = DB::table('users')
            ->where('first_name', 'like', "%$userInput%")
            ->orWhere('last_name', 'like', "%$userInput%")
            ->orWhere('age', 'like', "%$userInput%")
            ->orWhere('email', 'like', "%$userInput%")
            ->get();

        return response()->json($records);
    }
}
