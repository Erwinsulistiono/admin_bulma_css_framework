<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/print.css" />
</head>

<body translate="no">
    <div id="document-print">
        <div id="bot">
            <div id="table">
                <table>
                    <thead id="thead"></thead>
                    <tr>
                        <?php foreach ($head[0] as $h) : ?>
                            <th><?= $h ?></th>
                        <?php endforeach ?>
                    </tr>
                    <tbody id="tbody"></tbody>
                    <?php foreach ($body as $b) : ?>
                        <tr>
                            <?php foreach ($head[1] as $val) : ?>
                                <td><?= $b[$val] ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <!-- ?php print_r($body) ?>
                ?php print_r($head[1]) ?> -->
            </div>
        </div>
    </div>
</body>

</html>