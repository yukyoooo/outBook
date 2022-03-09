describe("statement", function (){
    it("出力結果が正しいかチェック", function (){
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
        const expected = 'Statement for BigCo\n  Hamlet: $650.00 (55 seats)\n  As You Like It: $580.00 (35 seats)\n  Othello: $500.00 (40 seats)\nAmount owed is $1,730.00\nyou earned 47 credits\n';
        assert.equal(statement(invoices, plays), expected);
    })
})

