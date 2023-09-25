# Rese
飲食店の予約サービスアプリです。
<img width="1437" alt="shop_all" src="https://github.com/matsudayuki8140/rese_0828/assets/129087994/32292ce6-7b54-48a2-972a-a0f4c54817a9">

## 作成した目的
外部の飲食店予約サービスは手数料を取られるので自社で予約サービスを持つため。
## 機能一覧
### 一般ユーザー
#### 飲食店一覧表示
登録されているすべての飲食店を一覧表示します。
#### 飲食店検索
検索フォームから地域、ジャンル、店名で検索することができます。
<img width="1437" alt="shop_all" src="https://github.com/matsudayuki8140/rese_0828/assets/129087994/d2dcef47-9207-48ff-a248-20e50d143f53"> 

#### 飲食店詳細表示
店舗の詳細情報と予約フォームを表示します。予約フォームはログインすると使用できます。
<img width="1437" alt="shop_detail" src="https://github.com/matsudayuki8140/rese_0828/assets/129087994/4f4992d2-c6b9-496e-995a-17cfbef29fca">

#### 会員登録、メール認証
会員登録後、入力したメールアドレスに認証メールが送信されます。メールに記載されたリンクにアクセスすることで会員登録を完了します。
<img width="1437" alt="register" src="https://github.com/matsudayuki8140/rese_0828/assets/129087994/69b70bf4-6b83-4899-9bf4-964278c4bfbb">

#### ログイン、ログアウト
ログインには会員登録が必要です。入力する情報は名前、メールアドレス、パスワードの３つです。<br>
会員登録を完了するにはメールアドレスの認証が必要です。登録したメールアドレスに認証メールが送信されるので、記載されたリンクをクリックすることで会員登録を完了することができます。<br>
<img width="1393" alt="menu2" src="https://github.com/matsudayuki8140/rese_0828/assets/129087994/7c61db4a-9988-4c41-b566-4da01c0229de">
<img width="1392" alt="menu1" src="https://github.com/matsudayuki8140/rese_0828/assets/129087994/a102eade-c2bf-4830-b9a8-16e456ad8af4">

#### 飲食店お気に入り追加、削除
ログインすると機能を使用できます。店舗一覧のハートマークをクリックすることで、店舗をお気に入りに登録したり削除したりすることができます。
#### 飲食店予約情報追加、変更、削除
店舗詳細ページの予約フォームから予約情報を登録することができます。登録した予約情報は後述のマイページに表示され、そこから予約情報の変更、削除を行うことができます。
#### 飲食店評価機能
店舗詳細ページの「評価する」ボタンからアクセスできます。評価は★１～５の五段階評価と、コメントを入力することができます。
#### マイページ表示
ユーザーの予約情報と、お気に入り登録した店舗を一覧表示します。予約情報については、前日以前の予約情報は表示されません。
<img width="1437" alt="my_page" src="https://github.com/matsudayuki8140/rese_0828/assets/129087994/debf72a7-af8c-4a0d-ba92-9180908f08ca">

