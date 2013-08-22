<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <?=$data['test']?>
        <div><?=$data['message']?></div>
        <form action="" method="post">
            <input type="text" name="test" />
            <input type="submit" />
        </form>
        <a href="<?=$data['url']?>" >Hyperlink test</a>
        <a href="<?=$data['guestbook_url']?>">Guestbook sample</a>
    </body>
</html>
