<?php
$total = null;
$result =  null;
$date = $_POST['date'];
$deposit_amount = (int)$_POST['deposit-amount'];
$deposit_period = (int)$_POST['deposit-period'];
$replenishment_deposit = (boolean)$_POST['replenishment-deposit'];
$deposit_replenishment_amount = (int)$_POST['deposit-replenishment-amount'];

$start_deposit = strtotime($date);

// Кол-во меясцев по вкладу
$deposit_period *= 31536000;
$deposit_period_months = floor($deposit_period / 2592000);

// Вычисление капитализации
function formula($days_mt, $total) {

    return floor($days_mt * 0.1 / 365 * $total);
}

// Вычисление капитализации + ежемесячный платеж
function formula_replenishment($days, $deposit_amount, $deposit_replenishment_amount) {

    return  floor(($days * 0.1 / 365 * $deposit_amount) + $deposit_replenishment_amount);

}

// Остаток дней в месяце
function rest_days($date) {
    $past_days  = (int) substr($date,0,2);
    $remaining_days = check_month_days($date);

    $rest_month = abs($remaining_days - $past_days);
    return  $rest_month;
}

// Кол-во дней в месяце
function check_month_days($date) {
    $m = (int) substr($date,3,2);
    $y = (int) substr($date,6,4);
    return (int) cal_days_in_month(CAL_GREGORIAN, $m, $y);
}

if ($replenishment_deposit == true) {

    $days = rest_days($date);
    $total = $deposit_amount + formula($days,$deposit_amount);
    $days = $date;

    while ($deposit_period_months != 0) {
        $deposit_period_months = $deposit_period_months -1;

        $days = strtotime('+1 MONTH', strtotime($days));
        $days = date("d-m-Y", $days);

        $days_mt = check_month_days($days);
        $total = $total + formula_replenishment($days_mt, $total, $deposit_replenishment_amount);

//        echo $total;
    }

} elseif ($replenishment_deposit == false) {

    $days = rest_days($date);
    $total = $deposit_amount + formula($days,$deposit_amount);

    $days = $date;
    $total = $deposit_amount;
    while ($deposit_period_months != 0) {

        $deposit_period_months = $deposit_period_months -1;

        $days = strtotime('+1 MONTH', strtotime($days));
        $days = date("d-m-Y", $days);

        $days_mt = check_month_days($days);
        $total = $total + formula($days_mt, $total);

//        echo $total;
    }
} else {
    echo "Где-то ошибка";
}

echo $total;




