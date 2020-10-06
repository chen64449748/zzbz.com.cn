<?php

class ProcessController extends BaseController
{
	public function process() {

		$process = Process::get();

		$re_data = array('process' => $process );
		return View::make('process.index', $re_data);
	}

	public function setProcess() {

	}

	public function processDetail() {

	}

	public function addProcess() {
		return View::make('process.add');
	}

	public function doAddProcess() {
		$process = Input::get('process');
		$process_detail = Input::get('process_detail');

		$process_data = array(
			'name' => $process,
			'created_time' => date('Y-m-d H:i:s'),
		);
		$process_detail_data = array();

		foreach ($process_detail as $key => $value) {
			$process_detail_data[$key]['name'] = $value;
			$process_detail_data[$key]['order'] = $key + 1;
			$process_detail_data[$key]['created_time'] = date('Y-m-d H:i:s');
		}

		$process_m = new Process();
		$process_m->addProcess($process_data, $process_detail_data);

		return Redirect::to('/process');
	}
}