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
        <h1>TEST</h1>
        <div id="bot">
            <div id="table">
                <table>
                    <thead id="thead"></thead>
                    <tr>
                        <?php var_dump($head)  ?>
                        <!-- <th>?= $h ?></th> -->
                        <!-- ?php endforeach ?> -->
                        <!-- <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th> -->
                    </tr>
                    <tbody id="tbody"></tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>