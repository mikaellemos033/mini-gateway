<?php 

namespace App;

abstract class Model
{
	protected $connect;
	protected $table;
	protected $fillable = [];

	public function __construct()
	{
		$this->connect = single('db');
	}

	public function all()
	{
		return $this->connect->select()->run($this->table)->execute();
	}

	public function update($id, array $params)
	{
		return $this->connect
					->update()
					->run($this->table, $params)
					->where('id = :id', compact('id'))
					->execute();
	}

	public function create(array $params)
	{		
		foreach (array_keys($params) as $key)
			if (in_array($key, $this->fillable)) unset($params[$key]);		

		return $this->connect->insert()->run($this->table, $params)->execute();
	}

	public function delete($where = null, array $binds = [])
	{
		$delete = $this->connect->delete($this->table);
		if ($where) $delete->where($where, $binds);

		return $delete->execute();
	}

	protected function connect()
	{
		return $this->connect;
	}
}