<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['laravel', 'PHP', 'HTML', 'CSS', 'Java', 'Python'];

            foreach ($categories as $category)  {
                Category::create([
                    'name' => $category,
                ]);
            }
    }
}
