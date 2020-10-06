<?php

class Process extends Eloquent
{
	protected $table = 'process';

	public function details()
    {
    	return $this->hasMany('ProcessDetail', 'process_id', 'id');
    }

	public function addProcess($process, $process_detail) {
		$process_id = $this->insertGetId($process);

		foreach ($process_detail as $key => $value) {
			$process_detail[$key]['process_id'] = $process_id;
		}

		ProcessDetail::insert($process_detail);
	}
}