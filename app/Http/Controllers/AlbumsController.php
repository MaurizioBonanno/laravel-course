<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumsController extends Controller
{
    public function index( Request $request ){
       // return Album::all();

     //  $sql = 'select * from Albums where 1=1';
    $sql = DB::table('albums')->orderByDesc('id');
    if($request->has('id')){
        $sql->where('id','=',$request->input('id'));
      }

    if($request->has('album_name')){
        $sql->where('album_name','like','%'.$request->input('album_name').'%');
      }

    //    $where = [];
    //    if($request->has('id')){
    //        $where['id'] = $request->get('id');

    //        $sql.= ' and id=?';
    //    }
    //    if($request->has('album_name')){
    //        $where['album_name'] = $request->get('album_name');
    //        $sql.=' and album_name=?';
    //    }

    //    $sql.= ' order by id desc';

      // dd($sql);
      // return DB::select($sql, array_values($where));

      $albums = $sql->get();
      return view('albums.albums',['albums'=> $albums]);
    }

    public function delete($id){
    //    // dd($id);
    //     $sql = 'delete from albums where id= :id';
    //     //dd($sql);
    //   return DB::delete($sql, ['id'=>$id]);
    //     //return redirect()->back();
        $res = DB::table('albums')->where('id',$id)->delete();
        return $res;
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
    //    // dd( request()->all() );
    //   // dd($id);
    //    $data = request()->only(['name','description']);
    //    $data['id'] = $id;
    //    $sql = " UPDATE albums SET album_name= :name,description= :description ";
    //    $sql.= " WHERE id= :id";
    //    //dd($sql);
    //    $res = DB::update($sql, $data);

       $res = DB::table('albums')->where('id',$id)->update(
           [
               'album_name' => request()->input('name'),
               'description' => request()->input('description')
            ]
           );
       $messaggio = $res ? 'Album aggiornato' : 'Aggiornamento non eseguito';
       session()->flash('message', $messaggio);
       return redirect()->route('albums');
      // dd($res);
    }

    public function create(){

        return view('albums.create');
    }

    public function save(){
        // $data = request()->only(['name','description']);
        // $data['user_id'] = 1;
        // $sql= 'insert into albums (album_name,description,user_id) values (:name,:description,:user_id)';
        // $res = DB::insert($sql,$data);
        $res = DB::table('albums')->insert(
            [
                'album_name' => request()->input('name'),
                'description' => request()->input('description'),
                'user_id'=>1
             ]
            );
        $messaggio = $res ? 'Album inserito' : 'Inserimento non eseguito';
        session()->flash('message', $messaggio);
        return redirect()->route('albums');
    }

}
