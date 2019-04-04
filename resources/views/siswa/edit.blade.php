@extends('layout.master')
@section('content')
	
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						
		<h1> edit data siswa</h1>
		<div class="row">
			<div class="col-lg-12">
				
		      <form action="/siswa/{{$siswa->id}}/update" method="post" enctype="multipart/form-data">
		      	{{csrf_field()}}
			  <div class="form-group">
			    <label for="exampleInputEmail1">Nama Depan</label>
			    <input type="text" name='nama_depan' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$siswa->nama_depan}}">
			  </div>

			  <div class="form-group">
			    <label for="exampleInputEmail1">Nama Belakang</label>
			    <input name='nama_belakang' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama belakang" value="{{$siswa->nama_belakang}}">
			  </div>
			   <div class="form-group">
			    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
			    <select name='jenis_kelamin' class="form-control" id="exampleFormControlSelect1" >
			      <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki Laki</option>
			      <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
			    </select>
			  </div>

			  <div class="form-group">
			    <label for="exampleInputEmail1">Agama</label>
			    <input type="text" name='agama' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{$siswa->agama}}">
			  </div>

			    <div class="mb-3">
					<label for="validationTextarea">Alamat</label>
					<textarea name='alamat' class="form-control " id="validationTextarea" placeholder="Alamat"  >{{$siswa->alamat}}</textarea>
					
				</div>

			  <div class="form-group">
			    <label for="exampleInputEmail1">Avatar</label>
			    <input type="file" name='avatar' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Avatar" value="{{$siswa->avatar}}">
			  </div>
			  <div class="form-group form-check">
			    <input type="checkbox" class="form-check-input" id="exampleCheck1">
			    <label class="form-check-label" for="exampleCheck1">Check me out</label>
			  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

			  <button type="submit" class="btn btn-warning">Update</button>
			</form>
	
			</div>
		</div>
					</div>
				</div>	
			</div>
		</div>
	</div>			
@stop
@section('content1')
		<h1> edit data siswa</h1>
		<div class="row">
			<div class="col-lg-12">
				
		      <form action="/siswa/{{$siswa->id}}/update" method="post">
		      	{{csrf_field()}}
			  <div class="form-group">
			    <label for="exampleInputEmail1">Nama Depan</label>
			    <input type="text" name='nama_depan' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$siswa->nama_depan}}">
			  </div>

			  <div class="form-group">
			    <label for="exampleInputEmail1">Nama Belakang</label>
			    <input name='nama_belakang' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama belakang" value="{{$siswa->nama_belakang}}">
			  </div>
			   <div class="form-group">
			    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
			    <select name='jenis_kelamin' class="form-control" id="exampleFormControlSelect1" >
			      <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki Laki</option>
			      <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
			    </select>
			  </div>

			  <div class="form-group">
			    <label for="exampleInputEmail1">Agama</label>
			    <input type="text" name='agama' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{$siswa->agama}}">
			  </div>
			    <div class="mb-3">
					<label for="validationTextarea">Alamat</label>
					<textarea name='alamat' class="form-control " id="validationTextarea" placeholder="Alamat"  >{{$siswa->alamat}}</textarea>
					
				</div>
			  <div class="form-group form-check">
			    <input type="checkbox" class="form-check-input" id="exampleCheck1">
			    <label class="form-check-label" for="exampleCheck1">Check me out</label>
			  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

			  <button type="submit" class="btn btn-warning">Update</button>
			</form>
	
			</div>
		</div>
@endsection