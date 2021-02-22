<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

function detail_app() {
	return DB::table('general_app')->first();
}

function decode_role($string) {

	$role_return['access'] = "FALSE";
	$role_return['read'] = "FALSE";
	$role_return['update'] = "FALSE";
	$role_return['insert'] = "FALSE";
	$role_return['delete'] = "FALSE";

	$role_array = str_split($string);
	foreach ($role_array as $key => $value) {
		switch ($value) {
		    case "A":
				$role_return['access'] = "TRUE";
      break;
		    case "C":
				$role_return['insert'] = "TRUE";
      break;
        case "R":
        $role_return['read'] = "TRUE";
      break;
		    case "U":
				$role_return['update'] = "TRUE";
			break;
		    case "D":
				$role_return['delete'] = "TRUE";
			break;
		    default:
				"";
		}

	}
	return $role_return;
}

function getHour($date) {
	$data = date('H', strtotime($date));
	return $data;
}

function getDay($date) {
	$data = date('l', strtotime($date));
	return $data;
}

function getMounth($date) {
	$data = date('F', strtotime($date));
	return $data;
}