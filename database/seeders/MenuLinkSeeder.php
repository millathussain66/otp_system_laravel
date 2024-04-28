<?php

namespace Database\Seeders;

use App\Models\MenuLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuLink::factory()->count(60)->create();
    }
}