#### 予約リマインダー機能
飲食店の予約情報が登録されていると、予約当日の朝８時ころにメールが送信されます。
### 管理者
#### 店舗代表者用アカウント作成
店舗代表者用のアカウントを作成します。入力したメールアドレスに認証メールが送信されます。
### 店舗代表者
#### 店舗代表者用マイページ表示
メニューから店舗代表者用マイページにアクセスできます。
#### 店舗情報作成、編集
店名、地域、ジャンル、説明、画像の５つのデータを入力できます。全て必須項目です。
#### 予約情報一覧表示
自店舗の予約情報を日付ごとに一覧表示します。
#### 評価一覧表示
自店舗の評価情報を一覧表示します。
#### お知らせメール作成
メールの見出しと本文を入力して送信ボタンを押すことで、アプリのユーザー全員にお知らせメールを送信します。
## 実行環境
HTML5<br>
CSS3<br>
PHP 7.4.9<br>
Laravel Framework 8.83.27　<br>
Laravel breeze<br>
mysql 15.1<br>
Mailhog<br>
## テーブル設計
users table
<table>
    <tr>
        <th>カラム名</th>
        <th>型</th>
        <th>PRIMARY KEY</th>
        <th>UNIQUE KEY</th>
        <th>NOT NULL</th>
        <th>FOREIGN KEY</th>
    </tr>
    <tr>
        <td>id</td>
        <td>unsigned bigint</td>
        <td>〇</td>
        <td></td>
        <td>〇</td>
        <td></td>
    </tr>
    <tr>
        <td>name</td>
        <td>string</td>
        <td></td>
        <td></td>
        <td>〇</td>
        <td></td>
    </tr>
    <tr>
        <td>email</td>
        <td>string</td>
        <td></td>
        <td>〇</td>
        <td>〇</td>
        <td></td>
    </tr>
    <tr>
        <td>email_verified_at</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>password</td>
        <td>string</td>
        <td></td>
        <td></td>
        <td>〇</td>
        <td></td>
    </tr>
    <tr>
        <td>created_at</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>updated_at</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
roles table
<table>
    <tr>
        <th>カラム名</th>
        <th>型</th>
        <th>PRIMARY KEY</th>
        <th>UNIQUE KEY</th>
        <th>NOT NULL</th>
        <th>FOREIGN KEY</th>
    </tr>
    <tr>
        <td>id</td>
        <td>unsigned bigint</td>
        <td>〇</td>
        <td></td>
        <td>〇</td>
        <td></td>
    </tr>
    <tr>
        <td>user_id</td>
        <td>unsigned bigint</td>
        <td></td>
        <td></td>
        <td>〇</td>
        <td>users(id)</td>
    </tr>
    <tr>
        <td>role</td>
        <td>integer</td>
        <td></td>
        <td></td>
        <td>〇</td>
        <td></td>
    </tr>
    <tr>
        <td>created_at</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>updated_at</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
shops table
<table>
    <tr>
        <th>カラム名</th>
        <th>型</th>
        <th>PRIMARY KEY</th>
        <th>UNIQUE KEY</th>
        <th>NOT NULL</th>
        <th>FOREIGN KEY</th>
    </tr>
    <tr>
        <td>id</td>
        <td>unsigned bigint</td>
        <td>〇</td>
        <td></td>
        <td>〇</td>
        <td></td>
    </tr>
    <tr>
        <td>name</td>
        <td>string</td>
        <td></td>
        <td>〇</td>
        <td>〇</td>
        <td></td>
    </tr>
    <tr>
        <td>area</td>
        <td>string</td>
        <td></td>
        <td></td>
        <td>〇</td>
        <td></td>
    </tr>
    <tr>
        <td>genre</td>
        <td>string</td>
        <td></td>
        <td></td>
        <td>〇</td>
        <td></td>
    </tr>
    <tr>
        <td>description</td>
        <td>text</td>
        <td></td>
        <td></td>
        <td>〇</td>
        <td></td>
    </tr>
    <tr>
        <td>imageURL</td>
        <td>text</td>
        <td></td>
        <td></td>
        <td>〇</td>
        <td></td>
    </tr>
    <tr>
        <td>created_at</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>updated_at</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
representatives table
<table>
    <tr>
        <th>カラム名</th>
        <th>型</th>
        <th>PRIMARY KEY</th>
        <th>UNIQUE KEY</th>
        <th>NOT NULL</th>
        <th>FOREIGN KEY</th>
    </tr>
    <tr>
        <td>id</td>
        <td>unsigned bigint</td>
        <td>〇</td>
        <td></td>
        <td>〇</td>
        <td></td>
    </tr>
    <tr>
        <td>user_id</td>
        <td>unsigned bigint</td>
        <td></td>
        <td></td>
        <td>〇</td>
        <td>users(id)</td>
    </tr>
    <tr>
        <td>shop_id</td>
        <td>unsigned bigint</td>
        <td></td>
        <td>〇</td>
        <td>〇</td>
        <td>shops(id)</td>
    </tr>
    <tr>
        <td>created_at</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>updated_at</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
