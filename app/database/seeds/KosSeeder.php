<?php

class KosSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('kos')->insert(
			array(
				array('id'=>1, 'nama'=>'kos mama', 'alamat' => 'jalan senggani no 3', 'longitude' => 112.62650,'latitude' => -7.981894, 'nilai_bobot_jarak' => 80 , 'nilai_bobot_harga' => 40, 'nilai_bobot_suasana' =>20, 'nilai_jarak' => 4, 'nilai_harga' => 2, 'nilai_suasana'=> 1 ),
				array('id'=>2, 'nama'=>'kos syariah',  'alamat' => 'jalan senggani no 4', 'longitude' => 112.72650,'latitude' => -7.881894, 'nilai_bobot_jarak' => 10 , 'nilai_bobot_harga' => 60, 'nilai_bobot_suasana' =>90, 'nilai_jarak' => 1, 'nilai_harga' => 3, 'nilai_suasana'=> 4 ),
				array('id'=>3, 'nama'=>'kos khilafah',  'alamat' => 'jalan senggani no 5', 'longitude' => 112.65650,'latitude' => -7.991894,'nilai_bobot_jarak' => 40 , 'nilai_bobot_harga' => 70, 'nilai_bobot_suasana' =>74, 'nilai_jarak' => 2, 'nilai_harga' => 3, 'nilai_suasana'=> 3 ),
				)
			);
		User::create(array('email' => 'fahmi_ae@yahoo.com' , 'password' => Hash::make('fahmi')));
	}

}
