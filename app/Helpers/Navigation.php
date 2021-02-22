<?php

use Illuminate\Support\Facades\DB;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;

function menu_nav($type_user)
{
	$type = request()->segment(1);
	$link = request()->segment(2);

	$menunav = '';
	$menus = DB::table('group_menus')
		->leftJoin('menus', 'menus.id', '=', 'group_menus.id_menu')
		->where('id_user_group', $type_user)
		->select('group_menus.*', 'menus.*')
		->orderBy('urutan', 'asc')
		->get();

	$i = 0;
	foreach ($menus as $menu) {
		$tabOpen = "";
		if ($link == $menu->link) {
			$link_active = 'active';
		} else {
			$link_active = '';
		}

		if (toogle($menu->id_menu, $type_user) > 0 && $menu->parrent == 0) {
			$child = Menu::where('id', $menu->id)->with('get_child')->get();

			// dd($child);

			$childMenu = [];
			foreach ($child[0]->get_child as $cl) {
				array_push($childMenu, $cl->link);
			}

			if (in_array($link, $childMenu)) {
				$tabOpen = "nav-item-open";
			}

			$menunav .= '<li class="nav-item nav-item-submenu ' . $tabOpen . '">';
			$menunav .= '<a href="#" class="nav-link">
                        <i class="' . $menu->icon_menu . '"></i> 
                        <span>
                          ' . $menu->nama_menu . '
                          
                          </span>
                     </a>';

			$menunav .=  formatTree($menu->id_menu, $type_user);
			$menunav .= "</li>";
		} else {
			if ($menu->parrent === 0) {
				$menunav .= '<li class="nav-item">';
				$menunav .= '<a href="/' . $type . '/' . $menu->link . '" class="nav-link ' . $link_active . '">
                        <i class="nav-icon ' . $menu->icon_menu . '"></i>
												<span>
                        ' . $menu->nama_menu . '
                        </span>
												</a>';
				$menunav .= "</li>";
			}
		}

		$i++;
	}
	echo $menunav;
}

function toogle($id_menu, $user_id_group)
{
	$menus = DB::table('menus')
		->leftJoin('group_menus', 'group_menus.id_menu', '=', 'menus.id')
		->where([
			['id_user_group', '=', $user_id_group],
			['parrent', '=', $id_menu],
		])
		->select('group_menus.*', 'menus.*')
		->get();

	return $menus->count();
}

function formatTree($id_parent, $user_id_group)
{
	$type = request()->segment(1);
	$link = request()->segment(2);

	$menus = DB::table('menus')
		->leftJoin('group_menus', 'group_menus.id_menu', '=', 'menus.id')
		->where([
			['id_user_group', '=', $user_id_group],
			['parrent', '=', $id_parent],
		])
		->select('group_menus.*', 'menus.*')
		->orderBy('urutan', 'asc')
		->get();


	$menus1 = [];
	foreach ($menus as $menu) {
		array_push($menus1, $menu->link);
	}

	if (in_array($link, $menus1)) {
		$menunav = '<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="display: block;">';
	} else {
		$menunav = '<ul class="nav nav-group-sub" data-submenu-title="Layouts">';
	}

	foreach ($menus as $item) {

		if ($link == $item->link) {
			$link_active = 'active';
			$parent_open = 'nav-item-open';
		} else {
			$link_active = '';
			$parent_open = '';
		}

		if (toogle($item->id_menu, $user_id_group) > 0) {
			$menunav .= '<li class="nav-item nav-item-submenu ' . $parent_open . '">';
			$menunav .= '<a href="#" class="nav-link">
                        <i class="nav-icon ' . $item->icon_menu . '"></i>
                          <span>' . $item->nama_menu . '</span>
                     </a>';
			$menunav .= formatTree($item->id_menu, $user_id_group);
			$menunav .= "</li>";
		} else {
			$menunav .= '<li class="nav-item">';
			$menunav .= '<a href="/' . $type . '/' . $item->link . '" class="nav-link ' . $link_active . '">';
			$menunav .= '<i class="' . $item->icon_menu . ' nav-icon "></i><p>' . $item->nama_menu . '</p></a>';
			$menunav .= "</li>";
		}
	}

	$menunav .= "</ul>";
	return $menunav;
}

