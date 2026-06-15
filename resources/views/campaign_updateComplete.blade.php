<!DOCTYPE html>

<html lang="ja">

<head>
    <meta charaset="utf-8">
    <link rel="stylesheet" href="{{ asset('/style.css') }}">
    <title>更新完了</title>
</head>

<body>
    <p>更新が完了しました。</p>
    <button onClick="location.href='{{ route('campaign_register')}}' ">キャンペーン登録画面に戻る</button>
</body>

</html>