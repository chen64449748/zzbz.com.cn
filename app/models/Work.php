<?php 


class Work extends Eloquent
{
	protected $table = 'work';

	public function logs() {
    	return $this->hasMany('WorkLog', 'work_id', 'id');
    }
}