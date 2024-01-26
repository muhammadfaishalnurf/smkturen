<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .login-box {
            border: solid 1px;
            width: 500px;
            border-radius: 15px;
        }
    </style>
</head>

<body>
    <div class="container py-5 justify-content-center align-items-center d-flex">
        <div class="login-box">
            <form style="padding:15px; background:pink; border-radius: 15px;" method="post">
                @csrf
                <fieldset >
                    <legend>Login</legend>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email" required>

                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" type="password" name="password" id="password" required>
                    </div>
                    <div class="ml-7 ms-auto mb-2 mb-lg-0">
                    <button type="submit" class="btn btn-primary ">Submit</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
  
</body>

</html>