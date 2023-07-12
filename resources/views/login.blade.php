<html>
    <head>
        <title>Dashboard</title>
    </head>
    <body>
        <h1>Dashboard Login</h1>
        <form action="{{ route('DashLogin') }}">
        <input type="text" placeholder="Username" name="username"> <br>
        <input type="text" placeholder="Password" name="password"> <br>
        <input type="submit" value="Submit">
        </form>
    </body>
</html>