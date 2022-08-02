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
        margin-top: 50px;
        padding: 50px;
    }
</style>
<body>
 @if (session('success') && session('id'))
    <div class="alert alert-success">
        {{ session('success') }}  for user with id {{session('id') }} KEEP YOUR ID SAFE
    </div>
@endif
<form action= "/createuser" method = "post">
    @csrf 
  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter name" required>
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPhoneNumber">PhoneNumber</label>
    <input type="number" name="phone" class="form-control" id="exampleInputPhoneNumber1" placeholder="Enter phone number" required>
  </div>
  <!-- <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>