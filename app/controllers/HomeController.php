<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function doWeightProduct()
	{
		$jarak = (int)Input::get('jarak');
		$harga = (int)Input::get('harga');
		$suasana = (int)Input::get('suasana');

		$total = $jarak + $harga + $suasana;

		$kriteria_jarak = $jarak / $total;
		$kriteria_harga = $harga / $total;
		$kriteria_suasana = $harga / $total;

		$total_nilai = 0;
		$list_kost = Kos::all();
		foreach ($list_kost as $kos) {
			$kos->nilai_kos = pow($kos->nilai_bobot_harga, $kriteria_harga) * pow($kos->nilai_bobot_jarak, $kriteria_jarak) * pow($kos->nilai_bobot_suasana, $kriteria_suasana);
			$kos->save();
			$total_nilai = $total_nilai + $kos->nilai_kos;
		}

		foreach ($list_kost as $kos) {
			$kos->nilai_akhir = $kos->nilai_kos / $total_nilai;
			$kos->save();
		}		

		return Kos::orderBy('nilai_akhir', 'DESC')->get();

	}

	public function main()
	{
		return View::make('/main')->with('list_kos', array());// Redirect::to('main')->with('list_kos', array());
	}

	public function findKos()
	{
		$jarak_str = Input::get('jarak');
		$harga_str = Input::get('harga');
		$suasana_str = Input::get('suasana');

		$jarak = 0;
		$harga = 0;
		$suasana = 0;

		if($jarak_str == "Dekat")
		{
			$jarak = 4;
		}
		else if($jarak_str == "Sedang")
		{
			$jarak = 4;
		}
		else if($jarak_str =="Jauh")
		{
			$jarak = 2;
		}
		else if($jarak_str =="Sangat Jauh")
		{
			$jarak = 1;
		}

		if($harga_str == "Murah")
		{
			$harga = 4;
		}
		else if($harga_str == "Sedang")
		{
			$harga = 3;
		}
		else if($harga_str == "Mahal")
		{
			$harga = 2;
		}
		else if($harga_str =="Sangat Mahal")
		{
			$harga = 1;
		}

		if($suasana_str == "Nyaman")
		{
			$suasana = 4;
		}
		else if($suasana_str == "Sedang")
		{
			$suasana = 3;
		}
		else if($suasana_str == "Tidak Nyaman")
		{
			$suasana = 2;
		}
		else if($suasana_str == "Sangat Tidak Nyaman")
		{
			$suasana = 1;
		}
		// weigth product
		$total = $jarak + $harga + $suasana;

		$kriteria_jarak = $jarak / $total;
		$kriteria_harga = $harga / $total;
		$kriteria_suasana = $harga / $total;

		$total_nilai = 0;
		$list_kost = Kos::all();
		foreach ($list_kost as $kos) {
			$kos->nilai_kos = pow($kos->nilai_bobot_harga, $kriteria_harga) * pow($kos->nilai_bobot_jarak, $kriteria_jarak) * pow($kos->nilai_bobot_suasana, $kriteria_suasana);
			$kos->save();
			$total_nilai = $total_nilai + $kos->nilai_kos;
		}

		foreach ($list_kost as $kos) {
			$kos->nilai_akhir = $kos->nilai_kos / $total_nilai;
			$kos->save();
		}		
		$list_kos = Kos::orderBy('nilai_akhir', 'DESC')->get();
		return View::make('/main')->with('list_kos', $list_kos);
	}



	public function login()
	{
		$email = Input::get('email');
		$password = Input::get('password');
		if(Auth::attempt(['email' => $email, 'password' => $password], false))
		{
			return Redirect::to('admin');
		}
		else 
		{
			return Redirect::to('login');
		}
	}
}
