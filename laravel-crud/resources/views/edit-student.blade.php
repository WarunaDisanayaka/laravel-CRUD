<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Student</title>
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Add Student</h2>
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form action="{{url('update-student')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="col-md-6">
                        <label class="form-lable">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{$data->name}}">
                        @error('name')
                            <span style="color: red;">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-lable">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter Name" value="{{$data->email}}">
                         @error('email')
                            <span style="color: red;">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-lable">Phone</label>
                        <input type="text" name="phone" class="form-control" placeholder="Enter Name" value="{{$data->phone}}">
                         @error('phone')
                            <span style="color: red;">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-lable">Address</label>
                        <textarea name="address" class="form-control" placeholder="Enter Address" cols="10" rows="5" value="">{{$data->address}}</textarea>
                         @error('address')
                            <span style="color: red;">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{url('student-list')}}" class="btn btn-danger">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>