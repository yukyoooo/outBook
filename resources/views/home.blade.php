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
        <p id = "refactoring"></p>
        <script type="text/javascript" src="/js/app.js"></script>




    {{-- test  http://localhost/home --}}
        <script>
            const plays = {
                'hamlet' : {'name': 'Hamlet', 'type': 'tragedy'},
                'as-like' : {'name': 'As You Like It', 'type': 'comedy'},
                'othello' : {'name': 'Othello', 'type': 'tragedy'},
            };

            const invoices =
                {
                    'customer': 'BigCo',
                    'performances': [
                        {
                            'playID': 'hamlet',
                            'audience': 55,
                        },
                        {
                            'playID': 'as-like',
                            'audience': 35,
                        },
                        {
                            'playID': 'othello',
                            'audience': 40
                        }
                    ]
                };

            function statement (invoice, plays){
                return renderPlainText(invoice, plays);
            }

            function renderPlainText(invoice, plays){
                let result = `Statement for ${invoice.costomer}\n`;
                for (let perf of invoice.performances) {
                    result += `  ${playFor(perf).name}: ${usd(amountFor(perf))} (${perf.audience} seats)\n`;
                }
                result += `Amount owed is ${usd(totalAmount())}\n`;
                result += `you earned ${totalVolumeCredits()} credits\n`;
                return result;

                function totalAmount(){
                    let result = 0;
                    for(let perf of invoice.performances){
                        result += amountFor(perf);
                    }
                    return result;
                }
                function totalVolumeCredits() {
                    let result = 0;
                    for(let perf of invoice.performances){
                        result += volumeCreditsFor(perf);
                    }
                    return result;
                }
                function volumeCreditsFor(aPerformance){
                    let result = 0;
                    result += Math.max(aPerformance.audience - 30, 0);
                    if("comedy" === playFor(aPerformance).type) result += Math.floor(aPerformance.audience / 5);
                    return result;
                }
                function usd(aNumber){
                    return new Intl.NumberFormat("en-US",
                        { style: "currency", currency: "USD",
                            minimumFractionDigits: 2 }).format(aNumber/100);
                }
                function playFor(aPerformance){
                    return plays[aPerformance.playID];
                }
                function amountFor(aPerformance){
                    let result = 0;
                    switch (playFor(aPerformance).type) {
                        case "tragedy":
                            result = 40000;
                            if (aPerformance.audience > 30) {
                                result += 1000 * (aPerformance.audience - 30);
                            }
                            break;
                        case "comedy":
                            result = 30000;
                            if (aPerformance.audience > 20) {
                                result += 10000 + 500 * (aPerformance.audience - 20);
                            }
                            result += 300 * aPerformance.audience;
                            break;
                        default:
                            throw new Error(`unknown type: ${playFor(aPerformance).type}`);
                    }
                    return result;
                }
            }




            let nameP = document.createElement("p");
            nameP.innerHTML = statement(invoices, plays);
            document.getElementById('refactoring').append(nameP);
            console.log(statement(invoices, plays));
        </script>
        <script src="/test.js"></script>

        <!-- the element with id="mocha" will contain test results -->
        <div id="mocha"></div>

        <!-- run tests! -->
        <script>
            mocha.run();
        </script>
    </body>
</html>
