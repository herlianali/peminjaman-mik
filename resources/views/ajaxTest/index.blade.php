<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Ajax test in </title>
  </head>
  <body class="bg-secondary">
    
    <div class="container">	
	    <div class="card mt-5">
		  <div class="card-body">
		  	<div class="row">
		  		<div class="col-md-6">
		  			<h2>Daftar User</h2>
		  		</div>
		  		<div class="col-md-4"></div>
		  		<div class="col-md-2">
		  			<button class="btn btn-primary" id="create" onclick="addPost()"> Tambah Data </button>
		  		</div>

			    <table class="table">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">Id</th>
				      <th scope="col">Name</th>
				      <th scope="col">Role</th>
				      <th scope="col">Username</th>
				      <th scope="col">Password</th>
				      <th scope="col">Created at</th>
				      <th scope="col">Updated at</th>
				      <th scope="col">Aksi</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach ($user as $u)
					    <tr id="row_{{$u->id}}">
					      <th scope="row">{{$u->id}}</th>
					      <td>{{ $u->name }}</td>
					      <td>{{ $u->role }}</td>
					      <td>{{ $u->username }}</td>
					      <td>{{ $u->password }}</td>
					      <td>{{ $u->created_at }}</td>
					      <td>{{ $u->updated_at }}</td>
					      <td>
					      	<button class="btn btn-primary">edit</button>
					      	<button class="btn btn-danger">hapus</button>
					      </td>
					    </tr>
				  	@endforeach
				  </tbody>
				</table>
		  	</div>

		  </div>
		</div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>