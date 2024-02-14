<?php

namespace Database\Seeders;

use App\Models\People;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class PeopleDataEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // People::factory()->create([
        //     'name' => 'Student User',
        //     'email'=>'student@student.com',
        //     'password'=>bcrypt('password')
        // ]);

        // People::factory()->create([
        //     'name' => 'Teacher User',
        //     'email'=>'teacher@teacher.com',
        //     'password'=>bcrypt('password'),
        //     'role'=>'teacher'
        // ]);
        $faker = Factory::create();
        for($i=0;$i<=4;$i++){
            $people = new People();
            $people->name = $faker->name;
            $people->email  = $faker->email;
            $people->password = bcrypt('password');
            $people->save();
        }
    }
}
