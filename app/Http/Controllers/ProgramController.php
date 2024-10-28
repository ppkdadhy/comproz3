<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Edulevel; //Tambahkan ini buat create program
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$programs = Program::withTrashed()->get();//Menampilkan data yang dihapus sementara dan menampilkan data yang belum di hapus
        //$programs = Program::onlyTrashed()->get();//Menampilkan data yang hanya dihapus sementara
        //$programs = Program::all();
        //$programs = Program::with('edulevel')->get();
        $programs = Program::with('edulevel')->simplePaginate(5);
        //return $program;
        return view('program.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $edulevels = Edulevel::all();
        return view('program.create', compact('edulevels'));//edulevels adalah nama table di database
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //return $request; buat mengirim inputan ke database 
        $request->validate([
            'name' => 'required|min:3', //name dari atribute name pada HTML
            'edulevel_id' => 'required',
            'student_max' => 'max:2',
        ],[
            'edulevel_id.required' => 'Pilih terlebih dahulu Jenjang Pendidikan'
        ]);

        $program = new Program;
 
        $program->name = $request->name; //name yang kiri dari table database, yang kanan atribute name pada html
        $program->edulevel_id = $request->edulevel_id;
        $program->student_price = $request->student_price;
        $program->student_max = $request->student_max;
        $program->info = $request->info;
        $program->save();
        return redirect('programs')->with('status', 'Program berhasil ditambah!');
       
    }

    /**
     * Display the specified resource.
     */
    //public function show($id)
    public function show(Program $program)
    {
        //
        //$program = Program::find($id);
        
        // $program = Program::where('id', $id)->get();// maka ini jadi array object
        // $program = $program[0];
        // return $program;
        $program->makeHidden(['edulevel_id']);
        return view('program.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        $edulevels = Edulevel::all();
        return view('program/edit', compact('program', 'edulevels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        //edit.blade.php
        //return $request;
        $request->validate([
            'name' => 'required|min:3', //name dari atribute name pada HTML
            'edulevel_id' => 'required',
            'student_max' => 'max:2',
        ],[
            'edulevel_id.required' => 'Pilih terlebih dahulu Jenjang Pendidikan'
        ]);
        
        //Cara 1 :
        // $program->name = $request->name;
        // $program->edulevel_id = $request->edulevel_id;
        // $program->student_price = $request->student_price;
        // $program->student_max = $request->student_max;
        // $program->info = $request->info;
 
        // $program->save();
        //cara 2: menggunakan parameter array assosiative
        $program::where('id', $program->id)
        ->update([
        'name' => $request->name,
        'edulevel_id' => $request->edulevel_id,
        'student_price' => $request->student_price,
        'student_max' => $request->student_max,
        'info' => $request->info,
      ]);
        return redirect('programs')->with('status', 'Program berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        //index.blade.php
        //cara 1
        // $program->delete();
        //$program->forceDelete();//artinya delete paksa meskipun datanya sudah menggunakan kodingan hapus sementara
        //cara 2
        //Program::destroy($program->id);
        //cara 3
        $program::where('id', $program->id)->delete();//id itu dari field database
        return redirect('programs')->with('status', 'Program berhasil di Delete!');
    }

    public function trash()
    {
        $programs = Program::onlyTrashed()->get();
        return view('program/trash', compact('programs'));
    }
    public function restore($id = null) {
        if ($id != null) {
            $programs = Program::onlyTrashed()
            ->where('id', $id)
            ->restore();
        }else {
            $program = Program::onlyTrashed()->restore();
        }
        return redirect('programs/trash')->with('status', 'Program berhasil di Restore!');
    }
    public function delete($id = null) {
        if ($id != null) {
            $programs = Program::onlyTrashed()
            ->where('id', $id)
            ->forceDelete();
        }else {
            $program = Program::onlyTrashed()->forceDelete();
        }
        return redirect('programs/trash')->with('status', 'Program berhasil di Delete Permanen!');
    }
}
