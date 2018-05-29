<?php

use Illuminate\Database\Seeder;

class KhuVuc extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$khuVuc = [
			[ '01', 'Quận Ba Đình' ],
			[ '02', 'Quận Hoàn Kiếm' ],
			[ '03', 'Quận Hai Bà Trưng' ],
			[ '04', 'Quận Đống Đa' ],
			[ '05', 'Quận Tây Hồ' ],
			[ '06', 'Quận Cầu Giấy' ],
			[ '07', 'Quận Thanh Xuân' ],
			[ '08', 'Quận Hoàng Mai' ],
			[ '09', 'Quận Long Biên' ],
			[ '10', 'Quận Bắc Từ Liêm' ],
			[ '11', 'Huyện Thanh Trì' ],
			[ '12', 'Huyện Gia Lâm' ],
			[ '13', 'Huyện Đông Anh' ],
			[ '14', 'Huyện Sóc Sơn' ],
			[ '15', 'Quận Hà Đông' ],
			[ '16', 'Thị xã Sơn Tây' ],
			[ '17', 'Huyện Ba Vì' ],
			[ '18', 'Huyện Phúc Thọ' ],
			[ '19', 'Huyện Thạch Thất' ],
			[ '20', 'Huyện Quốc Oai' ],
			[ '21', 'Huyện Chương Mỹ' ],
			[ '22', 'Huyện Đan Phượng' ],
			[ '23', 'Huyện Hoài Đức' ],
			[ '24', 'Huyện Thanh Oai' ],
			[ '25', 'Huyện Mỹ Đức' ],
			[ '26', 'Huyện Ứng Hòa' ],
			[ '27', 'Huyện Thường Tín' ],
			[ '28', 'Huyện Phú Xuyên' ],
			[ '29', 'Huyện Mê Linh' ],
			[ '30', 'Quận Nam Từ Liêm' ],
		];
		foreach ( $khuVuc as $a ) {
			DB::table( 'khu_vucs' )->insert( [
				'codeLocation' => $a[0],
				'nameLocation'        => $a[1],
				'addressParkTaxi'     => '105 '. $a[1],
				'addressInputGasoline'     => '105 '. $a[1]
			] );
		}
        //
    }
}
