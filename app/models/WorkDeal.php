<?php

class WorkDeal extends Eloquent
{
	static function workNow($id, $process_id) {
		// 当前进行中的工序

		// 已经完成的工序
		// dd($id);
		// name key
		$complete_pro = WorkLog::where('work_id', $id)->where('state', '2')->lists('process_detail_id');
		// print_r($process_id);
		// 所有工序
		$all_pro = ProcessDetail::where('process_id', $process_id)->orderBy('order', 'asc')->lists('id', 'name');
		// print_r($all_pro);

		// 全新的流水线
		if (!$complete_pro) {
			// 获取第一条记录
			reset($all_pro);
			$r_arr = array(
				'id' => reset($all_pro),
				'name' => key($all_pro),
			);
			
			return $r_arr;
		}

		//如果部分完成
		foreach ($complete_pro as $key => $value) {
			// 去掉已完成的
			$remove_key = array_search($value, $all_pro);
			
			if ($remove_key) {
				unset($all_pro[$remove_key]);
			}
		}

		if (!$all_pro) {
			return array('id'=> 0, 'name'=> '已完成');
		}

		$r_arr = array(
			'id' => reset($all_pro),
			'name' => key($all_pro),
		);
		return $r_arr;
	}

	static function progress($work_id) {
		// 工序进度
		$work = Work::where('id', $work_id)->first();
		
		if ($work->state == '2') {
			return 100;
		}

		$now_work = WorkDeal::workNow($work->id, $work->process_id);
		// 当前执行工序的 id
		$process_detail_id = $now_work['id'];

		// 正在做的 记录
		$logs = WorkLog::where('work_id', $work->id)->where('process_detail_id', $process_detail_id)->get();

		// 求已经做了记录总和
		$count = 0;
		foreach ($logs as $key => $log) {
			$count += (Int)$log->num;
		}

		if ($count >= (Int)$work->num) {
			return 100;
		} else {
			return round($count/(Int)$work->num,2) * 100;
		}

	}
}