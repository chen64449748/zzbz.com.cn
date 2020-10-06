<?php

class WorkLog extends Eloquent
{
	protected $table = 'work_log';

	public function user() {
    	return $this->hasOne('User', 'id', 'user_id');
    }
    public function processDetail() {
    	return $this->hasOne('ProcessDetail', 'id', 'process_detail_id');
    }

	public function addLog($type, $work, $user_id) {


		if ($type == '1') {
			// 获取当前正在做的工序
			$now_process_detail = WorkDeal::workNow($work['id'], $work['process_id']);

			$this->insert(array(
				'work_id'=> $work['id'],
				'price'=> $work['price'],
				'num'=> $work['num'],
				'user_id' => $user_id,
				'created_time'=> date('Y-m-d H:i:s'),
				'process_detail_id' => $now_process_detail['id'],
			));

			//  点 添加
		} else if ($type == '2') {
			//	填 确认完成
			$now_process_detail = WorkDeal::workNow($work['id'], $work['process_id']);

			$this->insert(array(
				'work_id'=> $work['id'],
				'price'=> '0',
				'num'=> '0',
				'user_id' => $user_id,
				'created_time'=> date('Y-m-d H:i:s'),
				'process_detail_id' => $now_process_detail['id'],
				'state' => '2',
			));
			
			$next_process_detail = WorkDeal::workNow($work['id'], $work['process_id']);

			if ($next_process_detail['id'] == '0') {
				// 全部完成了
				Work::where('id', $work['id'])->update(array(
					'state' => 2,
				));
			}
		}

	}


}