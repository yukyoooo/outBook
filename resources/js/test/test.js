import assert from "assert";
import refactoring from "../refactoring";

describe("statement", function (){
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

    it("HTMLの出力結果が正しいかチェック", function (){
        const htmlRender =
`<div><h1>Statement for BigCo</h1>
<table>
<tbody><tr><th>play</th><th>seats</th><th>cost</th></tr>
  <tr><td>Hamlet</td><td>(55 seats)</td>
<td>$650.00</td></tr>  <tr><td>As You Like It</td><td>(35 seats)</td>
<td>$580.00</td></tr>  <tr><td>Othello</td><td>(40 seats)</td>
<td>$500.00</td></tr></tbody></table>
<p>Amount owed is <em>$1,730.00</em></p>
<p>you earned <em>47</em> credits</p>
</div>`

        assert.equal(document.getElementById('refactoring').innerHTML, htmlRender);
    });
})


