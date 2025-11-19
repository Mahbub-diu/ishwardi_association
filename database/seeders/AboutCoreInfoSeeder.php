<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutInfoLandingPage;

class AboutCoreInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $bulletPoints = "['We provide a broad range of capacity building & skills development services', 'We specialize in organization and implementation of local and overseas training', 'We provide a broad range of capacity building & skills development services', 'We specialize in organization and implementation of local and overseas training']";
         $bannerImage = "about_banner_";
         $featureImage = "about_feature_";
         $aboutText = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
			

        for ($serviceId=1; $serviceId < 6; $serviceId++) {
            
            				
			AboutInfoLandingPage::create(['service_id' => $serviceId, 'bullet_points' => $bulletPoints, 'banner_image' => $bannerImage.$serviceId.'.png', 'feature_image' => $featureImage.$serviceId.'.png', 'about_text' => $aboutText ]);
				
             
        }
    }
}
