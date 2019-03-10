<?php

$filename = "files/" . $_GET["f"] . ".txt";

if (!file_exists($filename)) {
    header("Location: /");
    die();
}

?>

<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/highlight.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlightjs-line-numbers.js/2.5.0/highlightjs-line-numbers.min.js"></script>
    <script>
        hljs.initHighlightingOnLoad();
        hljs.initLineNumbersOnLoad();
    </script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/atom-one-dark.min.css">

    <script>
        $("img").on("dragstart", function (e) {
            e.preventDefault();
        });
    </script>

    <?php
    echo "<title>Viewing " . $_GET["f"] . "</title>";
    ?>

    <style>

        ::selection {
            background: #8c434f;
        }

        ::-moz-selection {
            background: #8c434f;
        }

        /* for block of numbers */
        td.hljs-ln-numbers {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;

            text-align: center;
            vertical-align: top;
            padding-right: 5px;

            color: lightgray;
            /* your custom style here */
        }

        /* for block of code */
        td.hljs-ln-code {
            padding-left: 10px;
        }

        html {
            margin: 0px;
        }

        code {
            position: fixed;
            height: 100%;
            left: 0px;
            top: 0px;
            width: 100%;
            margin: 0px;
            font-size: 16px;
        }

        pre {
            top: 0px;
            left: 0px;
            padding: 0px;
            margin: 0px;
        }

        .icon {
            position: relative;
            float: right;
            margin-right: 5px;
            top: 5px;
            z-index: 9999;
            user-drag: none;
            user-select: none;
            -moz-user-select: none;
            -webkit-user-drag: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            cursor: pointer;
        }

        .icon img {
            width: 35px;
            height: 35px;
        }
    </style>
</head>

<body>
<a class="icon" href="/">
    <img src="https://image.flaticon.com/icons/svg/1151/1151035.svg">
</a>

<a class="icon" href="/?edit=<?php
echo $_GET['f'];
?>">
    <img src="https://image.flaticon.com/icons/svg/148/148926.svg" style="width:30px; height:30px">
</a>

<pre>
<?php

echo "<code>" . file_get_contents($filename) . "</code>";

?>
            
        </pre>
</body>

</html>