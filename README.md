Laravel socialiteでOauthログインする方法

流れ

①「login/github」
Githubの認証ページへリダイレクトする
②「Githubの認証ページ」
ユーザーが認証情報を入力する
認証ＯＫだったらリダイレクトする
リダイレクト先は設定情報による
（login/github/callback）
③「login/github/callback」
認証された情報のなかからユーザー名とメールアドレスを取得し、
データベースに保存。
認証ＯＫとしてリダイレクトする。

※Auth::routes()などの既存の機能はコメントアウトしておく