<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>
    <!-- Bootstrap -->
    <link rel="shortcut icon" type="image/png" href="/images/fabicon.png"/>
    <link rel="stylesheet" type="text/css" href="/vendor/semantic/dist/semantic.css">
    <link rel="stylesheet" type="text/css" href="/css/theme/default/stash/customnew.css">
    <link rel="stylesheet" href="/vendor/semantic-ui-calendar/dist/calendar.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- font-family: 'Roboto', sans-serif; -->
    <!-- font-family: 'Poppins', sans-serif; -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background-color: #fff;">
<!-- content asection-->
<div class="admin-login-page container">
    <div class="ui internally celled grid">
        <div class="row">
            <div class="sixteen wide mobile  sixteen wide column">
                <div class="form-logo">
                    <img src="/images/theme/default/logo2.png" alt="logo">
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</div>

<!-- content asection-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="/vendor/jquery/dist/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
<script type="text/javascript" src="/vendor/semantic/dist/semantic.js"></script>
@stack('scripts')
</body>
</html>
