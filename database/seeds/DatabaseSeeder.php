<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('cities')->insert([
            [
                'name' => 'Jakarta',
                'image' => 'jakarta.jpg'
            ],
            [
                'name' => 'Jogja',
                'image' => 'jogjakarta.jpg'
            ],
            [
                'name' => 'Bali',
                'image' => 'bali.jpg'
            ],
            [
                'name' => 'Bogor',
                'image' => 'bogor.jpg'
            ],
            [
                'name' => 'Bekasi',
                'image' => 'bekasi.jpg'
            ],
            [
                'name' => 'Bandung',
                'image' => 'bandung.jpg'
            ],
            [
                'name' => 'Medan',
                'image' => 'medan.jpg'
            ],
            [
                'name' => 'Manado',
                'image' => 'manado.jpg'
            ],
        ]);
        DB::table('places')->insert([
            [
                'city_id' => '1',
                'name' => 'Ancol',
                'image' => 'ancol.jpg',
                'address' => 'Jalan Lodan Timur No.7, RW.10, Ancol, Pademangan, Jakarta Utara, Daerah Khusus Ibukota Jakarta 14430',
                'category' => 'Landscape',
                'rating' => '4.2',
                'opening' => '24 Hours',
                'duration' => '3',
            ],
            [
                'city_id' => '1',
                'name' => 'Central Park',
                'image' => 'centralpark.jpg',
                'address' => 'Jl. Let. Jend. S. Parman I No.Kav.28, RT.12/RW.6, Tj. Duren Sel., Grogol petamburan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11470',
                'category' => 'Landscape',
                'rating' => '4',
                'opening' => '10.00 - 22.00',
                'duration' => '4',
            ],
            [
                'city_id' => '1',
                'name' => 'Kota Tua',
                'image' => 'kotatua.jpg',
                'address' => 'Kota Tua, Mangga Besar, West Jakarta City, Jakarta',
                'category' => 'Landscape',
                'rating' => '3',
                'opening' => '24 Hours',
                'duration' => '1'
            ],
            [
                'city_id' => '3',
                'name' => 'Jimbaran',
                'image' => 'jimbaran.jpg',
                'address' => 'Jimbaran, South Kuta, Badung Regency, Bali',
                'category' => 'Landscape',
                'rating' => '4.3',
                'opening' => '24 Hours',
                'duration' => '2'
            ],
            [
                'city_id' => '3',
                'name' => 'Pantai Mengiat Nusa Dua',
                'image' => 'nusadua.jpg',
                'address' => 'Jl.Pantai Mengiat Kawasan ITDC, Nusa Dua, Kuta Selatan, Benoa, Kuta Sel., Kabupaten Badung, Bali 80363',
                'category' => 'Landscape',
                'rating' => '4.5',
                'opening' => '24 Hours',
                'duration' => '4'
            ],
            [
                'city_id' => '3',
                'name' => 'Pantai Kuta',
                'image' => 'kuta.jpg',
                'address' => 'Jl. Pantai Kuta, Kuta, Kabupaten Badung, Bali 80361',
                'category' => 'Landscape',
                'rating' => '4.8',
                'opening' => '24 Hours',
                'duration' => '2'
            ],
            [
                'city_id' => '3',
                'name' => 'Pura Uluwatu',
                'image' => 'pura.jpg',
                'address' => 'Pecatu, South Kuta, Badung Regency, Bali',
                'category' => 'Historical & Religious',
                'rating' => '4.5',
                'opening' => '08.00 - 18.00',
                'duration' => '3'
            ],
            [
                'city_id' => '3',
                'name' => 'Pura Tanah Lot',
                'image' => 'tanahlot.jpg',
                'address' => 'Jl. Tanah Lot, Beraban, Kediri, Kabupaten Tabanan, Bali',
                'category' => 'Historical & Religious',
                'rating' => '4.2',
                'opening' => '08.00 - 20.00',
                'duration' => '2'
            ],
            [
                'city_id' => '3',
                'name' => 'Pura Ulun Danu',
                'image' => 'ulundanu.jpg',
                'address' => 'Danau Beratan, Candikuning, Baturiti, Tabanan Regency, Bali 82191',
                'category' => 'Historical & Religious',
                'rating' => '4.0',
                'opening' => '08.00 - 20.00',
                'duration' => '2'
            ],
            [
                'city_id' => '3',
                'name' => 'Pura Goa Gajah',
                'image' => 'goagajah.jpg',
                'address' => 'Ubud, Bedulu, Blahbatuh, Kabupaten Gianyar, Bali',
                'category' => 'Historical & Religious',
                'rating' => '3.5',
                'opening' => '10.00 - 20.00',
                'duration' => '1'
            ],
            [
                'city_id' => '3',
                'name' => 'Pura Taman Ayun',
                'image' => 'tamanayun.jpg',
                'address' => 'Jl. Ayodya No.10, Mengwi, Kabupaten Badung, Bali 80351',
                'category' => 'Historical & Religious',
                'rating' => '3.6',
                'opening' => '09.00 - 20.00',
                'duration' => '1'
            ],
            [
                'city_id' => '3',
                'name' => 'Pura Rambutsiwi',
                'image' => 'rambutsiwi.jpg',
                'address' => 'Wisma Kerta, Sidemen, Karangasem Regency, Bali 80864',
                'category' => 'Historical & Religious',
                'rating' => '3.0',
                'opening' => '11.00 - 19.00',
                'duration' => '2'
            ],
            [
                'city_id' => '3',
                'name' => 'Potato Head Beach Club',
                'image' => 'potatohead.jpg',
                'address' => 'Jalan Petitenget No.51B, Kerobokan Kelod, Kuta Utara, Kerobokan Kelod, Kuta Utara, Kabupaten Badung, Bali 80361',
                'category' => 'Restaurant',
                'rating' => '4.2',
                'opening' => '10.00 - 19.00',
                'duration' => '1'
            ],
            [
                'city_id' => '3',
                'name' => 'Cocoon',
                'image' => 'cocoon.jpg',
                'address' => 'Jalan Double Six No. 66, Blue Ocean Boulevard, Seminyak, Kuta, Seminyak, Kuta, Kabupaten Badung, Bali 80361',
                'category' => 'Restaurant',
                'rating' => '4.6',
                'opening' => '13.00 - 22.00',
                'duration' => '1'
            ],
            [
                'city_id' => '3',
                'name' => 'Lv8',
                'image' => 'lv8.jpg',
                'address' => 'Lv8 Resort Hotel Bali, Jalan Pantai Berawa No. 100XX, Canggu, Tibubeneng, Kuta Utara, Tibubeneng, Kuta Utara, Kabupaten Badung, Bali',
                'category' => 'Restaurant',
                'rating' => '5.0',
                'opening' => '18.00 - 24.00',
                'duration' => '2'
            ],
            [
                'city_id' => '3',
                'name' => 'Motel Mexicola',
                'image' => 'mexicola.jpg',
                'address' => 'Jalan Kayu Jati No. 9X, Kerobokan Kelod, Kuta Utara, Kabupaten Badung, Bali 80361',
                'category' => 'Restaurant',
                'rating' => '4.0',
                'opening' => '18.00 - 24.00',
                'duration' => '3'
            ],
            [
                'city_id' => '3',
                'name' => 'Klapa',
                'image' => 'klapa.jpg',
                'address' => 'JL. New Kuta Beach, Pecatu Indah Resort Uluwatu, 80364, Kuta, Kabupaten Badung, Bali 80361',
                'category' => 'Restaurant',
                'rating' => '4.2',
                'opening' => '10.00 - 22.00',
                'duration' => '2'
            ],
            [
                'city_id' => '3',
                'name' => 'El kabron',
                'image' => 'kabron.jpg',
                'address' => 'Jl. Pantai Cemongkak, Pecatu, Kuta Selatan, Pecatu, Kuta Sel., Kabupaten Badung, Bali 80361',
                'category' => 'Restaurant',
                'rating' => '3.5',
                'opening' => '8.00 - 22.00',
                'duration' => '1'
            ],
            [
                'city_id' => '3',
                'name' => 'Mason Elephant Lodge',
                'image' => 'mason.jpg',
                'address' => 'Jl. Elephant Park, Taro, Tegallalang, Kabupaten Gianyar, Bali 80561',
                'category' => 'Hotel',
                'rating' => '4.0',
                'opening' => '24 Hours',
                'duration' => '2'
            ],
            [
                'city_id' => '3',
                'name' => 'Uma Ubud Bali',
                'image' => 'ubud.jpg',
                'address' => 'Uma Ubud, Jl. Raya Sanggingan, Banjar Lungsiakan, Kedewatan, Ubud, Kedewatan, Ubud, Kabupaten Gianyar, Bali 80571',
                'category' => 'Hotel',
                'rating' => '4.2',
                'opening' => '24 Hours',
                'duration' => '2'
            ],
            [
                'city_id' => '3',
                'name' => 'Soulshine Bali',
                'image' => 'soulshine.jpg',
                'address' => 'Soulshine Bali, JL. Ambarwati, Ubud, MAS, Gianyar, Kabupaten Gianyar, Bali 80571',
                'category' => 'Hotel',
                'rating' => '4.3',
                'opening' => '24 Hours',
                'duration' => '2'
            ],
            [
                'city_id' => '3',
                'name' => 'Warwick Ibah Luxury Villas & SPA',
                'image' => 'warwick.jpg',
                'address' => 'Warwick Ibah Luxury Villas & Spa, Jl. Raya Campuhan, Kedewatan, Ubud, Gianyar, Bali 80571',
                'category' => 'Hotel',
                'rating' => '4.5',
                'opening' => '24 Hours',
                'duration' => '2'
            ],
            [
                'city_id' => '3',
                'name' => 'The Villa Tejakula',
                'image' => 'tejakula.jpg',
                'address' => 'The Villas Tejakula, Jalan Setra, T',
                'category' => 'Hotel',
                'rating' => '4.2',
                'opening' => '24 Hours',
                'duration' => '2'
            ],
        ]);
    }
}
