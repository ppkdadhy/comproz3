<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;//Tambahkan ini

class EdulevelController extends Controller
{
    public function data()
    {
        $edulevels = DB::table('edulevels')->get();//<--- Perintah ini sama seperti SELECT di query
        //return $edulevels; //coba di cek atau bisa dicek menggunakan dd($edulevels)
        //dd($edulevels);
        //return view('edulevel.data', compact('edulevels')); //bisa pakai ini atau bisa pake with
        return view('edulevel.data')->with('edulevels', $edulevels);
        //return view('edulevel.data', ['edulevels' => $edulevels]);
    }
    public function add()
    {
        return view('edulevel.add');// bisa pake . atau bisa pake /
    }
    public function addProcess(Request $request)
    {
        //BUAT VALIDASI ---
        $request->validate([//name dan desc itu atribut name pada html
            'name' => 'required|min:2',
            'desc' => 'required'
        ],[
            'name.required' => 'Nama jenjang tidak boleh kosong'
        ]);
        //BUAT VALIDASI ---
        DB::table('edulevels')->insert(
            ['name' => $request->name, //request->name name ini sesuai dengan atribute name di html
                'desc' => $request->desc
            ]);
            return redirect('edulevels')->with('status', 'Jenjang Berhasil di Add!');
        //1. return $request;
    }
    public function edit($id){
        $edulevels = DB::table('edulevels')->where('id', $id)->first();
        return view('edulevel.edit')->with('edulevels', $edulevels);
    }
    public function editProcess(Request $request, $id){
                //BUAT VALIDASI ---
                $request->validate([//name dan desc itu atribut name pada html
                    'name' => 'required|min:2',
                    'desc' => 'required'
                ],[
                    'name.required' => 'Nama jenjang tidak boleh kosong'
                ]);
                //BUAT VALIDASI ---
        DB::table('edulevels')->where('id', $id)->update([
            'name' => $request->name, //request->name name ini sesuai dengan atribute name di html
            'desc' => $request->desc
        ]);
        return redirect('edulevels')->with('status', 'Jenjang Berhasil di Edit!');
    }
    public function delete($id)
    {
        DB::table('edulevels')->where('id', $id)->delete();
        return redirect('edulevels')->with('status', 'Jenjang Berhasil di Delete!');
        //return "delete";
    }
}
