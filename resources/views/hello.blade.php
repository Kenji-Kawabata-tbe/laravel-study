<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello world!</title>
</head>
<body>
    <h1 style="color: red">Hello world!</h1>
    {{-- 変数を{{}}で囲むとXSS対策になる --}}
    <p>ようこそ{{ $name }}さん</p>
    <p>本コースでは{{ $course }}を学んでいきます。</p>
</body>
</html>
