<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SoftwareSeeder extends Seeder
{
    /**
     * Run the database seeds.
      php artisan db:seed --class=SoftwareSeeder
     */
    public function run(): void
    {
        //
        DB::table('softwares')->insert([
            ['name' => 'CRM System', 'description' => 'Customer relationship management software'],
            ['name' => 'Project Management', 'description' => 'Tool for managing projects and tasks'],
            ['name' => 'E-commerce Platform', 'description' => 'Online store and payment processing system']
        ]);
    }
}
