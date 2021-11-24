<?php

use App\Category;
use App\User;
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
        //$this->call(UserSeeder::class);
        User::create([  'name' => 'INFO',
                        'email' => 'info@notarialatina.com',
                        'password'=> bcrypt('SEO.Organico')]);

        Category::create([  'name'          => 'Consulados',
                            'slug'          => 'consulados',
                            'body'          => 'Consulados de Paises']);
    }
}
