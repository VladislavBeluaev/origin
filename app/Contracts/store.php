<?php 
namespace App\Contracts;
interface Store 
{
	public function all();
	public function create();
	public function update($model);
	public function delete($model=null);
}