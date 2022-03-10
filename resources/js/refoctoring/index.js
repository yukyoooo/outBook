import createStatementData from './createStatementData';

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
    return renderPlainText(createStatementData(invoice, plays));
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