function tree_menu($table)
{

	// $type = request()->segment(1);

	$menunav = '';
	$menus = DB::table($table)->orderBy('urutan', 'asc')->get();

	$i = 0;

	$menunav .= '<ul id="tree1" style="display: inline-block;margin-bottom: 30px">';
	foreach ($menus as $menu) {
		if (toogle_menu($table, $menu->id) > 0 && $menu->parrent == 0) {
			$menunav .= '<li style="">' . $menu->nama_menu . '
                        <div class="btn-group dropright" style="margin-left: 30px">
                                <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="color: red;
                                text-decoration: underline;">Option </button>
                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-71px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <p onclick="getEditMenu(' . $menu->id . ')" class="dropdown-item"><i class="icon-pencil"></i> Edit  </p>
                                    
                               </div>
                        </div>';

			$menunav .=  formatTree_menu($table, $menu->id);
			$menunav .= "</li>";
		} else {
			$uri = Request::segment(2);
			if ($uri == 'frontend_menus_daerah') {
				$routeDel = 'cms.frontendmenus.delete_menu_daerah';
			} else {
				$routeDel = 'cms.frontendmenus.delete_menu_daerah';
			}
			if ($menu->parrent === 0) {
				$menunav .= '<li style="padding-right:0px">
                        <a href="#"><i class="icon-circle2"></i> ' . $menu->nama_menu . '</a> 
                        <div class="btn-group dropright" style="margin-left: 30px">
                          <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="color: red;
                          text-decoration: underline;">Option </button>
                          <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-71px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <p onclick="getEditMenu(' . $menu->id . ')" class="dropdown-item"><i class="icon-pencil"></i> Edit  </p>
                            <p onclick="deleteMenu(' . $menu->id . ')" class="dropdown-item"><i class="icon-trash"></i> Hapus  </p>
                            <form method="POST" action="' . route($routeDel, ['id' => $menu->id]) . '" style="float:left;margin-right: 10px;">
                            ' . csrf_field() . '
                            <button type="submit" id="submitDelete' . $menu->id . '" style="display: none"></button>
                            
                            
                            </form>
                            <div class="dropdown-divider"></div>
                            <p onclick="settingLink(' . $menu->id . ')" class="dropdown-item"><i class="icon-link"></i> Setting Link</p>

                          </div>
                          </div>  
                      </li>';
			}
		}

		$i++;
	}

	$menunav .= '<ul';
	echo $menunav;
}

function toogle_menu($table, $id_menu)
{
	$menus = DB::table($table)
		->where('parrent', $id_menu)
		->get();

	return $menus->count();
}

function formatTree_menu($table, $id_menu)
{


	$menus = DB::table($table)
		->where('parrent', $id_menu)
		->orderBy('urutan', 'asc')
		->get();

	$menunav = '<ul>';
	foreach ($menus as $item) {
		if (toogle_menu($table, $item->id) > 0) {
			$menunav .= '<li  style="padding-right:0px">' . $item->nama_menu . '
        <div class="btn-group dropright" style="margin-left: 30px">
            <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="color: red;
            text-decoration: underline;">Option </button>
            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-71px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
            <p onclick="getEditMenu(' . $item->id . ')" class="dropdown-item"><i class="icon-pencil"></i> Edit  </p>
                
          </div>
    </div>
        ';
			$menunav .= formatTree_menu($table, $item->id);
			$menunav .= "</li>";
		} else {
			$menunav .= '<li  style="padding-right:0px">' . $item->nama_menu . '  
        <div class="btn-group dropright" style="margin-left: 30px">
        <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="color: red;
        text-decoration: underline;">Option </button>
        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-71px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
          <p onclick="getEditMenu(' . $item->id . ')" class="dropdown-item"><i class="icon-pencil"></i> Edit  </p>
          <p onclick="deleteMenu(' . $item->id . ')" class="dropdown-item"><i class="icon-trash"></i> Hapus  </p>
          <div class="dropdown-divider"></div>
          <form method="POST" action="' . route('cms.frontendmenus.delete', ['id' => $item->id]) . '" style="float:left;margin-right: 10px;">
          ' . csrf_field() . '
          <button type="submit" id="submitDelete' . $item->id . '" style="display: none"></button>
          
          
          </form>
          <p onclick="settingLink(' . $item->id . ')" class="dropdown-item"><i class="icon-link"></i> Setting Link</p>
     
        
        </div>
        </div>  ';
		}
	}

	$menunav .= "</ul>";
	return $menunav;
}

