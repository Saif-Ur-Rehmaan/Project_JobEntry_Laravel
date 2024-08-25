<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Example categories to be seeded
         $categories = [
            ['name' => 'Marketing','SvgIcon'=>'<i class="fa fa-3x fa-mail-bulk text-primary mb-4"></i>'],
            ['name' => 'CustomerService','SvgIcon'=>'<i class="fa fa-3x fa-headset text-primary mb-4"></i>'],
            ['name' => 'Human Resource','SvgIcon'=>'<i class="fa fa-3x fa-user-tie text-primary mb-4"></i>'],
            ['name' => 'Project Management','SvgIcon'=>'<i class="fa fa-3x fa-tasks text-primary mb-4"></i>'],
            ['name' => 'Bussiness Development','SvgIcon'=>'<i class="fa fa-3x fa-chart-line text-primary mb-4"></i>'],
            ['name' => 'Sales and Communication','SvgIcon'=>'<i class="fa fa-3x fa-hands-helping text-primary mb-4"></i>'],
            ['name' => 'Teaching and Education','SvgIcon'=>'<i class="fa fa-3x fa-book-reader text-primary mb-4"></i>'],
            ['name' => 'Design and Creative','SvgIcon'=>'<i class="fa fa-3x fa-drafting-compass text-primary mb-4"></i>'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
