@extends('layout.master')
@section('content')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						
	@if(session('success'))
	<div class="alert alert-success" role="alert">
			{{session('success')}}
	</div>
	@endif
		<div class="row">
			<div class="col-sm-6">
							
				<h1>Data Siswa</h1>
					<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">
				Tambah data siswa	
				</button>
			</div>

			<div class="col-sm-6">
								

			</div>
			<table class="table table-striped table-hover">
				
				<thead>
					<tr>
						<th>nama_depan</th>

						<th>nama_belakang</th>
						<th>jenis_kelamin</th>
						<th>agama</th>
						<th>alamat</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data_siswa as $siswa)
					<tr>
						<td>{{$siswa->nama_depan}}</td>

						<td>{{$siswa->nama_belakang}}</td>
						<td>{{$siswa->jenis_kelamin}}</td>
						<td>{{$siswa->agama}}</td>
						<td>{{$siswa->alamat}}</td>
						<td><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
							<a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Are u Sure..??')">Delete</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>	
		</div>					
				</div>	
				</div>
			</div>
			
		</div>
		
	</div>

				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	
					      <form action="/siswa/create" method="post">
					      	{{csrf_field()}}
						  <div class="form-group">
						    <label for="exampleInputEmail1">Nama Depan</label>
						    <input type="text" name='nama_depan' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
						  </div>

						  <div class="form-group">
						    <label for="exampleInputEmail1">Nama Belakang</label>
						    <input name='nama_belakang' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama belakang">
						  </div>
						   <div class="form-group">
						    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
						    <select name='jenis_kelamin' class="form-control" id="exampleFormControlSelect1">
						      <option value="L">Laki Laki</option>
						      <option value="P">Perempuan</option>
						    </select>
						  </div>

						  <div class="form-group">
						    <label for="exampleInputEmail1">Agama</label>
						    <input type="text" name='agama' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama">
						  </div>
						    <div class="mb-3">
								<label for="validationTextarea">Alamat</label>
								<textarea name='alamat' class="form-control " id="validationTextarea" placeholder="Alamat" ></textarea>
								
							</div>
						  <div class="form-group form-check">
						    <input type="checkbox" class="form-check-input" id="exampleCheck1">
						    <label class="form-check-label" for="exampleCheck1">Check me out</label>
						  </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

						  <button type="submit" class="btn btn-primary">Submit</button>
						</form>
				      </div>
				    </div>
				  </div>
				</div>
@stop

@section('content1')
	@if(session('success'))
	<div class="alert alert-success" role="alert">
			{{session('success')}}
	</div>
	@endif
		<div class="row">
			<div class="col-sm-6">
							
				<h1>Hallo semua</h1>
			</div>

			<div class="col-sm-6">
									<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">
				Tambah data siswa	
				</button>

			</div>
			<table class="table table-striped table-hover">
				
				<thead>
					<tr>
						<th>nama_depan</th>

						<th>nama_belakang</th>
						<th>jenis_kelamin</th>
						<th>agama</th>
						<th>alamat</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data_siswa as $siswa)
					<tr>
						<td>{{$siswa->nama_depan}}</td>

						<td>{{$siswa->nama_belakang}}</td>
						<td>{{$siswa->jenis_kelamin}}</td>
						<td>{{$siswa->agama}}</td>
						<td>{{$siswa->alamat}}</td>
						<td><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
							<a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Are u Sure..??')">Delete</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>	
		</div>
@endsection

				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	
					      <form action="/siswa/create" method="post">
					      	{{csrf_field()}}
						  <div class="form-group">
						    <label for="exampleInputEmail1">Nama Depan</label>
						    <input type="text" name='nama_depan' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
						  </div>

						  <div class="form-group">
						    <label for="exampleInputEmail1">Nama Belakang</label>
						    <input name='nama_belakang' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama belakang">
						  </div>
						   <div class="form-group">
						    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
						    <select name='jenis_kelamin' class="form-control" id="exampleFormControlSelect1">
						      <option value="L">Laki Laki</option>
						      <option value="P">Perempuan</option>
						    </select>
						  </div>

						  <div class="form-group">
						    <label for="exampleInputEmail1">Agama</label>
						    <input type="text" name='agama' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama">
						  </div>
						    <div class="mb-3">
								<label for="validationTextarea">Alamat</label>
								<textarea name='alamat' class="form-control " id="validationTextarea" placeholder="Alamat" ></textarea>
								
							</div>
						  <div class="form-group form-check">
						    <input type="checkbox" class="form-check-input" id="exampleCheck1">
						    <label class="form-check-label" for="exampleCheck1">Check me out</label>
						  </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

						  <button type="submit" class="btn btn-primary">Submit</button>
						</form>
				      </div>
				    </div>
				  </div>
				</div>