function tree_menu_backend()
{

	// $type = request()->segment(1);

	$menunav = '';
	$menus = DB::table('menus')->orderBy('urutan', 'asc')->get();

	$i = 0;

	$menunav .= '<ul id="tree1" style="display: inline-block;margin-bottom: 30px">';
	foreach ($menus as $menu) {
		if (toogle_menu_backend($menu->id) > 0 && $menu->parrent == 0) {
			$menunav .= '<li style="">' . $menu->nama_menu . '
                        <div class="btn-group dropright" style="margin-left: 30px">
                                <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="color: red;
                                text-decoration: underline;">Option </button>
                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-71px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <p onclick="getEditMenu(' . $menu->id . ')" class="dropdown-item"><i class="icon-pencil"></i> Edit  </p>

                                    <p class="dropdown-item" data-popup="popover" title="" data-trigger="hover" data-content="Link: ' . $menu->link . '" data-original-title="Info"><i class="icon-info22"></i> Info</p>
                                    
                               </div>
                        </div>';

			$menunav .=  formatTree_menu_backend($menu->id);
			$menunav .= "</li>";
		} else {
			if ($menu->parrent === 0) {
				$menunav .= '<li style="padding-right:0px">
                        <a href="#"><i class="icon-circle2"></i> ' . $menu->nama_menu . '</a> 
                        <div class="btn-group dropright" style="margin-left: 30px">
                          <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="color: red;
                          text-decoration: underline;">Option </button>
                          <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-71px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <p onclick="getEditMenu(' . $menu->id . ')" class="dropdown-item"><i class="icon-pencil"></i> Edit  </p>
                            <p onclick="deleteMenu(' . $menu->id . ')" class="dropdown-item"><i class="icon-trash"></i> Hapus  </p>
                            <p class="dropdown-item" data-popup="popover" title="" data-trigger="hover" data-content="Link: ' . $menu->link . '" data-original-title="Info"><i class="icon-info22"></i> Info</p>
                            <form method="POST" action="' . route('menu.delete', ['id' => $menu->id]) . '" style="float:left;margin-right: 10px;">
                            ' . csrf_field() . '
                            <button type="submit" id="submitDelete' . $menu->id . '" style="display: none"></button>
                            
                            
                            </form>
                           
                           

                          </div>
                          </div>  
                      </li>';
			}
		}

		$i++;
	}

	$menunav .= '<ul';
	echo $menunav;
}

function toogle_menu_backend($id_menu)
{
	$menus = DB::table('menus')
		->where('parrent', $id_menu)
		->get();

	return $menus->count();
}

