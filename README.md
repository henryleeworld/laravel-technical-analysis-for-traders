# Laravel 10 交易者技術分析

引入 lupecode 的 php-trader-interface 套件來擴增交易者技術分析，技術分析投資者透過使用這些指標工具，讓投資分析更有依據。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/trader/ad/` 來進行累積／派發線（ADL）取得，或可以經由 `/trader/rsi/` 來進行相對強弱指標（RSI）取得。
> 注意：必須安裝並啟用 PECL PHP 交易者擴充套件。

----

## 畫面截圖
![](https://i.imgur.com/RJi31eA.png)
> 透過嘗試確定交易者實際上是在累積（買進）還是在派發（賣出）來實現這一目標

![](https://i.imgur.com/Ci4a1Yi.png)
> 用來測量方向價格移動的快慢（速度）和變化（幅度）