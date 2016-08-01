<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Carbon\Carbon ;

class MainController extends Controller
{
    public function compareCreated($a, $b)
	{

	}

    public function overview()
    {
        $history = \DB::table('users')
            ->join('people', 'users.id', '=', 'people.user_id')
            ->select('users.email',
                'people.name_last',
                'people.name_first',
                'people.date_birth',
                'people.created_at',
                'people.updated_at')
            ->get();
            //dd($history);
            /*
        $history1=\DB::table('users')
            ->join('candidates', 'users.id', '=', 'candidates.user_id')
            ->select('users.email','candidates.*')
            ->get();
        $history2=\DB::table('users')
            ->join('companies', 'users.id', '=', 'companies.user_id')
            ->select('users.email','companies.*')
            ->get();
		foreach ($history1 as $key => $value) {
			array_push($history, $value);
		}
		foreach ($history2 as $key => $value) {
			array_push($history, $value);
		}*/
		//usort($history, 'compareCreated');
		//dd($history);
		//array_push($history,);
		//dd($history);
        $users= new User;
    	return view('overview',compact("history","users"));
    }
   
    public function history()
    {
        return view('history');
    }
}
