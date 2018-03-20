@extends('layouts.app')

@section('content')
	<div id="wrapper">
			<div class="container">
				<h2 class="text-center"><strong>Employee Management</strong></h2>
				<hr>
			<div class="row">
				@auth('web')
				<div class="col-2">
					<a class="btn btn-success btn-block" href="{{ route('employee.create')}}"><i class="fas fa-plus-square"></i> Add New</a><br>
				</div>
				@endauth
			</div>	
			<!-- <div class="dataTables_length" id="table-buku_length"><label>Show <select name="table-buku_length" aria-controls="table-buku" class=""><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div> -->
			<table class="table dataTable" style="margin-top: 25px;" id="employee-table">	
			  <thead class="thead-dark">
			    <tr class="table-light" align="left">
			      <th scope="col">No.</th>
			      <th scope="col">Employee ID</th>
			      <th scope="col">Full Name</th>
			      <th scope="col">Gender</th>
			      <th scope="col">Email</th>
			      <th scope="col">Division</th>
			      <th scope="col">Grade</th>
			      @auth('web')
			      <th scope="col">Action</th>
			      @endauth
			    </tr>
			  </thead>
			  <tbody>
			     @foreach ($user  as $index => $user)
			    <tr class="table-light" align="left">			      
			      <th scope="row">{{ $index+1 }}</th>
			      <td>{{ $user->employee_id }}</td>
			      <td>{{ $user->name }}</td>
			      <td>{{ $user->gender }}</td>
			      <td>{{ $user->email }}</td>
			      <td>{{ $user->division_status }}</td>
			      <td>{{ $user->grade_status }}</td>
			      @auth('web')
				      <td>
				      	<div class="row">
				      		<div class="form-inline">
					      		<div class="form-group mb-2">
					      			{!! Form::open(['route' => ['employee.edit', $user->id], 'method' => 'GET']) !!}
									{{csrf_field()}}
									{{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
									{!! Form::close() !!}	
					      		</div>
					      		&nbsp; | &nbsp;
					      		<div class="form-group mb-2">
					      			{!! Form::open(['route' => ['employee.destroy', $user->id], 'method' => 'DELETE']) !!}
							      		{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
							      	{!! Form::close() !!}	
					      		</div>	
					      	</div>
				      	</div>
				      </td>
			      @endauth
			    </tr>
			   @endforeach		
			  </tbody>
			</table>
		</div>
	</div>	

	<script src="{{url('js/jquery.min.js')}}" ></script>
    <!-- ini untuk bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" ></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <!-- end bootstrap -->

	<!-- ini untuk datatables -->
    <script src="{{url('js/jquery.dataTables.min.js')}}"></script>

    <!-- Pastikan posisi dibawah import datatablesnya -->
    <script type="text/javascript">
    $(document).ready( function () {
	    $('#employee-table').DataTable();
	} );
    // $(function() {
    //     var oTable = $('#employee-table').dataTable({
    //         processing: false,
    //         serverSide: true,
    //         ajax: {
    //             url: '{{ url("employee") }}'
    //         },
    //         columns: [
    //         {data: 'employee_id',   name: 'employee_id'},
    //         {data: 'name',     name: 'name'},
    //         {data: 'email',   name: 'email'},
    //         {data: 'division_status', name: 'division_status',  orderable: false},
    //         {data: 'grade_status',  name: 'grade_status',   orderable: false, searchable: false},
    //     ],
    //     });
    // });
  </script>
  <!-- end datatables -->

@endsection