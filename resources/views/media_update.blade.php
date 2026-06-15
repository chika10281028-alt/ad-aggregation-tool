<!DOCTYPE html>

<html lang="ja">

<head>
    <meta charaset="utf-8">
    <link rel="stylesheet" href="{{ asset('/style.css') }}">
    <title>媒体更新画面</title>
</head>

<body>
    <form action="updateMedia" method="POST" id="form" name="updateForm" onsubmit="return check();">
        @method('PUT')
        @csrf

        <input type="hidden" name="id" value="{{ $media->id }}" />
        <div class="">
            <div class="">
                <p>変更後媒体名:</p>
                <input type="text" name="name" value="{{ $media->name }}">
            </div>
            <div class="">
                <p>変更後有効無効フラグ:</p>
                <select name='activeFlg'>
                    <option value='1' <?php if ($media->activeFlg) {
                                            echo "selected";
                                        } ?>>有効</option>
                    <option value='0' <?php if (!$media->activeFlg) {
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
            if (updateForm.id.value == "" ||
                updateForm.name.value == "" ||
                updateForm.activeFlg.value == "") {
                alert('全ての項目を入力してください。');
                return false;
            }
            return true;
        }
    </script>

</body>

</html>