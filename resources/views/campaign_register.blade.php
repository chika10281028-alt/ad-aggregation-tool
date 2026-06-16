<!DOCTYPE html>

<html lang="ja">

<head>
    <meta charaset="utf-8">
    <link rel="stylesheet" href="{{ asset('/style.css') }}">
    <title>キャンペーン登録画面</title>
</head>

<body>
    <form action="insertCampaign" method="POST" id="form" name="campaignRegisterForm" onsubmit="return check();">
        @csrf

        @if (!empty($errors))
        <div class="alert alert-danger">
            <p style="color: red;">{{ $errors->first('id') }}</p>
        </div>

        @endif
        <div class="condition">
            <div class="condition condition-item">
                <p>ID
                </p>
                <input type="number" name="id" min="0" max="999" value="<?php if (!empty($_POST["id"])) {
                                                                            echo htmlspecialchars($_POST["id"], ENT_QUOTES);
                                                                        } ?>">
            </div>
            <div class="condition condition-item">
                <p>媒体名
                </p>
                <input type="text" name="name" value="<?php if (!empty($_POST["name"])) {
                                                            echo htmlspecialchars($_POST["name"], ENT_QUOTES);
                                                        } ?>">
            </div>
            <div class="condition condition-item">
                <p>有効無効フラグ
                    <select name='activeFlg' value="<?php if (!empty($_POST["activeFlg"])) {
                                                        echo htmlspecialchars($_POST["activeFlg"], ENT_QUOTES);
                                                    } ?>">
                        <option value="1">有効</option>
                        <option value='0'>無効</option>
                    </select>
                </p>
            </div>

            <div class="condition condition-item">
                <input type="submit" name="insert" value="登録">
            </div>

            <div class="condition condition-item">
                <input type="button" onclick="location.href='./'" value="一覧へ戻る">
            </div>
        </div>

    </form>

    <table id="addatas-table" border="1" width="1000">
        <thead>
            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('name', 'キャンペーン名')</th>
                <th>@sortablelink('activeFlg', '有効無効フラグ')</th>
                <th></th>
            </tr>
        </thead>
        @foreach ($campaigns as $campaign)
        <tr>
            <td>{{$campaign->id}}</td>
            <td>{{$campaign->name}}</td>
            <td>
                <?php
                if ($campaign->activeFlg) {
                    echo "有効";
                } else {
                    echo "無効";
                }
                ?></td>
            <td><button onClick="location.href='{{ route('campaign_update',['id' => $campaign->id]) }}' ">更新</button></td>
        </tr>
        @endforeach
    </table>

    <script>
        function check() {
            if (campaignRegisterForm.id.value == "" ||
                campaignRegisterForm.name.value == "" ||
                campaignRegisterForm.activeFlg.value == "") {
                alert('全ての項目を入力してください。');
                return false;
            }

            if (campaignRegisterForm.id.value < 0 ||
                999 < campaignRegisterForm.id.value
            ) {
                alert('IDは0以上999以下の値を入力してください。');
                return false;
            }
            return true;
        }
    </script>

</body>

</html>