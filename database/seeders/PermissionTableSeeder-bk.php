<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions['Role'] = ['role-list', 'role-create', 'role-edit', 'role-delete'] ;
        $permissions['User'] = ['user-list', 'user-create', 'user-edit', 'user-delete', 'user-active-inactive'] ;
        
		$permissions['Featured Services'] = ['featured-service-list', 'featured-service-create', 'featured-service-edit', 'featured-service-delete'] ;
        $permissions['Clients'] = ['clients-list', 'clients-create', 'clients-edit', 'clients-delete'] ;
       
		$permissions['About Core Info'] = ['about-core-info-list', 'about-core-info-create', 'about-core-info-edit', 'about-core-info-delete', 'about-core-info-submit', 'about-core-info-submit-reject', 'about-core-info-approve-reject', 'about-core-info-publish-unpublish'] ;
        $permissions['About Other Info'] = ['about-other-info-list', 'about-other-info-create', 'about-other-info-edit', 'about-other-info-delete', 'about-other-info-submit', 'about-other-info-submit-reject', 'about-other-info-approve-reject', 'about-other-info-publish-unpublish'] ;
        $permissions['Core Team'] = ['core-team-list', 'core-team-create', 'core-team-edit', 'core-team-delete', 'core-team-submit', 'core-team-submit-reject', 'core-team-approve-reject', 'core-team-publish-unpublish'] ;
        $permissions['Other Quantitative Value'] = ['other-quantitative-value-list', 'other-quantitative-value-create', 'other-quantitative-value-edit', 'other-quantitative-value-delete'] ;
        
	    $permissions['Ongoing Activities'] = ['ongoing-activities-list', 'ongoing-activities-create', 'ongoing-activities-edit', 'ongoing-activities-delete', 'ongoing-activities-submit', 'ongoing-activities-submit-reject', 'ongoing-activities-approve-reject', 'ongoing-activities-publish-unpublish'] ;
        $permissions['News And Event'] = ['news-event-list', 'news-event-create', 'news-event-edit', 'news-event-delete', 'news-event-submit', 'news-event-submit-reject', 'news-event-approve-reject', 'news-event-publish-unpublish'] ;
        
		$permissions['Career List'] = ['career-list', 'career-create', 'career-edit', 'career-delete', 'career-submit', 'career-submit-reject', 'career-approve-reject', 'career-publish-unpublish'] ;
        $permissions['Contact Us'] = ['contact-us-list', 'contact-us-create', 'contact-us-edit', 'contact-us-delete'] ;
        
		$permissions['Appreciation'] = ['appreciation-list', 'appreciation-create', 'appreciation-edit', 'appreciation-delete', 'appreciation-submit', 'appreciation-submit-reject', 'appreciation-approve-reject', 'appreciation-publish-unpublish'] ;	
		$permissions['Default/Services'] = ['service-list', 'service-edit'] ;
        
		$permissions['Page Top Configuration'] = ['page-top-configuration-list', 'page-top-configuration-edit'] ;	
		
	//dd($permissions);
	
        foreach ($permissions as $key => $parentPer) {
			
			foreach ($parentPer as  $permission) {
            
           
                Permission::create( ['section_name' => $key, 'name' => $permission] );

             
			}
        }
    }
}
