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
                const statementData = {};
                statementData.customer = invoice.customer;
                statementData.performances = invoice.performances.map(enrichPerformance);
                statementData.totalAmount = totalAmount(statementData);
                statementData.totalVolumeCredits = totalVolumeCredits(statementData);
                return renderPlainText(statementData, plays);

                function enrichPerformance(aPerformance){
                    const result = Object.assign({}, aPerformance);
                    result.play = playFor(result);
                    result.amount = amountFor(result);
                    result.volumeCredits = volumeCreditsFor(result)
                    return result;
                }
                function playFor(aPerformance){
                    return plays[aPerformance.playID];
                }
                function amountFor(aPerformance){
                    let result = 0;
                    switch (aPerformance.play.type) {
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
                            throw new Error(`unknown type: ${aPerformance.play.type}`);
                    }
                    return result;
                }
                function volumeCreditsFor(aPerformance){
                    let result = 0;
                    result += Math.max(aPerformance.audience - 30, 0);
                    if("comedy" === aPerformance.play.type) result += Math.floor(aPerformance.audience / 5);
                    return result;
                }
                function totalAmount(data){
                    let result = 0;
                    for(let perf of data.performances){
                        result += perf.amount;
                    }
                    return result;
                }
                function totalVolumeCredits(data) {
                    let result = 0;
                    for(let perf of data.performances){
                        result += perf.volumeCredits;
                    }
                    return result;
                }
            }

            function renderPlainText(data, plays){
                let result = `Statement for ${data.customer}\n`;
                for (let perf of data.performances) {
                    result += `  ${perf.play.name}: ${usd(perf.amount)} (${perf.audience} seats)\n`;
                }
                result += `Amount owed is ${usd(data.totalAmount)}\n`;
                result += `you earned ${data.totalVolumeCredits} credits\n`;
                return result;

                function usd(aNumber){
                    return new Intl.NumberFormat("en-US",
                        { style: "currency", currency: "USD",
                            minimumFractionDigits: 2 }).format(aNumber/100);
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
