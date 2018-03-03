<?php 

namespace App\Traits;

trait SoftDelete
{
	public function delete($where = null, array $binds = [])
	{
		$update = single('db')->update()->run($this->table, ['deleted_at' => date('Y-m-d H:i:s')]);
		if ($where) $update->where($where, $binds);
		
		return $update->execute();
	}

	public function all()
	{
		return single('db')->select()->run($this->table)->where('deleted_at is null')->execute();
	}
}