function formatTree_menu_backend($id_menu)
{


	$menus = DB::table('menus')
		->where('parrent', $id_menu)
		->get();

	$menunav = '<ul>';
	foreach ($menus as $item) {
		if (toogle_menu_backend($item->id) > 0) {
			$menunav .= '<li  style="padding-right:0px">' . $item->nama_menu . '
        <div class="btn-group dropright" style="margin-left: 30px">
            <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="color: red;
            text-decoration: underline;">Option </button>
            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-71px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
            <p onclick="getEditMenu(' . $item->id . ')" class="dropdown-item"><i class="icon-pencil"></i> Edit  </p>
            <p class="dropdown-item" data-popup="popover" title="" data-trigger="hover" data-content="Link: ' . $item->link . '" data-original-title="Info"><i class="icon-info22"></i> Info</p>
                
          </div>
    </div>
        ';
			$menunav .= formatTree_menu_backend($item->id);
			$menunav .= "</li>";
		} else {
			$menunav .= '<li  style="padding-right:0px">' . $item->nama_menu . '  
        <div class="btn-group dropright" style="margin-left: 30px">
        <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="color: red;
        text-decoration: underline;">Option </button>
        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-71px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
          <p onclick="getEditMenu(' . $item->id . ')" class="dropdown-item"><i class="icon-pencil"></i> Edit  </p>
          <p onclick="deleteMenu(' . $item->id . ')" class="dropdown-item"><i class="icon-trash"></i> Hapus  </p>
          <p class="dropdown-item" data-popup="popover" title="" data-trigger="hover" data-content="Link: ' . $item->link . '" data-original-title="Info"><i class="icon-info22"></i> Info </p>
          
          <form method="POST" action="' . route('menu.delete', ['id' => $item->id]) . '" style="float:left;margin-right: 10px;">
          ' . csrf_field() . '
          <button type="submit" id="submitDelete' . $item->id . '" style="display: none"></button>
          
          
          </form>
         
     
        
        </div>
        </div>  ';
		}
	}

	$menunav .= "</ul>";
	return $menunav;
}

function parrent_menu($parent = 0, $spacing = '', $category_tree_array = '')
{

	if (!is_array($category_tree_array))
		$category_tree_array = array();



	$menus = DB::table('menus')
		->where('parrent', $parent)
		->orderBy('urutan', 'asc')
		->get();

	if ($menus->count() > 0) {
		//  $style = 
		foreach ($menus as $menu) {

			$category_tree_array[] = (object) array("id" => $menu->id, "parrent" => $menu->parrent, "nama_menu" => $spacing . $menu->nama_menu);
			$category_tree_array = parrent_menu($menu->id, '&nbsp;&nbsp;&nbsp;&nbsp;' . $spacing . '-&nbsp;', $category_tree_array);
		}
	}

	return $category_tree_array;
}








////List Menu Backend

function list_menu_backend()
{

	// $type = request()->segment(1);

	$menunav = '';
	$menus = DB::table('menus')->orderBy('urutan', 'asc')->get();

	$i = 0;

	$menunav .= '<ul id="tree1" style="display: inline-block;margin-bottom: 30px">';
	$menunav .= '<li style="padding-right:0px;cursor:pointer" onclick="getMenu(0, \'ROOT\')"> ROOT</li>';

	foreach ($menus as $menu) {
		if (toogle_listmenu_backend($menu->id) > 0 && $menu->parrent == 0) {
			$menunav .= '<li style=""><span  style="cursor:pointer" onclick="getMenu(' . $menu->id . ', \'' . $menu->nama_menu . '\')">' . $menu->nama_menu . '</span>';


			$menunav .=  formatlist_menu_backend($menu->id);
			$menunav .= "</li>";
		} else {
			if ($menu->parrent === 0) {
				$menunav .= '<li style="padding-right:0px;cursor:pointer" onclick="getMenu(' . $menu->id . ', \'' . $menu->nama_menu . '\')">
                          <a href="#"><i class="icon-circle2"></i> ' . $menu->nama_menu . '</a> 
                         
                            
                        </li>';
			}
		}

		$i++;
	}

	$menunav .= '<ul';
	echo $menunav;
}




function toogle_listmenu_backend($id_menu)
{
	$menus = DB::table('menus')
		->where('parrent', $id_menu)
		->get();

	return $menus->count();
}


