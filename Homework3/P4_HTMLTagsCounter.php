<!DOCTYPE html>
<html>
    <head>
        <title>Tags Counter</title>
        <style type="text/css">
            .info {
                font-size: 30px;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <form method="post">
            <label for="tags">Enter HTML tags:</label><br/><br/>
            <input type="text" id="tags" name="tags"/>
            <input type="submit" name="submit"/><br/>
        </form>
        <?php
            session_start();
            $tags = array("a", "abbr", "address", "area", "article", "aside", "audio", "b", "base", "bdi", "bdo", "blockquote", "body", "br", "button", "canvas", "caption",
                "cite", "code", "col", "colgroup", "command", "datalist", "dd", "del", "details", "dfn", "div", "dl", "dt", "em", "embed", "fieldset", "figcaption", "figure",
                "footer", "form", "h1", "h2", "h3", "h4", "h5", "h6", "head", "header", "hgroup", "hr", "html", "i", "iframe", "img", "input", "ins", "kbd", "keygen", "label",
                "legend", "li", "link", "map", "mark", "menu", "meta", "meter", "nav", "noscript", "object", "ol", "optgroup", "option", "output", "p", "param", "pre", "progress",
                "q", "rp", "rt", "ruby", "s", "samp", "script", "section", "select", "small", "source", "span", "strong", "style", "sub", "summary", "sup", "table", "tbody", "td",
                "textarea", "tfoot", "th", "thead", "time", "title", "tr", "track", "u", "ul", "var", "video", "wbr");
            if (!isset($_SESSION["score"]) || !isset($_SESSION["tagsLeft"])) {
                $_SESSION["score"] = 0;
                $_SESSION["tagsLeft"] = $tags;
            }

            if ($_POST && isset($_POST["submit"])) {
                $tag = mb_strtolower(trim($_POST["tags"]));
                if (array_search($tag, $tags) === false) {
                    echo "<div class=\"info\">Invalid HTML tag!</div>";
                } else {
                    echo "<div class=\"info\">Valid HTML tag!</div>";
                    if (array_search($tag, $_SESSION["tagsLeft"]) !== false) {
                        $_SESSION["score"]++;
                        $key = array_search($tag, $tags);
                        unset($_SESSION["tagsLeft"][$key]);
                    }
                }
            }

            echo "<div class=\"info\">Score: " . $_SESSION["score"] . "</div>";
            if ($_SESSION["score"] == count($tags)) {
                echo "<div class=\"info\">You got all tags!</div>";
            }
        ?>
    </body>
</html>