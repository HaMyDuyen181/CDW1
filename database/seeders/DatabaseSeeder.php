<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    $this->call([
        BannerSeeder::class,
        BrandSeeder::class,
        CategorySeeder::class,
        ContactSeeder::class,
        MenuSeeder::class,
        OrderdetailSeeder::class,
        OrderSeeder::class,
        PostSeeder::class,
        ProductSeeder::class,
        TopicSeeder::class,
        UserSeeder::class,
    ]);
}

}
