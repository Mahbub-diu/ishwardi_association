<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		   				
		Service::create( ['name' => 'cap-buil-kase-dev', 'route' => 'cap-buil-kase-dev', 'short_description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.'] );
		Service::create( ['name' => 'Foreign Training, Study Tour, & Exposure Visit', 'route' => 'foreign-training-study-tour', 'short_description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.'] );
		Service::create( ['name' => 'Research & Implementation', 'route' => 'research', 'short_description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.'] );
		Service::create( ['name' => 'Consultancy (National & International)', 'route' => 'local-international-consultancy', 'short_description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.'] );
		Service::create( ['name' => 'Institute of Professional Training & Management (IPTM)', 'route' => '/', 'short_description' => ''] );
		
    }
}
