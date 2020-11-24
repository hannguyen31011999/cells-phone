<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset=UTF-8>
    <title>Document</title>
</head>
<body>
    <form action="{{ url('/test') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
            <input type="file" name="abc[]" multiple>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-info">Upload</button>
            </div>
        </div>
    </form>
</body>
</html>