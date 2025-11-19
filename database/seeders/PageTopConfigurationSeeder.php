<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PageTopConfiguration;

class PageTopConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
		PageTopConfiguration::create( ['page_name' => 'Who We Are', 'page_heading' => 'About IPTM', 'top_banner_short_paragraph' => 'Get infoormation', 'top_banner_image' => 'inner_01.jpg'] );
		PageTopConfiguration::create( ['page_name' => 'Completed Projects', 'page_heading' => 'Completed Projects', 'top_banner_short_paragraph' => 'Get infoormation', 'top_banner_image' =>  'inner_02.jpg'] );
		PageTopConfiguration::create( ['page_name' => 'Ongoing Projects', 'page_heading' => 'Ongoing Projects', 'top_banner_short_paragraph' => 'Get infoormation', 'top_banner_image' =>  'inner_03.jpg'] );
		PageTopConfiguration::create( ['page_name' => 'Clients', 'page_heading' => 'Clients', 'top_banner_short_paragraph' => 'Get infoormation', 'top_banner_image' =>  'inner_04.jpg'] );
		PageTopConfiguration::create( ['page_name' => 'News & Events', 'page_heading' => 'News & Events', 'top_banner_short_paragraph' => 'Get infoormation', 'top_banner_image' =>  'inner_05.jpg'] );
		PageTopConfiguration::create( ['page_name' => 'Gallery Category', 'page_heading' => 'Gallery CategoryM', 'top_banner_short_paragraph' => 'Get infoormation', 'top_banner_image' =>  'inner_06.jpg'] );
		PageTopConfiguration::create( ['page_name' => 'Gallery', 'page_heading' => 'Gallery', 'top_banner_short_paragraph' => 'Get infoormation', 'top_banner_image' =>  'inner_07.jpg'] );
		PageTopConfiguration::create( ['page_name' => 'Career', 'page_heading' => 'Career', 'top_banner_short_paragraph' => 'Get infoormation', 'top_banner_image' =>  'inner_08.jpg'] );
		PageTopConfiguration::create( ['page_name' => 'Contact Us', 'page_heading' => 'Contact Us', 'top_banner_short_paragraph' => 'Get infoormation', 'top_banner_image' =>  'inner_09.webp'] );
		
    }
}
