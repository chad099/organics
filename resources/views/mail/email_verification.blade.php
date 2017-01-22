<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verify Your Email Address</h2>

        <div>
            Thanks for creating an account with the organics.
            Please follow the link below to verify your email address
            <a href="{{ URL::to('register/verify/' . $user->confirmation_code) }}">click here</a>.<br/>
        </div>
        <p>Copy, paste below link intto your browser url area for verify account.</p>
        <p>{{ URL::to('register/verify/' . $user->confirmation_code) }}</p>

    </body>
</html>
