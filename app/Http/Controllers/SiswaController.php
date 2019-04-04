<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //
   public  function index(Request $request)
    {	
    	if ($request->has('cari')) {
    		$data_siswa = \App\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->get();	
    		
    	}else {
    		
    	$data_siswa = \App\Siswa::all();		
    	}	
    	return view('siswa.index',['data_siswa'=>$data_siswa]);
    }

   public  function create(Request $request)
    {	//insert siswa
        $user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('oncombalado');
        $user->remember_token = str_random(60);
        $user->save();
        
        //insert siswa
        $request->request->add(["user_id" => $user->id]);
        $siswa = \App\Siswa::create($request->all());
        
    	return redirect('/siswa')->with('success','Data masuk!');
    }

   public  function edit($id)
    {	
    	$siswa = \App\Siswa::find($id);
    	return view('siswa/edit',['siswa' =>$siswa]);
    }

   public  function update(Request $request,$id)
    {	
    	$siswa = \App\Siswa::find($id);
    	$siswa->update($request->all());
        if ($request->hasFile('avatar')) {
    $request->file('avatar')->move(public_path('images/'),$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
            
        }
		return redirect('/siswa')->with('success','Data Di update!');
        	
    }

   public  function delete($id)
    {	
    	$siswa = \App\Siswa::find($id);
    	$siswa->delete($siswa);
    	return redirect('/siswa')->with('success','Data DiHapus!');
        	
    }
    public  function profile($id)
    {   
        $siswa = \App\Siswa::find($id);
        return view('siswa.profile',['siswa' =>$siswa]);
                
    }


}
