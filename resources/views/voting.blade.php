<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="/../LAFF/public/js/voting.js"></script>

</head>
<body>

    <button onclick="getDownvoted(3)">Fetch data</button>

    <script type="text/javascript">
        var upvoted = [];
        var downvoted = [];

        console.log(downvoted);
    </script>
</body>