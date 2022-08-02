<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create_user</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
    form {
        width: 500px;
        margin: 0 auto;
    }
</style>
<body>
  @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('updatesuccessful'))
    <div class="alert alert-success">
        {{ session('updatesuccessful') }}
    </div>
@endif
@if (session('deletesuccessful'))
    <div class="alert alert-success">
        {{ session('deletesuccessful') }}
    </div>
@endif
    <style class= "form-group" width="" margin= 0 auto></style>
<form action= "/find_known_user" method = "post">
    @csrf 
  
  <div class="form-group">
    <h3>ENTER YOUR ID IF YOU KNOW IT </h3>
    <label for="exampleInputPhoneNumber">Enter User ID</label>
    <input type="number" name="id" class="form-control" id="exampleInputPhoneNumber1" placeholder="Enter ID">
  </div>
  <!-- <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@isset($currentuser)
<form action= "/edituser" method = "post">
    @csrf 
  <br><br><br><br>
  <h3>MAKE THE APPROPIATE CHANGES BELOW AND SUBMIT  OR <a href="/deleteuser/{{$currentuser->id}}">DELETE USER</a></h3>
  <div class="form-group">
    <input type="hidden" name="id" value="{{$currentuser->id}}">
    <label for="exampleInputName">Name</label>
    <input type="text" name="name" value="{{$currentuser->name}}" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter name">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" value="{{$currentuser->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPhoneNumber">PhoneNumber</label>
    <input type="number" name="phone" value="{{$currentuser->phone}}" class="form-control" id="exampleInputPhoneNumber1" placeholder="Enter phone number">
  </div>
  <!-- <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" class="btn btn-primary">Submit Changes</button>
</form>
@endisset

</body>
</html>