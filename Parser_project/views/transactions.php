<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transactions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table tr th, table tr, td {
            padding: 5px;
            border: 1px;
        }

        tfoot tr th, tfoot tr td {
            font-size: 20px;
        }

        tfoot tr th {
            text-align: right;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Check #</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <!--CODE -->
            <?php
            $search = array("$", ",");
            $total_gain = 0;
            $total_lose = 0;

            function engFmt($number){

            }
            ?>
            <?php foreach($transactions as $line): ?>
                <tr>
                    <td><?= $line[0]?></td>
                    <td><?= $line[1] ?></td>
                    <td><?= $line[2] ?></td>
                    <td><?= $line[3] ?></td>
                </tr>
            <?php
            //  REMOVE $ AND CONVERT TO INT
                $strAmount = $line[3];
                $str_money_color = $line[3];


                $strAmount = str_replace($search, '', $strAmount);
                $intAmount = (double)$strAmount;

                if($intAmount >= 0){
                    $total_gain += $intAmount;
                }elseif($intAmount < 0){
                    $total_lose += $intAmount;
                }
                ?>
            <?php endforeach; ?>

        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Income:</th>
                <td><?= money_fmt($total_gain); ?></td>
            </tr>
            <tr>
                <th colspan="3">Total Expense:</th>
                <td><?= money_fmt($total_lose); ?></td>
            </tr>
            <tr>
                <th colspan="3">Net Total:</th>
                <td>
                    <?php
                        $net_total = $total_gain + $total_lose;
                        echo $net_total;
                    ?>
                </td>
            </tr>
        </tfoot>
    </table>

</body>
</html>