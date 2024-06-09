<!DOCTYPE html>
<html>
<head>
    <title>Password Configuration</title>
    <style>
        .ne_pass_set{
            display: table;
            margin: auto;
            width:240px;
        }
        input{
            width: 100%;
            padding: 2px;
            margin: 4px 0;
        }
        form .btn-new-pass{
            border: none;
            background: red;
            color: wheat;
            font-size: 16px;
            padding: 5px;
        }
        form .btn-new-pass:hover{
            background: white;
            color: red;
            outline: 1px solid red;
        }
    </style>
</head>
<body>
    <div class="ne_pass_set">
        <h2>Set new password</h2>
        <form action="{{url('forgot_password_change_proccess')}}" method="post">
            
            <label for="password">Password:</label><br>
            <input type="password"  name="password" required  title="Password must be at least 8 characters long">
            <br>
            <label for="password">Conform Password:</label><br>
            <input type="password"  name="c_password" required title="Password must be at least 8 characters long"><br>
            @csrf
            <input class="btn-new-pass" type="submit" value="Submit">
        </form>
    </div>
    
</body>
</html>
