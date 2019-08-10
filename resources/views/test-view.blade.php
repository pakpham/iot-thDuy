<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Test form</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <form action="{{ url('post-test') }}" method="POST" role="form">
        <legend>Test submit form</legend>
        <div class="form-group">
            <label for="">label</label>
            <br>
            
            <input type="text" name="name" value="Anh">
            <input type="text" name="age" value="23">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>