reservations table
<table>
    <tr>
        <th>カラム名</th>
        <th>型</th>
        <th>PRIMARY KEY</th>
        <th>UNIQUE KEY</th>
        <th>NOT NULL</th>
        <th>FOREIGN KEY</th>
    </tr>
    <tr>
        <td>id</td>
        <td>unsigned bigint</td>
        <td>〇</td>
        <td></td>
        <td>〇</td>
        <td></td>
    </tr>
    <tr>
        <td>user_id</td>
        <td>unsigned bigint</td>
        <td></td>
        <td></td>
        <td>〇</td>
        <td>users(id)</td>
    </tr>
    <tr>
        <td>shop_id</td>
        <td>unsigned bigint</td>
        <td></td>
        <td></td>
        <td>〇</td>
        <td>shops(id)</td>
    </tr>
    <tr>
        <td>date</td>
        <td>date</td>
        <td></td>
        <td></td>
        <td>〇</td>
        <td></td>
    </tr>
    <tr>
        <td>time</td>
        <td>time</td>
        <td></td>
        <td></td>
        <td>〇</td>
        <td></td>
    </tr>
    <tr>
        <td>number</td>
        <td>integer</td>
        <td></td>
        <td></td>
        <td>〇</td>
        <td></td>
    </tr>
    <tr>
        <td>created_at</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>updated_at</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
favorites table
<table>
    <tr>
        <th>カラム名</th>
        <th>型</th>
        <th>PRIMARY KEY</th>
        <th>UNIQUE KEY</th>
        <th>NOT NULL</th>
        <th>FOREIGN KEY</th>
    </tr>
    <tr>
        <td>id</td>
        <td>unsigned bigint</td>
        <td>〇</td>
        <td></td>
        <td>〇</td>
        <td></td>
    </tr>
    <tr>
        <td>user_id</td>
        <td>unsigned bigint</td>
        <td></td>
        <td></td>
        <td>〇</td>
        <td>users(id)</td>
    </tr>
    <tr>
        <td>shop_id</td>
        <td>unsigned bigint</td>
        <td></td>
        <td></td>
        <td>〇</td>
        <td>shops(id)</td>
    </tr>
    <tr>
        <td>created_at</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>updated_at</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
ratings table
<table>
    <tr>
        <th>カラム名</th>
        <th>型</th>
        <th>PRIMARY KEY</th>
        <th>UNIQUE KEY</th>
        <th>NOT NULL</th>
        <th>FOREIGN KEY</th>
    </tr>
    <tr>
        <td>id</td>
        <td>unsigned bigint</td>
        <td>〇</td>
        <td></td>
        <td>〇</td>
        <td></td>
    </tr>
    <tr>
        <td>user_id</td>
        <td>unsigned bigint</td>
        <td></td>
        <td></td>
        <td>〇</td>
        <td>users(id)</td>
    </tr>
    <tr>
        <td>shop_id</td>
        <td>unsigned bigint</td>
        <td></td>
        <td></td>
        <td>〇</td>
        <td>shops(id)</td>
    </tr>
    <tr>
        <td>rating</td>
        <td>integer</td>
        <td></td>
        <td></td>
        <td>〇</td>
        <td></td>
    </tr>
    <tr>
        <td>comment</td>
        <td>text</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>created_at</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>updated_at</td>
        <td>timestamp</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
## ER図
![rese drawio](https://github.com/matsudayuki8140/rese_0828/assets/129087994/f9864802-9ce9-4f0a-8cfe-a204f3ce72e4)

## 環境構築
## テストアカウント
