<?php

if (isset($_GET['edit'])) {
    if (file_exists("files/" . $_GET['edit'] . ".txt")) {
        $fileName = "files/" . $_GET['edit'] . ".txt";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <?php
    if (isset($fileName)) {
        echo '<title>Editing ' . $_GET['edit'] . '</title>';
    } else {
        echo '<title>New Paste</title>';
    }
    ?>

    <script>
        function save() {
            var name = "";
            var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            for (var i = 0; i < 15; i++) {
                name += possible.charAt(Math.floor(Math.random() * possible.length));
            }

            $("#file").val(name);

            $.ajax({
                url: 'save.php',
                type: 'post',
                data: $('#form').serialize(),
                success: function () {
                    window.open("view?f=" + name, "_self");
                }
            })
        }

        $(window).bind('keydown', function (event) {
            if (event.ctrlKey || event.metaKey) {
                switch (String.fromCharCode(event.which).toLowerCase()) {
                    case 's':
                        event.preventDefault();
                        save();
                        break;
                }
            }
        });
    </script>

    <style>
        ::selection {
            background: #8c434f;
        }

        ::-moz-selection {
            background: #8c434f;
        }

        body {
            margin: 0;
        }

        textarea {
            padding: 10px;
            resize: none;
            border: none !important;
            outline: none !important;
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0px;
            font-size: 16px !important;
            left: 0px;
            background-color: #282c34;
            color: #abb2bf;
            font-family: monospace !important;
        }

        .icon {
            position: relative;
            float: right;
            margin-right: 10px;
            top: 10px;
            z-index: 9999;
            cursor: pointer;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;

            -webkit-user-drag: none;
            user-drag: none;
        }

        .icon img {
            width: 30px;
            height: 30px;
            pointer-events: none;
        }
    </style>
</head>

<body>

<a class="icon" onclick="save();">
    <img src="https://image.flaticon.com/icons/svg/148/148730.svg">
</a>

<form action="save.php" method="post" id="form">
    <input type="hidden" name="file" value="" id="file">
    <textarea autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" id="text" name="data"><?php

        if (isset($fileName)) {
            echo file_get_contents($fileName);
        }

        ?></textarea>
</form>
</body>

</html>