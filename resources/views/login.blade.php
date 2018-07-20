<link href="{{ asset('css/home.css') }}" media="all" rel="stylesheet" type="text/css" />
<div class="login">
    <h1>Login</h1>
    <form method="post" action="/login">
        <input type="text" name="u" placeholder="Username" required="required" />
        <input type="password" name="p" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">Login</button>
    </form>
</div>
<div>
    <form action="/signup" method="get">
        <input type="submit" value="Sign Up" name="Submit"/>
    </form>
</div>
