<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="'utf-8">
        <!-- add mocha css, to show results -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mocha/3.2.0/mocha.css">
        <!-- add mocha framework code -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/mocha/3.2.0/mocha.js"></script>
        <script>
            mocha.setup('bdd'); // minimal setup
        </script>
        <!-- add chai -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chai/3.5.0/chai.js"></script>
        <script>
            // chai has a lot of stuff, let's make assert global
            let assert = chai.assert;
        </script>
        <title>トップ画面</title>
    </head>
    <body>
        <p>こんにちは！
    @if(Auth::check())
        {{ \Auth::user()->name }}さん</p>
    <p><a href="/logout">ログアウト</a></p>
    @else
        ゲストさん</p>
        <p><a href="/login">ログイン</a><br>
        <a href="/register">会員登録</a></p>
    @endif
        <div id = "refactoring"></div>
        <script type="text/javascript" src="/js/app.js"></script>


    {{-- test  http://localhost/home --}}
        <script src="/test.js"></script>

        <!-- the element with id="mocha" will contain test results -->
        <div id="mocha"></div>

        <!-- run tests! -->
        <script>
            mocha.run();
        </script>
    </body>
</html>
