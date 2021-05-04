<?php

namespace App\Contracts;

interface MediaContract {
		
	public function getMedia(string $order = 'id', string $sort = 'desc', array $columns = ['*']);
	public function getMediaById(int $id);
	public function addMedia(array $params);
	public function deleteMedia(int $id);
	
}
