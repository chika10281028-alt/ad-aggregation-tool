<!DOCTYPE html>

<html lang="ja">

<head>
    <meta charaset="utf-8">
    <link rel="stylesheet" href="{{ asset('/style.css') }}">
    <title>広告データ更新画面</title>
</head>

<body>
    <form action="updateAddata" method="POST" id="form" name="addataUpdateForm" onsubmit="return check();">
        @method('PUT')
        @csrf

        <input type="hidden" name="id" value="{{ $addata->id }}" />
        <div class="">
            <div class="">
                <p>変更後媒体:</p>
                <select name='mediaId' value="{{ $addata->mediasId }}">
                    <option value=""></option>
                    @foreach ($medias as $media)
                    <option value='{{$media->id}}' <?php if ($addata->mediasId === $media->id) {
                                                        echo "selected";
                                                    } ?>>{{$media->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="">
                <p>変更後キャンペーン名:</p>
                <select name='campaignId' value="{{ $addata->campaignsId }}">
                    <option value=""></option>
                    @foreach ($campaigns as $campaign)
                    <option value='{{$campaign->id}}' <?php if ($addata->campaignsId === $campaign->id) {
                                                            echo "selected";
                                                        } ?>>{{$campaign->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="">
                <p>変更後有効無効フラグ:</p>
                <select name='activeFlg'>
                    <option value='1' <?php if ($addata->activeFlg) {
                                            echo "selected";
                                        } ?>>有効</option>
                    <option value='0' <?php if (!$addata->activeFlg) {
                                            echo "selected";
                                        } ?>>無効</option>
                </select>
            </div>
        </div>

        </div>
        <div class="condition">
            <input type="submit" name="update" value="更新">
        </div>
    </form>

    <script>
        function check() {
            if (addataUpdateForm.id.value == "" ||
                addataUpdateForm.mediaId.value == "" ||
                addataUpdateForm.campaignId.value == "" ||
                addataUpdateForm.activeFlg.value == "") {
                alert('全ての項目を入力してください。');
                return false;
            }
            return true;
        }
    </script>

</body>

</html>