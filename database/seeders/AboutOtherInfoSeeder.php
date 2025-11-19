<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutInfo;

class AboutOtherInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		
        AboutInfo::create([

            "about_primary_info" => "IPTM was established in February 2015 with its full name, The Institute of Professional Training and Management. Since its inception, it has been dedicated to fostering human resource development and capacity-building across various sectors. IPTM has played a pivotal role in providing multi-sectorial training, organizing experiential exchange visits and study tours, and facilitating technology and knowledge transfer. As it embarked on its journey in the sector, IPTM also ventured into research and consultancy services, further expanding its scope of expertise. This strategic expansion allowed IPTM to not only deliver impactful training and developmental programs but also contribute valuable research insights and expert consultancy to organizations seeking to enhance their operational efficiency and effectiveness.\r\n\r\nIn a recent evolution of its services, IPTM has further extended its expertise into the realms of research and consultancy. This strategic expansion has enabled IPTM to actively engage with a broader spectrum of stakeholders, including the Government of Bangladesh (GOB), international and bilateral governmental organizations (I/BGOs), and United Nations bodies. Through its research initiatives and consultancy offerings, IPTM now contributes substantively to evidence-based decision-making processes and provides strategic guidance to these esteemed entities. \r\n\r\nIPTM\'s dedication to excellence is underscored by its ISO 9001:2015 (Certificate Number: BDQ 155I155) certification—an affirmation of its stringent quality management procedures that permeate every facet of program implementation. This certification is a testament to IPTM\'s unwavering dedication to maintaining the highest standards in its research, consultancy, and capacity development initiatives, thereby solidifying its reputation as a trusted partner in driving sustainable progress.", 

			"mission_statement" => "To facilitate organizational development of the national and international organizations by arranging high-quality skills enhancement and capacity-building programs.",
			
            "vision_statement" => "VISION To emerge as an innovative and value-based organization that promotes sustainable development.",
			
            "value_risk_policy" => "To facilitate organizational development of the national and international organizations by arranging high-quality skills enhancement and capacity building programs To facilitate organizational development of the national and international organizations by arranging high-quality skills enhancement and capacity building programs.To facilitate organizational development of the national and international organizations by arranging high-quality skills enhancement and capacity building programs To facilitate organizational development of the national and international organizations by arranging high-quality skills enhancement and capacity building programs.",
            
			"total_experience_year" => "5"
        ]);

		
    }
}
