<?php

namespace App\Repository;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BaseRepository
{
    public $currobject;

    public function index()
    {
        return $this->currobject->query()->paginate(10);
    }

    public function block($id)
    {

    }

    public function unblock($id)
    {

    }

    public function delete($id)
    {

    }

    public function restore($id)
    {

    }

    public function findByIdSingle($id)
    {
        return $this->currobject = $this->currobject::where('id','=',$id)->first();
    }

    public function disable($item_id, $user_id)
    {
        $data = $this->findByIdSingle($item_id);
        $data->deleted_user_id = $user_id;
        $data->deleted_at = Carbon::parse(Carbon::now())->format('Y-m-d H:i:s');
        $data->save();
    }

    public function enable($item_id, $user_id)
    {
        $data = $this->findByIdSingle($item_id);
        $data->deleted_user_id = null;
        $data->deleted_at = null;
        $data->updated_user_id = $user_id;
        $data->deleted_at = Carbon::parse(Carbon::now())->format('Y-m-d H:i:s');
        $data->save();
    }

    public function deleteID($id)
    {
        $data = $this->findByIdSingle($id);
        $data->deleted_at = Carbon::parse(Carbon::now())->format('Y-m-d H:i:s');
        $data->deleted_by = Auth::user()->name;
        $data->delete();
    }

}
