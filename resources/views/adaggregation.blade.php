<!DOCTYPE html>

<html lang="ja">

<head>
    <meta charaset="utf-8">
    <link rel="stylesheet" href="{{ asset('/style.css') }}">
    <title>管理画面</title>
</head>

<body>
    <form action="#" method="get" id="form">
        <div class="condition">
            <div class="condition condition-item">
                <p>期間</p>
                <div class="condition">
                    <input type="date" name="startDate" value="<?php if (!empty($_GET["startDate"])) {
                                                                    echo htmlspecialchars($_GET["startDate"], ENT_QUOTES);
                                                                } ?>">
                    <p>~</p>
                    <input type="date" name="endDate" value="<?php if (!empty($_GET["endDate"])) {
                                                                    echo htmlspecialchars($_GET["endDate"], ENT_QUOTES);
                                                                } ?>">
                </div>
            </div>

            <div class="condition condition-item">
                <p>媒体</p>
                <select name='media' value="<?php if (!empty($_GET["media"])) {
                                                echo htmlspecialchars($_GET["media"], ENT_QUOTES);
                                            } ?>">
                    <option value=""></option>
                    @foreach ($medias as $media)
                    <option value='{{$media->id}}' <?php if (isset($_GET["media"]) && $_GET["media"] == $media->id) {
                                                        echo "selected";
                                                    } ?>>{{$media->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="condition condition-item">
                <p>キャンペーン検索</p>
                <input type="text" name="keyword" value="<?php if (!empty($_GET["keyword"])) {
                                                                echo htmlspecialchars($_GET["keyword"], ENT_QUOTES);
                                                            } ?>">
            </div>

            <div class="condition condition-item">
                <input type="submit" name="search" value="検索">
            </div>

            <div class="condition condition-item">
                <input type="button" onclick="location.href='./media_register'" value="媒体登録">
            </div>
            <div class="condition condition-item">
                <input type="button" onclick="location.href='./campaign_register'" value="キャンペーン登録">
            </div>
            <div class="condition condition-item">
                <input type="button" onclick="location.href='./addata_register'" value="広告データ登録">
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
        </tr>
        @endforeach
    </table>
</body>

</html>