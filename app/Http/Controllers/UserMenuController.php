<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ReturnHelper;
use App\Http\Helpers\UserHelper;
use App\Models\LevelMenu;
use App\Models\Levels;
use App\Models\Menu;
use App\Models\Piutang\TKwitansi;
use App\Models\User;
use App\Models\UserMenu;
use Illuminate\Http\Request;

class UserMenuController extends Controller
{
    function __construct(){
        $this->userHelp = new UserHelper();
        $this->returnHelp = new ReturnHelper();
    }

    public function listUser(){
        $users = User::all();
        foreach ($users as $user){
            $user['pwdD'] = $this->userHelp->decryptPassword($user->pwd);
        }
        $levels = Levels::all();
        return view('user-menu.list-user', compact('users','levels'));
    }

    public function storeUser(Request $request){
        try {
            $request->validate([
                'kduser' => 'required|string|unique:users,kduser|max:10',
                'nmuser' => 'required|string',
                'initial' => 'required|string|max:3',
            ]);
            $kduser = strtoupper($request->kduser);
            $user = new User();
            $user->kduser = $kduser;
            $user->nmuser = strtoupper($request->nmuser);
            $user->initial = strtoupper($request->initial);
            $user->pwd = $this->userHelp->encryptPassword($request->pwd);
            $user->save();

            $kdlevel = $request->kdlevel;
            if ($kdlevel != "null"){
                $menus = LevelMenu::where('kdlevel', $kdlevel)->get();
                foreach ($menus as $menu){
                    $usermenu = new UserMenu();
                    $usermenu->kduser = $kduser;
                    $usermenu->kdmenu = $menu->kdmenu;
                    $usermenu->uraks = $menu->uraks;
                    $usermenu->urnew = $menu->urnew;
                    $usermenu->uredt = $menu->uredt;
                    $usermenu->urdel = $menu->urdel;
                    $usermenu->save();
                }
            }

            return $this->returnHelp->successAlert();

        } catch (\Illuminate\Validation\ValidationException $e) {
            $notification = [
                'message' => 'Error, silakan cek kembali inputan Anda.',
                'alert-type' => 'error'
            ];
            return redirect()->back()
                ->withErrors($e->validator)->withInput()->with($notification);
        }
    }
    public function updateUser(Request $request){
        $user = User::where('kduser', $request->kduser)->first();
        if (!$user){
            return $this->returnHelp->errorAlert();
        }
        $user->update([
            'nmuser' => strtoupper($request->nmuser)
        ]);
        if ($request->pwd){
            $user->update([
                'pwd' => $this->userHelp->encryptPassword($request->pwd)
            ]);
        }
        return $this->returnHelp->successAlert();
    }

    public function listMenu(){
        $data = Menu::whereNull('parent')->orderBy('lvl')->get();
        return view('user-menu.list-menu', compact('data'));
    }

    public function storeMenu(Request $request){
        $menu = new Menu;
        $menu->kdmenu = $request->kdmenu;
        $menu->nmmenu = $request->nmmenu;
        $menu->lvl = $request->lvl;
        $menu->parent = $request->parent;
        $menu->link = $request->link;
        $menu->save();
        return $this->returnHelp->successAlert();
    }
    public function updateMenu(Request $request){
        $kdmenus = $request->input('kdmenu');
        $nmmenu = $request->input('nmmenu');
        $parents = $request->input('parent');
        $links = $request->input('link');

        foreach ($kdmenus as $index => $kdmenu) {
            /*echo $kdmenu;
            echo " - " . ($nmmenu[$index] ?? 'null');
            echo " - " . ($lvl[$index] ?? 'null');
            echo " - " . ($parents[$index] ?? 'null');
            echo " - " . ($links[$index] ?? 'null');
            echo "<br>";
            echo "<hr>";*/
            Menu::where('kdmenu', $kdmenu)->update([
                'nmmenu' => $nmmenu[$index],
                'parent' => $parents[$index] ?? null,
                'link' => $links[$index] ?? null,
            ]);
        }
        return $this->returnHelp->successAlert();
    }

