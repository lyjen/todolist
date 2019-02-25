<?php 

namespace App\Http\Traits;
use Carbon\Carbon;

trait TasksTrait{
	
	public $dueDateFormatiing = true;
	
	public function getDueDateAttribute($value){
		if($this->dueDateFormatiing){
		return Carbon::parse($value)->toFormattedDateString();
		}else{
		return $this->attributes['due_date'] = $value;	
		}
	}

}