<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class MahasiswaController extends Controller
{
    public function index()
    {
        //ORM = Elequent use model
        //DB Collection = DB::table('tb_mahasiswa')
        //DB RAW = (Select * form .... )

        // $data['coll_mahasiswa'] = DB::table('tb_mahasiswa')->get();
        // $data['orm_mahasiswa'] = Mahasiswa::get();
        // $data['raw_raw'] = DB::select("select nim as nim, nama as nama, id_jurusan as jurusan, no_tlfn as tlfn, tgl_lahir as lahir from tb_mahasiswa order by tgl_lahir ASC limit 1");
        $data['map_function'] = Mahasiswa::select(
            'nim',
            'nama',
            'id_jurusan',
            'no_tlfn',
            'tgl_lahir'
        )
            ->get()
            ->map(function ($mhs) {
                return [
                    'nim' => $mhs->nim,
                    'nama' => $mhs->nama,
                    'id_jurusan' => $mhs->id_jurusan,
                    'no_tlfn' => $mhs->no_tlfn,
                    'tgl_lahir' => Carbon::parse($mhs->tgl_lahir)->format('d M Y'),
                ];
            });
        // return $data;
        return view('datamasters.mahasiswa.list', $data);
    }

    public function dtMahasiswa()
    {
        $mahasiswa = Mahasiswa::select(
            'nim',
            'nama',
            'id_jurusan',
            'no_tlfn',
            'tgl_lahir'
        )
            ->get()
            ->map(function ($mhs) {
                return [
                    'nim' => $mhs->nim,
                    'nama' => $mhs->nama,
                    'id_jurusan' => $mhs->id_jurusan,
                    'no_tlfn' => $mhs->no_tlfn,
                    'tgl_lahir' => Carbon::parse($mhs->tgl_lahir)->format('d M Y'),
                ];
            });
        return DataTables::of($mahasiswa)
            ->addIndexColumn()
            ->make(true);
    }

    public function detail($nim)
    {
        return "detail";
    }

    public function insert()
    {
        if (Gate::allows('mhs-active')) {
            return view('datamasters.mahasiswa.insert');
        }
        abort(403, 'Unauthorized action.');
    }

    public function create(Request $request)
    {
        $rules = [
            'nim' => 'required|max:16|unique:tb_mahasiswa',
            'nama' => 'required|max:50',
            'id_jurusan' => 'required|max:10',
            'alamat' => 'required',
            'semester' => 'required',
            'no_tlfn' => 'required|max:13',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'email' => 'required|email|unique:tb_mahasiswa',
            'tahun_masuk' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $mhsData = [
            'nim' => $request->nim,
            'nama' => $request->nama,
            'id_jurusan' => $request->id_jurusan,
            'alamat' => $request->alamat,
            'semester' => $request->semester,
            'no_tlfn' => $request->no_tlfn,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'email' => $request->email,
            'tahun_masuk' => $request->tahun_masuk,
            'status' => 'A',
            'password' => Hash::make($request->nim)
        ];

        $storeMhs = Mahasiswa::create($mhsData);

        if ($storeMhs) {
            return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Ditambah.');
        } else {
            return redirect()->route('mahasiswa.index')->with('fail', 'Mahasiswa Gagal Ditambah.');
        }
    }

    public function edit()
    {
    }

    public function update()
    {
    }
}