    public function detailUserMenu($kduser)
    {

        $user = User::where('kduser', $kduser)->first();
        $menus = Menu::all()->map(function ($menu) use ($kduser) {
            $usermenu = UserMenu::where('kduser', $kduser)->where('kdmenu', $menu->kdmenu)->first();
            $menu->uraks = $usermenu ? $usermenu->uraks : 0;
            $menu->urnew = $usermenu ? $usermenu->urnew : 0;
            $menu->uredt = $usermenu ? $usermenu->uredt : 0;
            $menu->urdel = $usermenu ? $usermenu->urdel : 0;
            return $menu;
        });

        return view('user-menu.detail-user-menu', compact('user', 'menus'));
    }


    public function updateUserMenu(Request $request){
        $kduser = $request->kduser;
        UserMenu::where('kduser', $kduser)->delete();

        foreach ($request->updMenu as $key => $val) {
            list($operat, $menu) = explode("-", $key);
            $existingMenu = UserMenu::where('kdmenu', $menu)->where('kduser', $kduser)->first();
            if (!$existingMenu) {
                $new = new UserMenu();
                $new->kduser = $kduser;
                $new->kdmenu = $menu;
                $new->$operat = 1;
                $new->save();
            } else {
                UserMenu::where('kdmenu', $menu)->where('kduser', $kduser)->update([$operat => 1]);
            }

            // apakah menu ini punya perent tapi gak di centang ?
            $isMenu = Menu::where('kdmenu', $menu)->first();
            if ($isMenu && $isMenu->parent) {
                $parentMenu = UserMenu::where('kdmenu', $isMenu->parent)->where('kduser', $kduser)->first();
                if (!$parentMenu) {
                    $newParentMenu = new UserMenu();
                    $newParentMenu->kduser = $kduser;
                    $newParentMenu->kdmenu = $isMenu->parent;
                    $newParentMenu->uraks = 1;
                    $newParentMenu->save();
                } elseif (!$parentMenu->uraks) {
                    UserMenu::where('kdmenu', $isMenu->parent)->where('kduser', $kduser)->update(['uraks' => 1]);
                }
            }
        }

        // tambahan aja ngikutin desain db nya
        UserMenu::where('kduser', $kduser)->get()->map(function ($menu) {
            $menu->uraks = $menu->uraks ?? 0;
            $menu->urnew = $menu->urnew ?? 0;
            $menu->uredt = $menu->uredt ?? 0;
            $menu->urdel = $menu->urdel ?? 0;
            return $menu;
        });
        return $this->returnHelp->successAlert();
    }

    public function listLevel(Request $request)
    {
        $selectlevel = null;
        $levels = Levels::all();
        $menus = Menu::all();

        $levelmenu = [];
        if ($request->kdlevel) {
            $selectlevel = $request->kdlevel;
            $levelmenu = LevelMenu::where('kdlevel', $selectlevel)
                ->get()
                ->keyBy('kdmenu');
        }
        return view('user-menu.list-level', compact('menus', 'levels', 'levelmenu', 'selectlevel'));
    }

    public function storeLevel(Request $request){
       $new = new Levels();
       $new->kdlevel = $request->kdlevel;
       $new->nmlevel = $request->nmlevel;
       $new->save();
       return $this->returnHelp->successAlert();
    }

    public function updateLevel(Request $request){
        $kdlevel = $request->kdlevel;
        LevelMenu::where('kdlevel', $kdlevel)->delete();
        $data = [];
        foreach ($request->updMenu as $key => $val) {
            list($operat, $menu) = explode("-", $key);
            if (!isset($data[$menu])) {
                $data[$menu] = [
                    'kdlevel' => $kdlevel,
                    'kdmenu' => $menu,
                    'uraks' => 0,
                    'urnew' => 0,
                    'uredt' => 0,
                    'urdel' => 0,
                ];
            }
            $data[$menu][$operat] = 1;
        }
        foreach ($data as $menuData) {
            LevelMenu::create($menuData);
        }
       return $this->returnHelp->successAlert();
    }

    public function tesKwt(){
        $kwt = (new TKwitansi(2023))->where('NoVoucher', 'JB-2024-000002')->with('agentCode')->first();
        dd($kwt);




    }

}
