<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Laboratorium;
use App\Model\PeminjamanLab;

class labController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas  = Laboratorium::all();

        return view('laboratorium.index')->with('datas',$datas);
    }

    public function laboratorium()
    {
        $labs = Laboratorium::all();
        return view('mahasiswa.laboratorium', compact('labs'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laboratorium.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaLab'   => 'required',
            'aslab'     => 'required',
            'kapasitas' => 'required',
            'fasilitas' => 'required',
            'foto'      => 'required|file|image|nullable|max:2999|mimes:jpg,jpeg,png',
        ]);

        $file = $request->file('foto');
        $nama_file = time().".".$file->getClientOriginalExtension();
        $file->storeAs('/public/data_images/laboratorium', $nama_file);

        Laboratorium::create([
            'nama_lab'  => $request->namaLab,
            'aslab'     => $request->aslab,
            'kapasitas' => $request->kapasitas,
            'fasilitas' => $request->fasilitas,
            'foto'      => $nama_file,
        ]);

        return redirect()->route('laboratorium.index')
                         ->with(['success' => 'Berhasil menambahkan laboratorium baru']);
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
        $request->validate(['foto' => 'file|image|nullable|max:2999|mimes:jpg,jpeg,png']);

        $lab = Laboratorium::where('id_lab', $id)
                            ->first();
        
        if ($request->has('foto')) {
            $file = $request->file('foto');
            $nama_file = time().".".$file->getClientOriginalExtension();    
            $file->storeAs('/public/data_images/laboratorium', $nama_file);
        }else{
            $nama_file = $lab['foto'];
        }

        Laboratorium::where('id_lab', $id)
                    ->update([
                        'nama_lab'  => $request->namaLab,
                        'aslab'     => $request->aslab,
                        'kapasitas' => $request->kapasitas,
                        'fasilitas' => $request->fasilitas,
                        'foto'      => $nama_file,
                    ]);

        return redirect()->route('laboratorium.index')
                         ->with(['success' => 'Berhasil mengedit data laboratorium']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Laboratorium::where('id_lab', $id)
                    ->delete();

        return redirect()->route('laboratorium.index')
                         ->with(['successD' => 'Berhasil mengedit data laboratorium']);
    }

    public function selesai($id)
    {
        $datas = PeminjamanLab::find($id);
        $datas->status = "selesai";
        $datas->save();

        return redirect('/home');
    }
}
