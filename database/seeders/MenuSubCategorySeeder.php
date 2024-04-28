<?php

namespace Database\Seeders;

use App\Models\MenuSubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuSubCategory::factory()->count(30)->create();
        
    }
}