function formatlist_menu_backend($id_menu)
{


	$menus = DB::table('menus')
		->where('parrent', $id_menu)
		->get();

	$menunav = '<ul>';
	foreach ($menus as $item) {
		if (toogle_listmenu_backend($item->id) > 0) {
			$menunav .= '<li style="padding-right:0px;"><span style="cursor:pointer" onclick="getMenu(' . $item->id . ', \'' . $item->nama_menu . '\')">' . $item->nama_menu . '</span>';


			$menunav .= formatlist_menu_backend($item->id);
			$menunav .= "</li>";
		} else {
			$menunav .= '<li  onclick="getMenu(' . $item->id . ', \'' . $item->nama_menu . '\')" style="padding-right:0px;cursor:pointer">' . $item->nama_menu;
		}
	}

	$menunav .= "</ul>";
	return $menunav;
}



////list menu frontend


function list_tree_menu($table)
{

	// $type = request()->segment(1);

	$menunav = '';
	$menus = DB::table($table)->orderBy('urutan', 'asc')->get();

	$i = 0;

	$menunav .= '<ul id="tree1" style="display: inline-block;margin-bottom: 30px">';
	$menunav .= '<li style="padding-right:0px;cursor:pointer" onclick="getMenu(0, \'ROOT\')"> ROOT</li>';

	foreach ($menus as $menu) {
		if (toogle_list_menu($table, $menu->id) > 0 && $menu->parrent == 0) {
			$menunav .= '<li style=""><span  style="cursor:pointer" onclick="getMenu(' . $menu->id . ', \'' . $menu->nama_menu . '\')">' . $menu->nama_menu . '</span>';

			$menunav .=  list_formatTree_menu($table, $menu->id);
			$menunav .= "</li>";
		} else {
			if ($menu->parrent === 0) {
				$menunav .= '<li style="padding-right:0px;cursor:pointer" onclick="getMenu(' . $menu->id . ', \'' . $menu->nama_menu . '\')">
          <a href="#"><i class="icon-circle2"></i> ' . $menu->nama_menu . '</a> 
         
                        </li>';
			}
		}

		$i++;
	}

	$menunav .= '<ul';
	echo $menunav;
}




function toogle_list_menu($table, $id_menu)
{
	$menus = DB::table($table)
		->where('parrent', $id_menu)
		->get();

	return $menus->count();
}


function list_formatTree_menu($table, $id_menu)
{


	$menus = DB::table($table)
		->where('parrent', $id_menu)
		->orderBy('urutan', 'asc')
		->get();

	$menunav = '<ul>';
	foreach ($menus as $item) {
		if (toogle_list_menu($table, $item->id) > 0) {
			$menunav .= '<li style="padding-right:0px;"><span style="cursor:pointer" onclick="getMenu(' . $item->id . ', \'' . $item->nama_menu . '\')">' . $item->nama_menu . '</span>';
			$menunav .= list_formatTree_menu($table, $item->id);
			$menunav .= "</li>";
		} else {
			$menunav .= '<li  onclick="getMenu(' . $item->id . ', \'' . $item->nama_menu . '\')" style="padding-right:0px;cursor:pointer">' . $item->nama_menu . '</li>';
		}
	}

	$menunav .= "</ul>";
	return $menunav;
}




////Frondtend Nav


// function list_frontend_nav()
// {

//   // $type = request()->segment(1);

//   $menunav = '';
//   $menus = DB::table('menu_frontends')->orderBy('urutan', 'asc')->get();

//   $i = 0;


//   $menunav .= '<ul class="navbar-nav mr-auto">';
//   $menunav .= '<li class="nav-item active">
//                       <a class="nav-link" href="/">BERANDA <span class="sr-only">(current)</span></a>
//                   </li>';


//   foreach ($menus as $menu) {

//     if (toggle_frontendnav($menu->id) > 0 && $menu->parrent == 0) {
//       $linkRedirect = redirect_link($menu->kategori, $menu->link, $menu->nama_link, $menu->nama_menu, 'dropdown');
//       $menunav .= '<div class="nav-item dropdown">' . $linkRedirect;
//       $menunav .=  list_tree_frontendnav($menu->id);
//       $menunav .= "</li>";
//       $menunav .= "</div>";
//     } else {
//       $linkRedirect = redirect_link($menu->kategori, $menu->link, $menu->nama_link, $menu->nama_menu, 'normal');
//       if ($menu->parrent === 0) {

