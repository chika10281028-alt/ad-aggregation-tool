<!DOCTYPE html>

<html lang="ja">

<head>
    <meta charaset="utf-8">
    <link rel="stylesheet" href="{{ asset('/style.css') }}">
    <title>広告データ登録画面</title>
</head>

<body>
    <form action="insertAddata" method="POST" id="form" name="addataRegisterForm" onsubmit="return check();">
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
                <p>媒体</p>
                <select name='mediaId' value="<?php if (!empty($_POST["mediaId"])) {
                                                    echo htmlspecialchars($_POST["media"], ENT_QUOTES);
                                                } ?>">
                    <option value=""></option>
                    @foreach ($medias as $media)
                    <option value='{{$media->id}}' <?php if (isset($_POST["mediaId"]) && $_POST["mediaId"] == $media->id) {
                                                        echo "selected";
                                                    } ?>>{{$media->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="condition condition-item">
                <p>キャンペーン名</p>
                <select name='campaignId' value="<?php if (!empty($_POST["campaignId"])) {
                                                        echo htmlspecialchars($_POST["campaignId"], ENT_QUOTES);
                                                    } ?>">
                    <option value=""></option>
                    @foreach ($campaigns as $campaign)
                    <option value='{{$campaign->id}}' <?php if (isset($_POST["campaignId"]) && $_POST["campaignId"] == $campaign->id) {
                                                            echo "selected";
                                                        } ?>>{{$campaign->name}}</option>
                    @endforeach
                </select>
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
                <th>@sortablelink('mediaName', '媒体名')</th>
                <th>@sortablelink('campaignName', 'キャンペーン名')</th>
                <th>@sortablelink('impression', 'インプレッション')</th>
                <th>@sortablelink('click', 'クリック')</th>
                <th>@sortablelink('cost', 'コスト')</th>
                <th>@sortablelink('cv', 'CV')</th>
                <th>@sortablelink('createdDate', '日時')</th>
                <th>@sortablelink('activeFlg', '有効無効フラグ')</th>
                <th></th>
            </tr>
        </thead>
        @foreach ($addatas as $addata)
        <tr>
            <td>{{$addata->id}}</td>
            <td>{{$addata->mediaName}}</td>
            <td>{{$addata->campaignName}}</td>
            <td align="right"><?php echo number_format($addata->impression); ?></td>
            <td align="right"><?php echo number_format($addata->click); ?></td>
            <td align="right"><?php echo number_format($addata->cost); ?></td>
            <td align="right"><?php echo number_format($addata->cv); ?></td>
            <td>{{$addata->createdDate}}</td>
            <td>
                <?php
                if ($addata->activeFlg) {
                    echo "有効";
                } else {
                    echo "無効";
                }
                ?></td>
            <td><button onClick="location.href='{{ route('addata_update',['id' => $addata->id]) }}' ">更新</button></td>
        </tr>
        @endforeach
    </table>

    <script>
        function check() {
            if (addataRegisterForm.id.value == "" ||
                addataRegisterForm.mediaId.value == "" ||
                addataRegisterForm.campaignId.value == "" ||
                addataRegisterForm.activeFlg.value == "") {
                alert('全ての項目を入力してください。');
                return false;
            }

            if (addataRegisterForm.id.value < 0 ||
                999 < addataRegisterForm.id.value
            ) {
                alert('IDは0以上999以下の値を入力してください。');
                return false;
            }
            return true;
        }
    </script>

</body>

</html>