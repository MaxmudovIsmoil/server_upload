<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form action="/upload" method="POST" class="mt-4 col-md-6 col-offset-3" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="file">Files</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="file" name="files[]">
                <label class="custom-file-label" for="file">Choose file</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>


</body>
</html>
