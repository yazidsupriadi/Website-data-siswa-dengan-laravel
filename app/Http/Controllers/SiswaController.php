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
        $this->validate($request,[
            'nama_depan' => 'min:5'
        ]);//validasi form
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
       if ($request->hasFile('avatar')) {
        $request->file('avatar')->move(public_path('images/'),$request->file('avatar')->getClientOriginalName());
        $siswa->avatar = $request->file('avatar')->getClientOriginalName();
        $siswa->save();
        
        }       
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

   public  function deletenilai($idsiswa,$idmapel)
    {   
        $siswa = \App\Siswa::find($idsiswa);
        $siswa->mapel()->detach($idmapel);
        return redirect()->back()->with('success','Data DiHapus!');
            
    }
    public  function profile(Request $request,$id)
    {   
        $siswa = \App\Siswa::find($id);
        $matapelajaran = \App\Mapel::all();

        //menyiapkan data untuk chart
        $categories = [];
        $data = [];
        foreach ($matapelajaran as $mp) {
            if($siswa->mapel()->where('mapel_id',$request->mapel)->exists()){
                     $categories[] = $mp->nama;
            $data[] = $siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()->pivot->nilai;
       
            }
        }
        return view('siswa.profile',['siswa' =>$siswa,'matapelajaran'=> $matapelajaran,'categories'=>$categories,'data'=>$data]);
                
    }
    public function addnilai(Request $request,$idsiswa)
    {
        
        $siswa = \App\Siswa::find($idsiswa);
        if($siswa->mapel()->where('mapel_id',$request->mapel)->exists()){
            return redirect('/siswa/'.$idsiswa.'/profile')->with('error','Data gagal Di tambahkan!');
                
        }
        $siswa->mapel()->attach($request->mapel,['nilai'=>$request->nilai]);
        return redirect('/siswa/'.$idsiswa.'/profile')->with('success','Data Di tambahkan!');
              
    }


}
