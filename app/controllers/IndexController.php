<?php 
// 流水线 控制器
class IndexController extends BaseController
{
	public function index() {
		$state = Input::get('state');
		$work = new Work();
		// dd($state);
		if ($state == '1' || $state == '2') {
			// dd($state);
			$work = $work->where('state', $state);
		}

		$works = $work->paginate(10);
		$re_data = array(
			'state'=> $state,
			'works' => $works,
		);
		// echo WorkDeal::progress($works[0]->id);

		return View::make('index.index',$re_data);
	}

	public function workDetail() {

		$work_id = Input::get('work_id');

		$work =  Work::where('id', $work_id)->first();

		$re_data = array(
			'work' => $work,
		);

		return View::make('index.detail', $re_data);
	}
	// 添加登记  部分添加  全部添加
	public function addWorkProcess() {
		$type = Input::get('type');
		$work = Input::get('work'); // 数量 单价 备注
		$user = Session::get('user');

		$work_log = new WorkLog();
		$work_log->addLog($type, $work, $user->id);
		return Redirect::to('/workDetail?work_id='. $work['id']);
	}


	// 添加流水线
	public function addWork() 
	{
		$process = Process::get();

		$re_data = array('process' => $process );
		return View::make('index.addWork', $re_data);
	}
	// 添加流水线
	public function doAddWork()
	{
		$work = Input::get('work');
		$work['created_time'] = date('Y-m-d H:i:s');
		// dd($work);
		Work::insert($work);
		return Redirect::to('/');
	}
}