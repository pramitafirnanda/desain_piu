<?php
namespace App\Http\Helpers;

class ReturnHelper {
    public function successAlert(){
        $notification = array(
            'message' => 'Success',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function errorAlert(){
        $notification = array(
            'message' => 'Error',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function s_notif($m){
        $notification = array(
            'message' => $m,
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function e_notif($m){
        $notification = array(
            'message' => $m,
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function e_notif_redirect($m, $redirectTo){
        $notification = array(
            'message' => $m,
            'alert-type' => 'error'
        );
        return redirect($redirectTo)->with($notification);
    }
    public function s_notif_redirect($m, $redirectTo){
        $notification = array(
            'message' => $m,
            'alert-type' => 'success'
        );
        return redirect($redirectTo)->with($notification);
    }

    public function paginationSelect($request, $data, string $id){
        $perPage = 10;
        $page = $request->get('page', 1);
        $paginated = $data->slice(($page - 1) * $perPage, $perPage)->values();
        return response()->json([
            'results' => $paginated->map(function ($item) use($id) {
                return [
                    'id' => $item->$id,
                    'text' => $item->text,
                ];
            }),
            'pagination' => [
                'more' => $paginated->count() == $perPage,
            ],
        ]);
    }

}
?>
