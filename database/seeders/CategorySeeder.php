<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    var $_prifix = 'cat_';

    public function run()
    {
        Category::create([
            $this->_prifix.'name' => 'Man',
            $this->_prifix.'slug' => 'man',
            $this->_prifix.'status'=>1,
        ]);
    }
}
