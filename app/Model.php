<?php 

namespace App;

abstract class Model
{
	protected $connect;
	protected $table;
	protected $fillable = [];
	protected $primary_key = 'id';

	public function __construct()
	{
		$this->connect = single('db');
	}

	public function all()
	{
		return $this->select()->execute();
	}

	public function find($id)
	{		
		$item = $this->select()->where(sprintf('%s = :id', $this->primary_key), compact('id'))->execute();
		if (is_array($item)) return $item[0];

		return $item;
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
			if (!in_array($key, $this->fillable)) unset($params[$key]);

		$id = $this->connect->insert()->run($this->table, $params)->execute();

		if ($id) return $this->find($id);
		return false;
	}

	public function select()
	{
		return $this->connect->select()->run($this->table);
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