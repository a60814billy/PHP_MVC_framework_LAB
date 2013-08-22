<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Guestbook Demo</title>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <style>
            #newRecord{
                border: 1px solid #808080;
                padding: 0 10px 20px 10px;
                margin: 20px 20px;
            }
            .record{
                border: 1px solid #808080;
                width: 400px;
                min-height: 50px;
                height: auto;
                margin-bottom: 10px;
            }
            .record .name{
                font-size: 14px;
                font-family: [Arial];
                padding-left: 20px;
            }
            .record .content{
                margin-bottom: 10px;
                border-bottom: 1px solid #808080;
                display: block;
                padding-left: 10px;
            }
        </style>
    </head>
    <body>
        <div id="newRecord">
            <h1>New Record</h1>
            <form action="<?=$data['add']?>" method="post">
                <p>Name:<input type="text" name="name" /></p>
                <p>
                    Content:
                    <br />
                    <textarea name="content" cols="40" rows="4"></textarea>
                </p>
                <input type="submit" value="sumbit" />
            </form>
        </div>
        <div id="main">
            <?php foreach($data['records'] as $record):?>
            <div class="record">
                <span class="content"><?=nl2br($record['content'])?></span>
                <span class="name"><?=$record['name']?></span> at 
                <span class="date"><?=$record['datetime']?></span>
            </div>
            <?php endforeach?>
        </div>
    </body>
</html>