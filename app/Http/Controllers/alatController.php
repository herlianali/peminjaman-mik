<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Alat;

class alatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Alat::select('*')->paginate(10);
        return view('alat.index')->with(compact('datas'));
    }

    public function mahasiswa()
    {
        $datas = Alat::select('*')->paginate(10);
        return view('mahasiswa.alat.alat')->with(compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alat.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $images    = $request->file('images');
        $path      = 'data_images';
        // $nama_file = time().".".$file->getClientOriginalExtension();
        
        if ($images->extension() == "png" || "jpg" || "jpeg") 
        {    
            $data = new Alat;
            $data->nama_alat  = $request->nama_alat;
            $data->jumlah     = $request->jumlah;
            $data->keterangan = $request->keterangan;
            $data->tempat     = $request->tempat;
            $data->images     = $images->getClientOriginalName();
            $data->save();

            $images->move($path, $images->getClientOriginalName());

            return redirect('laborant/peralatan');
        }
        
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
        $alat = Alat::where('id_alat', $id)
                    ->first();
        return view('alat.edit', compact('alat'));
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
        $alat = Alat::where('id_alat', $id)
                    ->first();
        
        if ($request->has('images')) {
            $images    = $request->file('images');
            $nama_file = time().".".$images->getClientOriginalExtension();   
            $images->move('data_images', $nama_file);
        }else{
            $nama_file = $alat['images'];
        }

        Alat::where('id_alat', $id)
            ->update([
                'nama_alat'  => $request->nama_alat,
                'jumlah'     => $request->jumlah,
                'keterangan' => $request->keterangan,
                'tempat'     => $request->tempat,
                'images'     => $nama_file,
            ]);

        return redirect('peralatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alat::where('id_alat', $id)
            ->delete();

        return redirect('peralatan');
    }
}
