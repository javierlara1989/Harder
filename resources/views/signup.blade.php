<link href="{{ asset('css/home.css') }}" media="all" rel="stylesheet" type="text/css" />
<div class="login">
    <h1>Create account</h1>
    <form method="post" action="/signup">
        <input type="text" name="email" placeholder="Email" required="required" />
        <input type="password" name="password" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">Login</button>
    </form>
</div>
