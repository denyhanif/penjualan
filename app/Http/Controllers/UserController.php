<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Arr;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::paginate(2);//metod paginate di gunakan untuk mengambil data berdasarkan pagign ==setiap halaman di talpilkan 2 resource
        $filterKeyword= $request->get('keyword');
        if($filterKeyword){
            //dijalanan jika ada nama yang cocok
            $user=User::where('name','LIKE',"%$filterKeyword%")->paginate(2);
        }
        
        return view('user.index',compact('user')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//fungsi menagkap ninputan tambah user
    {
        $data= $request->all();
        $validasi = Validator::make($data,[
            'name'=>'required|max:255',
            'email'=>'required|email|max:255|unique:users',
            'username'=>'required|max:100|unique:users',
            'password'=>'required|min:6',
            'level'=>'required'
        ]);

        if($validasi->fails())
        {
            return redirect()->route('user.create')->withInput()->withErrors($validasi);
        }
        $data['password']= bcrypt($data['password']);
        User::create($data);
        return redirect()->route('user.index')->with('status','User Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::findOrFail($id);
        return view('user.show',compact('user'));//compact untuk parsing data dri tabel user dengan parameter id
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrfail($id);
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrfail($id);
        $data= $request->all();

        $validasi = Validator::make($data,[
            'name'=>'required|max:255',
            'username'=>'required|max:100|unique:users,username,'.$id,
            'email'=>'required|email|max:255|unique:users,email,'.$id,
            'password'=>'sometimes|nullable|min:6'//sometimes untuk kalau menggi passs maka validasi tsb akan di gunakan
        ]);

        if($validasi->fails()){
            return redirect()->route('user.edit',[$id])->withErrors($validasi);

        }

        if($request->input('password')){
            $data['password']=bcrypt($data['password']);
        }else{
            $data= Arr::except($data,['password']);//metod except guna saat pass tidak di isi bagian pass tidak ikut ke upadate
        }

        $user->update($data);
        return redirect()->route('user.index')->with('status','data user berhasil di ubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=User::findOrFail($id);
        $data->delete();
        return redirect()->route('user.index')->with('status','Userber hasil di hapus');
    }
}
