<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('category')->insert([
                'name' => 'Category ' . $i,
                'slug' => 'category-' . $i,
                'image' => 'category-' . $i . '.png',
                'parent_id' => 0,
                'sort_order' => $i,
                'description' => 'Description for category ' . $i,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_by' => null,
                'status' => 1
            ]);
        }
    }
}
