# PHP_reCAPTCHAv2  

<br><br>
## 概要
reCAPTCHAを導入する際に、「動かすだけならこれコピーすりゃいいんだよ」的なヤツが欲しかったので作りました 
`verify_captcha();`関数にシークレットをぶち込めば`true`か`false`で結果を返してくれます。
<br><br><br>
## 内容
 - captcha.php  
 今回のプログラムの本体。判定のための関数が入ってます。
 - index.html  
 reCAPTCHAの設置例です。一番シンプルな形。~ってかGoogleのサンプルコードのまんま~
  - sample.php  
実際に判定してみるプログラムです。  

<br><br>
## 使い方
※ここでは、reCAPTCHAのシークレットキーとサイトキーは取得している前提で話を進めます。
<br><br>
 - captcha.phpをサーバーにコピー。  
 
 - index.htmlを参考にWEBサイトにreCAPTCHAを設置します。  
 基本的には`<script src='https://www.google.com/recaptcha/api.js'></script>`をヘッダに記述して、  
 `<form>`の中に`<div class="g-recaptcha" data-sitekey="site key"></div>`と書けばいいです  
 尚、本プログラムはPOSTメソッドにのみ対応しますので、method属性は`POST`にしましょう  
 
 - POSTで投げつけられた先のphpを準備します。  
 `require_once("./captcha.php");`<br>
 `$data = verify_captcha("ここにシークレットキー");`  
 まで書けばあとは`$data`の中身を見るだけです。  
 この処理は文頭に書いて、認証失敗時は`exit();`しましょう
