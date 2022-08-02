<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get all users</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<style>
    .tbl{
        width:1000px;
        margin:0 auto;
        /* padding: 0 auto; */

    }
</style>
<body>
<div class="tbl">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">email</th>
      <th scope="col">phone</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user )
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->phone}}</td>
      <td><a href="/edit_user/{{$user->id}}">Edit</a></td>
      <td><a href="/deleteuser/{{$user->id}}">Delete</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
    
</body>
</html>