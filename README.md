# 読書アウトプット会用のアプリ

# 環境構築
`sail up -d`
`sail down`
http://localhost/


curl -X POST -H "Content-Type: application/json" -d '{"name":"test222"}' localhost/api/customers
curl -X GET -H "Content-Type: application/json"  localhost/api/customers/43
curl -X PUT -H "Content-Type: application/json" -d '{"name":"test222"}' localhost/api/customers/43


sail artisan test
## todo_list
### customer
- api/customersにGETメソッドでアクセスできる
    - api/customersにGETメソッドでアクセスするとJSONが返却される
    - api/customersにGETメソッドで取得できる顧客情報のJSON形式は要件通りである
    - api/customersにGETメソッドで返却される顧客情報は２件である
- api/customersにPOSTメソッドでアクセスできる
    - api/customersに顧客名をPOSTするとcustomersテーブルにデータが追加される
    - api/customersにnameが含まれない場合422UnprocessableEntityが返却される
    - api/customersにnameが空の場合422UnprocessableEntityが返却される
- api/customers/{customer_id}にGETメソッドでアクセスできる
    - api/customers/{customer_id}にGETメソッドでアクセスするとJSONが返却される
    - api/customers/{customer_id}メソッドで取得できる顧客情報のJSON形式は要件通りである
- api/customers/{customer_id}にPUTメソッドでアクセスできる
    - api/customers/{customer_id}にPUTメソッドでアクセスするとJSONが返却される
    - api/customers/{customer_id}にPUTメソッドでアクセスするとcustomerテーブルのデータが変更される
    - api_customers_customer_idに存在しないcustomer_idでPUTメソッドでアクセスすると404が返却される
    - api/customers/{customer_id}にPUTメソッドでnameが含まれない場合は422が返却される
    - api/customers/{customer_id}にPUTメソッドでnameが空の場合は422が返却される
- api/customers/{customer_id}にDELETEメソッドでアクセスできる
    - api_customers_customer_idにDELETEメソッドでサクセスするとJSONが返却される     

### report
- api/reportsにGETメソッドでアクセスできる
- api/reportsにPOSTメソッドでアクセスできる
- api/reports/{report_id}にGETメソッドでアクセスできる
- api/reports/{report_id}にPUTメソッドでアクセスできる
- api/reports/{report_id}にDELETEメソッドでアクセスできる

## testとは
### 何らかの処理が「実行」されたとき
### 結果が期待通りのものであるかどうかを「検証」する
- 最初に検証部分から記述
    - api/customersにGETメソッドでアクセスできる
        - [実行]api/reportsにGETメソッドでアクセスする
        - [検証]ステータスコード200のHTTPレスポンスが返ってくる

test用のDB作成 権限不足でDBつくれない
