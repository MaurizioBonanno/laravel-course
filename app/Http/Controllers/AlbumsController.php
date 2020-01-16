<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumsController extends Controller
{
    public function index( Request $request ){
       // return Album::all();

       $sql = 'select * from Albums where 1=1';
       $where = [];
       if($request->has('id')){
           $where['id'] = $request->get('id');

           $sql.= ' and id=?';
       }
       if($request->has('album_name')){
           $where['album_name'] = $request->get('album_name');
           $sql.=' and album_name=?';
       }

      // dd($sql);
      // return DB::select($sql, array_values($where));
      return view('albums.albums',['albums'=> DB::select($sql, array_values($where))]);
    }

    public function delete($id){
       // dd($id);
        $sql = 'delete from albums where id= :id';
        //dd($sql);
      return DB::delete($sql, ['id'=>$id]);
        //return redirect()->back();
    }

    public function show($id){
        $sql ="select * from albums where id= :id";
        return DB::select($sql,['id'=>$id]);
    }

    public function edit($id){
        $sql="select * from albums where id = :id";
        $album = DB::select($sql,['id'=>$id]);
        //dd($album);
        return view('albums.edit')->with('album',$album[0]);
    }

    public function store($id,Request $req){
       // dd( request()->all() );
      // dd($id);
       $data = request()->only(['name','description']);
       $data['id'] = $id;
       $sql = " UPDATE albums SET album_name= :name,description= :description ";
       $sql.= " WHERE id= :id";
       //dd($sql);
       $res = DB::update($sql, $data);

       dd($res);
    }
}
