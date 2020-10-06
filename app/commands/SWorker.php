<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Workerman\Worker;

class SWorker extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'sworker';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';
	protected $connections = array(); // 搜集所有链接
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		require_once __DIR__ . '/../Workerman/Autoloader.php';
		$ws_worker = new Worker("websocket://192.168.2.200:2000");
		$ws_worker->count = 4;

		$ws_worker->onConnect = function($connection)
		{
		    
		};

		$ws_worker->onMessage = function ($connection, $data) {
			if ($data == 'fh-add-pc') {
				$this->connections['fh']['pc'] = $connection; 
				if (!isset($this->connections['fh']['mobile'])) {
					$this->connections['fh']['mobile'] = array();
				}
				$connection->send('主机添加成功');
				return;
				// $ws_worker->connections[$connection->id]
			}
			if ($data == 'fh-add-mobile') {
				$this->connections['fh']['mobile'][$connection->id] = $connection;
				return;
			}

			if ($data == 's') {
				$this->connections['fh']['pc']->send('主机');
				return;
			}
			// $this->connections['fh']['pc']->send($data); // 给pc端发信息
			foreach ($this->connections['fh']['mobile'] as $key => $value) {
				$value->send($data);
			}


			// if (strpos($data, 'websocket-fh-sm-pc') !== false) {
			// 	$q_data = rtrim(ltrim(substr($data, 18), '{'), '}');
			// 	foreach ($this->connections['fh']['mobile'] as $key => $value) {
			// 		$value->send($q_data);
			// 	}
			// }
		};


		Worker::runAll();
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			
		);
	}

}
