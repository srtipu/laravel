<?php

use Illuminate\Http\Request;

Route::get('/', function () {
	return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/approval',function(){
	$users = App\User::where('role', ">", 0)->where('approval', 0)->get();

	if(empty($users)){
		$users = [];
	}

	return view('pages.user.userApproval',[
		'users' => $users
		]);
});

Route::get('/user/approve/{id}',function($id){
	$user = App\User::find($id);

	$user->approval = 1;

	$user->save();

	return redirect('/approval');
});

Route::get('/evaluation',function(){
	if(Auth::user()->role == 0){		

		$faculties = App\User::where('role', 1)->where('approval', 1)->get();

		if(empty($faculties)){
			$faculties = [];
		}

		return view('pages.evaluation.admin_evaluation_form',[
			'faculties' => $faculties,
			]);
	}
	else if(Auth::user()->role == 1){
		$calculations = App\Calculation::where('fid', Auth::user()->user_id)->get();

		foreach ($calculations as $calculation) {
			$calculation->Q_1_Average = ($calculation->Q_1)/$calculation->counter;
			$calculation->Q_2_Average = ($calculation->Q_2)/$calculation->counter;
			$calculation->Q_3_Average = ($calculation->Q_3)/$calculation->counter;
			$calculation->Q_4_Average = ($calculation->Q_4)/$calculation->counter;
			$calculation->Q_5_Average = ($calculation->Q_5)/$calculation->counter;

			$calculation->total = (($calculation->Q_1_Average) + ($calculation->Q_2_Average) + ($calculation->Q_3_Average) + ($calculation->Q_4_Average) + ($calculation->Q_5_Average));
			
			$calculation->overall = ($calculation->total)/5;
		}

		if(empty($calculations)){
			$calculations = [];
		}

		return view('pages.evaluation.faculty_evaluation',[
			'calculations' => $calculations,
			]);
	}
	else if(Auth::user()->role == 2){
		$calculations = App\Calculation::get();
		foreach ($calculations as $calculation) {
			$faculty =App\User::where('user_id', $calculation->fid)->get()->first();

			$calculation->fname = $faculty->name;
		}		

		if(empty($calculations)){
			$calculations = [];
		}

		return view('pages.evaluation.stu_evaluation_form',[
			'calculations' => $calculations,
			]);
	}

});


Route::post('/addCalculation',function(Request $request){
	$newCalculation = $request->all();

	App\Calculation::create([
		'fid' => $newCalculation['fid'],
		'cid' => $newCalculation['cid'],
		'Q_1' => 0,
		'Q_2' => 0,
		'Q_3' => 0,
		'Q_4' => 0,
		'Q_5' => 0,
		'counter' => 0,
		]);

	return redirect('/evaluation');
});

Route::post('/editCalculation',function(Request $request){
	$newCalculation = $request->all();

	$calculation = App\Calculation::find($newCalculation['id']);

	$calculation->Q_1 = $calculation->Q_1 + $newCalculation['Q_1'];
	$calculation->Q_2 = $calculation->Q_2 + $newCalculation['Q_2'];
	$calculation->Q_3 = $calculation->Q_3 + $newCalculation['Q_3'];
	$calculation->Q_4 = $calculation->Q_4 + $newCalculation['Q_4'];
	$calculation->Q_5 = $calculation->Q_5 + $newCalculation['Q_5'];
	$calculation->counter = $calculation->counter + 1;

	$calculation->save();

	return redirect('/evaluation');
});