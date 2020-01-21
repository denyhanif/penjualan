<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Produk;
use Validator;
use Storage;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produk = Produk::paginate(5);//metod paginate di gunakan untuk mengambil data berdasarkan pagign ==setiap halaman di talpilkan 2 resource
        
        $kategori= Kategori::all();
        
        $filterKeyword= $request->get('keyword');
        $nama_kategori='';
        if($filterKeyword){
            //dijalanan jika ada nama yang cocok
            $produk=Produk::where('nama_produk','LIKE',"%$filterKeyword%")->paginate(2);
        }

        $filterByKategori= $request->get('kd_kategori');
        if($filterByKategori){
            $produk= Produk::where('kd_kategori',$filterByKategori)->paginate(5);
            $data_kategori = Kategori::find($filterByKategori);//data kategori yang sedang di cari ex=namakategori
            $nama_kategori= $data_kategori->kategori;//Menyimapn kategori yang sedang dicari

        }
        
        return view('produk.index',compact('produk','kategori','nama_kategori')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori=Kategori::all();//ambil semua data kategori
        return view('produk.create',compact('kategori'));// mengakses view crate di produk dan parsing data dari tabel kategori
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'nama_produk'=>'required|max:255',
            'kd_kategori'=>'required',
            'harga'=>'required',
            'gambar_produk'=>'required|image|mimes:jpeg,jpg,png|max:2048'

        ]);
        if($validator->fails()){
            return redirect()->route('produk.create')->withErrors($validator)->withInput();
        }
       
        
        if($request->file('gambar_produk')->isValid()){
            $gambar_produk= $request->file('gambar_produk');
            $extension = $gambar_produk->getClientOriginalExtension();
            $namaFoto= "produk/".date('YmdHis').".".$extension;
            $upload_path ='public/uploads/produk';//otomatis di buat larabel jika tidak ada
            $request->file('gambar_produk')->move($upload_path,$namaFoto);
            $input['gambar_produk']=$namaFoto;
        }

        $input['stok']=0;

        //insert data ke tabe;
        Produk::create($input);
        return redirect()->route('produk.index')->with('status','produk berhasil di tambah');


    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori= Kategori::all();
        $produk= Produk::findOrFail($id);
        return view('produk.edit',compact('kategori','produk')); // data yang di parsinh(kategori pd baris ini berasal pada $kategori fungsi edit ini)
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
        $produk=Produk::findOrFail($id);
        $input=$request->all();//menangkap inputan yang dad di form
        $validator = Validator::make($input,[
            'nama_produk'=>'required|max:255',
            'kd_kategori'=>'required',
            'harga'=>'required|numeric',
            'gambar_produk'=>'required|image|mimes:jpeg,jpg,png|max:2048',

        ]);

        if($validator->fails())
        {
            return redirect()->route('produk.edit',[$id])->withErrors($validator);
        }

        if($request->hasFile('gambar_produk')){
            if($request->file('gambar_produk')->isValid())
            {
                Storage::disk('upload')->delete($produk->gambar_produk);// mengakses folder yang di daftarkan di filesistem di folder config ,filesytem
                $gambar_produk= $request->file('gambar_produk');//pilih gambar baru
                $extension = $gambar_produk->getClientOriginalExtension();

                $namaFoto = "produk/".date('YmdHis').".".$extension;
                $upload_path ='public/uploads/produk';//otomatis di buat larabel jika tidak ada
                $request->file('gambar_produk')->move($upload_path,$namaFoto);
                $input['gambar_produk']=$namaFoto;
            };
        }

        $produk->update($input);
        return redirect()->route('produk.index')->with('status','produk berhasil diupdate ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        Storage::disk('upload')->delete('gambar_produk');
        return redirect()->route('produk.index')->with('status','Data Produk berhasil di hapus');
    }
}
