@extends('layout.master')
@section('header')
	<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

@stop
@section('content')
<div class="main">
	
<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->

								@if(session('success'))
												<div class="alert alert-success" role="alert">
														{{session('success')}}
												</div>
								@else
														<div class="alert alert-danger" role="alert">
														{{session('error')}}
												</div>
												
								@endif
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="{{asset('images/'.$siswa->avatar)}}" width="80px" height="80px" class="img-circle" alt="Avatar">
										<h3 class="name">{{$siswa->nama_depan}}</h3>
											<span class="">{{$siswa->nama}}</span>
									
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												{{$siswa->mapel->count()}}<span>Mata pelajaran</span>
											</div>
											<div class="col-md-4 stat-item">
												15 <span>Awards</span>
											</div>
											<div class="col-md-4 stat-item">
												2174 <span>Points</span>
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Basic Info</h4>
										<ul class="list-unstyled list-justify">
											<li>Jenis_kelamin <span>{{$siswa->nama}}</span></li>
											
											<li>Jenis_kelamin <span>{{$siswa->jenis_kelamin}}</span></li>
											<li>Agama<span>{{$siswa->agama}}</li>
											<li>Email <span>{{Auth()->user()->email}}</span></li>
											<li>Website <span><a href="https://www.themeineed.com">www.themeineed.com</a></span></li>
										</ul>
									</div>
									<div class="profile-info">
										<h4 class="heading">Social</h4>
										<ul class="list-inline social-icons">
											<li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#" class="google-plus-bg"><i class="fa fa-google-plus"></i></a></li>
											<li><a href="#" class="github-bg"><i class="fa fa-github"></i></a></li>
										</ul>
									</div>
									<div class="profile-info">
										<h4 class="heading">About</h4>
										<p>Interactively fashion excellent information after distinctive outsourcing.</p>
									</div>
									@if(auth()->user()->role == 'admin')

									<div class="text-center"><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-primary">Edit Profile</a>
									</div>
									@endif
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->

							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								<!-- TABBED CONTENT -->
								<div class="custom-tabs-line tabs-line-bottom left-aligned">
									<ul class="nav" role="tablist">
										<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Recent Activity</a></li>
										<li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Kuliah </a></li>
									</ul>
									<!-- Button trigger modal -->
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
									Tambah Nilai
									</button>
								</div>
								<div class="tab-content">
									<div class="tab-pane fade in active" id="tab-bottom-left1">
										<ul class="list-unstyled activity-timeline">
											<li>
												<i class="fa fa-comment activity-icon"></i>
												<p>Commented on post <a href="#">Prototyping</a> <span class="timestamp">2 minutes ago</span></p>
											</li>
											<li>
												<i class="fa fa-cloud-upload activity-icon"></i>
												<p>Uploaded new file <a href="#">Proposal.docx</a> to project <a href="#">New Year Campaign</a> <span class="timestamp">7 hours ago</span></p>
											</li>
											<li>
												<i class="fa fa-plus activity-icon"></i>
												<p>Added <a href="#">Martin</a> and <a href="#">3 others colleagues</a> to project repository <span class="timestamp">Yesterday</span></p>
											</li>
											<li>
												<i class="fa fa-check activity-icon"></i>
												<p>Finished 80% of all <a href="#">assigned tasks</a> <span class="timestamp">1 day ago</span></p>
											</li>
										</ul>
										<div class="margin-top-30 text-center"><a href="#" class="btn btn-default">See all activity</a></div>
									</div>
									<div class="tab-pane fade" id="tab-bottom-left2">
										<div class="table-responsive">
											
			<table class="table table-striped table-hover">
				
				<thead>
					<tr>
						<th>Kode</th>

						<th>Mata pelajaran</th>
						<th>Semester</th>
						<th>Nilai</th>
						<th>Guru</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($siswa->mapel as $mapel)
										<tr>
						<td><a href="/siswa/1/profile">{{$mapel->kode}}</a></td>

						<td><a href="/siswa/1/profile">{{$mapel->nama}}</a></td>
						<td>{{$mapel->semester}}</td>
						<td><a href="#" class="nilai" data-type="text" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Masukan nilai">{{$mapel->pivot->nilai}}</a>
						</td>
						<td><a href="/siswa/{{$mapel->guru_id}}/profile">{{$mapel->guru->nama}}</a></td>
						<td><a href="/siswa/{{$siswa->id}}/{{$mapel->id}}/deletenilai" class="btn btn-danger btn-sm" onclick="return confirm('Are u Sure..??')">Delete</a></td></td>
					</tr>
					@endforeach
							
									</tbody>
			</table>	
										</div>
									</div>
								</div>
								<div class="panel">
									<div id="chartNilai"></div>
								</div>
								<!-- END TABBED CONTENT -->
							</div>
							<!-- END RIGHT COLUMN -->
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        				      	
					      <form action="/siswa/{{$siswa->id}}/addnilai" method="post" enctype="multipart/form-data">
					      	{{csrf_field()}}
				      	 <div class="form-group">
						    <label for="emapel">Mata pelajaran</label>
						    <select class="form-control" id="mapel" name="mapel">
						      @foreach($matapelajaran as $mp)
						      <option value="{{$mp->id}}">{{$mp->nama}}</option>
						      @endforeach
						    </select>
						  </div>
						  <div class="form-group{{$errors->has('nilai')?'has-error':''}}">
						    <label for="exampleInputEmail1">Nilai</label>
						    <input type="text" name='nilai' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai" value="{{old('nilai')}}">
						    @if($errors->has('nilai'))
						  		<span class="help-block">{{$errors->first('nilai')}}</span>  
						    @endif
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
@section('footer')
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script>
					
						Highcharts.chart('chartNilai', {
			    chart: {
			        type: 'column'
			    },
			    title: {
			        text: 'Laporan Nilai Siswa'
			    },
			    subtitle: {
			        text: 'Source: WorldClimate.com'
			    },
			    xAxis: {
			        categories: {!!json_encode($categories)!!},
			        crosshair: true
			    },
			    yAxis: {
			        min: 0,
			        title: {
			            text: 'Rainfall (mm)'
			        }
			    },
			    tooltip: {
			        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
			            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
			        footerFormat: '</table>',
			        shared: true,
			        useHTML: true
			    },
			    plotOptions: {
			        column: {
			            pointPadding: 0.2,
			            borderWidth: 0
			        }
			    },
			    series: [{
			        name: 'Nilai',
			        data: {!!json_encode($data)!!}

			    }]
			});

		$(document).ready(function() {
    $('.nilai').editable();
});
	</script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

@stop