//         $menunav .= '<li class="nav-item">' . $linkRedirect . '</li>';
//       }
//     }

//     $i++;
//   }

//   $menunav .= '</ul>';
//   echo $menunav;
// }


// function toggle_frontendnav($id_menu)
// {
//   $menus = DB::table('menu_frontends')
//     ->where('parrent', $id_menu)
//     ->get();

//   return $menus->count();
// }


// function list_tree_frontendnav($id_menu)
// {
//   $menus = DB::table('menu_frontends')
//     ->where('parrent', $id_menu)
//     ->orderBy('urutan', 'asc')
//     ->get();

//   $menunav = '<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">';
//   foreach ($menus as $item) {

//     if (toogle_list_menu($item->id) > 0) {
//       $linkRedirect = redirect_link($item->kategori, $item->link, $item->nama_link, $item->nama_menu, 'submenu');
//       $menunav .= '<li class="dropdown-submenu">' . $linkRedirect;
//       $menunav .= list_tree_frontendnav($item->id);
//       $menunav .= "</li>";
//     } else {
//       $linkRedirect = redirect_link($item->kategori, $item->link, $item->nama_link, $item->nama_menu, 'submenunormal');
//       $menunav .= '<li class="dropdown-item">' . $linkRedirect . '</li>';
//     }
//   }

//   $menunav .= "</ul>";
//   return $menunav;
// }


// function redirect_link($kategori, $link, $nama_link, $nama_menu, $type)
// {

//   if ($type == 'dropdown') {
//     $class = 'id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"';
//   } elseif ($type == 'normal') {
//     $nama_menu = strtoupper($nama_menu);
//     $class = 'class="nav-link"';
//   } elseif ($type == 'submenu') {
//     $nama_menu = ucwords($nama_menu);
//     $class = 'class="dropdown-item" tabindex="-1"';
//   } else {
//     $class = '';
//   }

//   if ($kategori == 1) {
//     $linkRedirect = '<router-link ' . $class . ' :to="{ name: \'pageRead\', params: { id: ' . $link . ', slug: \'' . str_slug($nama_link) . '\' }}">' . $nama_menu . '</router-link>';
//   } else if ($kategori == 2) {
//     $linkRedirect = '<router-link ' . $class . ' :to="{ name: \'berita\', params: { id: ' . $link . ', slug: \'' . str_slug($nama_link) . '\' }}">' . $nama_menu . '</router-link>';
//   } else if ($kategori == 4) {
//     $linkRedirect = '<a ' . $class . ' href="' . $nama_link . '" target="_blank">' . $nama_menu . '</a>';
//   } else if ($kategori == 31) {
//     $linkRedirect = '<router-link ' . $class . ' :to="{ name: \'arsip\', params: { id: ' . $link . ', slug: \'' . str_slug($nama_link) . '\' }}">' . $nama_menu . '</router-link>';
//   } else if ($kategori == 34) {
//     $linkRedirect = '<router-link ' . $class . ' to="/' . $link . '">' . $nama_menu . '</router-link>';

//   }else if($kategori == 33){
//     $linkRedirect = '<router-link to="/'.$link.'">' . $nama_menu . '</router-link>';
//   } else {
//     $linkRedirect = '<router-link ' . $class . ' to="#">' . $nama_menu . '</router-link>';
//   }

//   return $linkRedirect;
// }


//fungsi by heri

