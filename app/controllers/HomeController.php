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

	/**
	test weight product api
	**/

	public function doWeightProduct()
	{
		$jarak = (int)Input::get('jarak');
		$harga = (int)Input::get('harga');
		$suasana = (int)Input::get('suasana');

		$total = $jarak + $harga + $suasana;

		$kriteria_jarak = $jarak / $total;
		$kriteria_harga = $harga / $total;
		$kriteria_suasana = $suasana / $total;

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
	/**
	user page controller
	**/
	public function main()
	{
		return View::make('/main')->with('list_kos', array());// Redirect::to('main')->with('list_kos', array());
	}

	public function findKos()
	{
		$jarak_str = Input::get('jarak');
		$harga_str = Input::get('harga');
		$suasana_str = Input::get('suasana');
		$jalan = '%'. Input::get('jalan') . '%';

		$jarak = 0;
		$harga = 0;
		$suasana = 0;

		if($jarak_str == "Dekat")
		{
			$jarak = 4;
		}
		else if($jarak_str == "Sedang")
		{
			$jarak = 3;
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
		$kriteria_suasana = $suasana / $total;

		$total_nilai = 0;
		$list_kost = Kos::where('alamat', 'LIKE', $jalan)->get();
		foreach ($list_kost as $kos) {
			$kos->nilai_kos = pow($kos->nilai_bobot_harga, $kriteria_harga) * pow($kos->nilai_bobot_jarak, $kriteria_jarak) * pow($kos->nilai_bobot_suasana, $kriteria_suasana);
			// echo 'pow('.$kos->nilai_bobot_harga.', '. $kriteria_harga.') ='. pow($kos->nilai_bobot_harga, $kriteria_harga) . '<br>';
			$kos->save();
			$total_nilai = $total_nilai + $kos->nilai_kos;
		}
		foreach ($list_kost as $kos) {
			$kos->nilai_akhir = $kos->nilai_kos / $total_nilai;
			$kos->save();
		}		
		$list_kos = Kos::where('alamat', 'LIKE', $jalan)->orderBy('nilai_akhir', 'DESC')->get();
		return View::make('/main')->with('list_kos', $list_kos);
		// echo $jarak . ' ' . $harga . ' ' . $suasana .
		// '<br>' . $kriteria_jarak. ' ' . $kriteria_harga. ' ' . $kriteria_suasana; 
	}
	/**
	admin page
	**/
	public function login()
	{
		$email = Input::get('email');
		$password = Input::get('password');
		if(Auth::attempt(['email' => $email, 'password' => $password], true))
		{
			return Redirect::to('admin');
		}
		else 
		{
			return View::make('login');
		}
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('login');
	}

	/**
	
	**/
	
	public function admin()
	{
		if(Auth::check())
		{
			$list_kos = Kos::all();
			return View::make('admin')->with('list_kos', $list_kos);
		}
		else 
		{	
			
			return Redirect::to('login');
		}
	}

	public function tambah()
	{
		if(Auth::check())
		{
			return View::make('tambah')->with('kos', new Kos());
		}
		else 
		{	

			return Redirect::to('login');
		}
	}

	public function simpan()
	{
		$kos = new Kos();
		$kos->nama = Input::get('nama');
		$kos->alamat = Input::get('alamat');
		$kos->longitude = Input::get('longitude');
		$kos->latitude = Input::get('latitude');
		$kos->nilai_bobot_harga = Input::get('harga');
		$kos->nilai_bobot_jarak = Input::get('jarak');
		$kos->nilai_bobot_suasana = Input::get('suasana');
		$kos->nilai_harga = HomeController::get_nilai(Input::get('harga'));
		$kos->nilai_jarak = HomeController::get_nilai(Input::get('jarak'));
		$kos->nilai_suasana = HomeController::get_nilai(Input::get('suasana'));
		$kos->save();
		return Redirect::to('admin');
	}

	public function edit($id)
	{	
		$kos = Kos::find($id);
		return View::make('edit')->with('kos', $kos);
	}

	public function update($id)
	{
		$kos = Kos::find($id);
		$kos->nama = Input::get('nama');
		$kos->alamat = Input::get('alamat');
		$kos->longitude = Input::get('longitude');
		$kos->latitude = Input::get('latitude');
		$kos->nilai_bobot_harga = Input::get('harga');
		$kos->nilai_bobot_jarak = Input::get('jarak');
		$kos->nilai_bobot_suasana = Input::get('suasana');
		$kos->nilai_harga = HomeController::get_nilai(Input::get('harga'));
		$kos->nilai_jarak = HomeController::get_nilai(Input::get('jarak'));
		$kos->nilai_suasana = HomeController::get_nilai(Input::get('suasana'));
		$kos->save();
		return Redirect::to('admin');
	}

	public function delete($id)
	{
		$kos = Kos::find($id);
		$kos->delete();
		return Redirect::to('admin');
	}

	public function show($id)
	{
		$kos = Kos::find($id);
		return View::make('show')->with('kos', $kos);
	}

	public function get_nilai($value)
	{
		if($value >= 75 && $value <= 100){
			return 4;
		}
		else if($value >= 50 && $value <= 74){
			return 3;
		}
		else if($value >= 25 && $value <= 49){
			return 2;
		}
		else if($value >= 1 && $value <= 24){
			return 1;
		}
		else {
			return 0;
		}

	}
}
