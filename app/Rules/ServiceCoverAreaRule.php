<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\ServiceCoverArea;

class ServiceCoverAreaRule implements ValidationRule
{
   private $serviceId;
   
	public function __construct($sId)
    {
       $this->serviceId = $sId;

    }
	
	
   /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
		  
		  dd($value);
		$totalServiceCoverArea = 0;
        if( !empty( $this->serviceId && $value )  )
		{
			$totalServiceCoverArea = ServiceCoverArea::where('service_id', $input['service_id'])
			->where('area_name', $input['area_name'])
			->count();
		}
		
		if( $totalServiceCoverArea > 0 )
		{
			
		}
    }
	
	 /*public function passes($attribute, $value)
    {
		dd($value);
        //return $value >= 1990 && $value <= date('Y');
    }*/
	
	public function message()
    {
        return 'The :attribute must be between 1990 to '.date('Y').'.';
    }
}