function list_frontend_nav($table)
{

	// $type = request()->segment(1);

	$menunav = '';
	$menus = DB::table($table)->orderBy('urutan', 'asc')->get();

	$i = 0;


	// $menunav .= '<ul class="navbar-nav mr-auto">';
	if ($table != 'menus_frontend_daerah') {
		$menunav .= '<li class="nav-item active">
                      <a class="nav-link" href="/">BERANDA <span class="sr-only">(current)</span></a>
                  </li>';
	}

	foreach ($menus as $menu) {

		if (toggle_frontendnav($table, $menu->id) > 0 && $menu->parrent == 0) {
			$linkRedirect = redirect_link($menu->kategori, $menu->link, $menu->nama_link, $menu->nama_menu, 'dropdown');
			$menunav .= '<li class="nav-item dropdown">' . $linkRedirect;
			$menunav .=  list_tree_frontendnav($table, $menu->id);
			$menunav .= "</li>";
			// $menunav .= "</div>";
		} else {
			$linkRedirect = redirect_link($menu->kategori, $menu->link, $menu->nama_link, $menu->nama_menu, 'normal');
			if ($menu->parrent === 0) {

				$menunav .= '<li class="nav-item">' . $linkRedirect . '</li>';
			}
		}

		$i++;
	}

	// $menunav .= '</ul>';
	echo $menunav;
}


function toggle_frontendnav($table, $id_menu)
{
	$menus = DB::table($table)
		->where('parrent', $id_menu)

		->get();

	return $menus->count();
}


function list_tree_frontendnav($table, $id_menu)
{
	$menus = DB::table($table)
		->where('parrent', $id_menu)
		->orderBy('urutan', 'asc')
		->get();

	$menunav = '<ul class="dropdown-menu">';
	foreach ($menus as $item) {

		if (toogle_list_menu($table, $item->id) > 0) {
			$linkRedirect = redirect_link($item->kategori, $item->link, $item->nama_link, $item->nama_menu, 'submenu');
			$menunav .= '<li class="dropdown-submenu">' . $linkRedirect;
			$menunav .= list_tree_frontendnav($table, $item->id);
			$menunav .= "</li>";
		} else {
			$linkRedirect = redirect_link($item->kategori, $item->link, $item->nama_link, $item->nama_menu, 'submenunormal');
			$menunav .= '<li class="dropdown-item">' . $linkRedirect . '</li>';
		}
	}

	$menunav .= "</ul>";
	return $menunav;
}


function redirect_link($kategori, $link, $nama_link, $nama_menu, $type)
{

	if ($type == 'dropdown') {
		$class = 'data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"';
	} elseif ($type == 'normal') {
		$nama_menu = strtoupper($nama_menu);
		$class = 'class="nav-link"';
	} elseif ($type == 'submenu') {
		$nama_menu = ucwords($nama_menu);
		$class = 'data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle" style="color:#000 !important;"';
	} else {
		$class = '';
	}

	if ($kategori == 1) {
		$linkRedirect = '<router-link ' . $class . ' :to="{ name: \'pageRead\', params: { id: ' . $link . ', slug: \'' . str_slug($nama_link) . '\' }}">' . $nama_menu . '</router-link>';
	} else if ($kategori == 2) {
		$linkRedirect = '<router-link ' . $class . ' :to="{ name: \'berita\', params: { id: ' . $link . ', slug: \'' . str_slug($nama_link) . '\' }}">' . $nama_menu . '</router-link>';
	} else if ($kategori == 4) {
		$linkRedirect = '<a ' . $class . ' href="' . $nama_link . '" target="_blank">' . $nama_menu . '</a>';
	} else if ($kategori == 31) {
		$linkRedirect = '<router-link ' . $class . ' :to="{ name: \'arsip\', params: { id: ' . $link . ', slug: \'' . str_slug($nama_link) . '\' }}">' . $nama_menu . '</router-link>';
	} else if ($kategori == 34) {
		$linkRedirect = '<router-link ' . $class . ' :to="{ name: \'' . $link . '\'}">' . $nama_menu . '</router-link>';
	} else if ($kategori == 33) {
		$linkRedirect = '<router-link to="/' . $link . '">' . $nama_menu . '</router-link>';
	} else {
		$linkRedirect = '<router-link ' . $class . ' to="#">' . $nama_menu . '</router-link>';
	}

	return $linkRedirect;
}

function getDetailMenu() {
	return DB::table('menus')->where('link', request()->segment(2))->first();
}
