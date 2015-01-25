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
				array('id'=>1, 'nama'=>'kos mama', 'nilai_bobot_harga' => 80 , 'nilai_bobot_jarak' => 40, 'nilai_bobot_suasana' =>20, 'nilai_jarak' => 4, 'nilai_harga' => 2, 'nilai_suasana'=> 1 ),
				array('id'=>2, 'nama'=>'kos syariah', 'nilai_bobot_harga' => 10 , 'nilai_bobot_jarak' => 60, 'nilai_bobot_suasana' =>90, 'nilai_jarak' => 1, 'nilai_harga' => 3, 'nilai_suasana'=> 4 ),
				array('id'=>3, 'nama'=>'kos khilafah', 'nilai_bobot_harga' => 40 , 'nilai_bobot_jarak' => 70, 'nilai_bobot_suasana' =>74, 'nilai_jarak' => 2, 'nilai_harga' => 3, 'nilai_suasana'=> 3 ),
				)
			);
	}

}
