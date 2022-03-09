const plays = {
    'hamlet' : {'name': 'Hamlet', 'type': 'tragedy'},
    'as-like' : {'name': 'As You Like It', 'type': 'comedy'},
    'othello' : {'name': 'Othello', 'type': 'tragedy'},
};

const invoices =
    {
        'costomer': 'BigCo',
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
    let totalAmount = 0;
    let volumeCredits = 0;
    let result = `Statement for ${invoice.costomer}\n`;

    const format = new Intl.NumberFormat("en-US",
        { style: "currency", currency: "USD",
            minimumFractionDigits: 2 }).format;


    for (let perf of invoice.performances) {
        const play = plays[perf.playID];
        let thisAmount = 0;

        switch (play.type) {
            case "tragedy":
                thisAmount = 40000;
                if (perf.audience > 30) {
                    thisAmount += 1000 * (perf.audience - 30);
                }
                break;
            case "comedy":
                thisAmount = 30000;
                if (perf.audience > 20) {
                    thisAmount += 10000 + 500 * (perf.audience - 20);
                }
                thisAmount += 300 * perf.audience;
                break;
            default:
                throw new Error(`unknown type: ${play.type}`);
        }

        //ボリューム特典のポイントを加算
        volumeCredits += Math.max(perf.audience - 30, 0);
        //喜劇のときは10人につき、さらにポイントを加算
        if ("comedy" === play.type) volumeCredits += Math.floor(perf.audience / 5);
        //注文の内訳を出力
        result += `  ${play.name}: ${format(thisAmount / 100)} (${perf.audience} seats)\n`;
        totalAmount += thisAmount;
    }
    result += `Amount owed is ${format(totalAmount/100)}\n`;
    result += `you earned ${volumeCredits} credits\n`;
    return result;
}


let nameP = document.createElement("p");
nameP.innerHTML = statement(invoices, plays);
document.getElementById('refactoring').append(nameP);
console.log(statement(invoices, plays));
