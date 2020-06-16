<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gulp</title>
    <link rel="stylesheet" href="build/css/main.min.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="./jq/datepicker-ru.js"></script>
    <script src="./build/js/all.js"></script>
</head>
<body id="main-block">
    <header class="header">
        <div class="container header__container">
            <img class="header__logo" src="./img/logo.png" alt="Логотип">
            <div class="header__phone">
                <span class="number">8-800-100-5005</span>
                <span class="number">+7 (3452) 522-000</span>
            </div>
            <nav class="header__nav nav">
                <ul class="nav__list">
                    <li class="nav__item nav__item_top"><a href="/" class="">Кредитные карты</a></li>
                    <li class="nav__item nav__item_top"><a href="/" class="">Вклады</a></li>
                    <li class="nav__item nav__item_top"><a href="/" class="">Дебетовая карта</a></li>
                    <li class="nav__item nav__item_top"><a href="/" class="">Страхование</a></li>
                    <li class="nav__item nav__item_top"><a href="/" class="">Друзья</a></li>
                    <li class="nav__item nav__item_top"><a href="/" class="">Интернет-Банк</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="main">
        <div class="container main__container">
            <div class="breadcrumbs">
                <a class="breadcrumbs__item">Главная</a>
                <a class="breadcrumbs__item">Вклады</a>
                <a class="breadcrumbs__item">Калькулятор</a>
            </div>
            <div class="calculator">
                <h3>Калькулятор</h3>
                <form type="button" method="post" id="form" action="./calc.php" class="calculator-form">
                    <div class="calculator-form_side_left">
                        <label  class="calculator-form__label">
                            Дата оформления вклада
                            <input id="datepicker" type="text" size="10" class="calculator-form__input" name="date">
                        </label>
                        <label class="calculator-form__label">
                            Сумма вклада
                            <input id="deposit-amount-field" type="number" class="calculator-form__input" name="deposit-amount">
                        </label>
                        <label class="calculator-form__label">
                            Срок вклада
                            <select class="calculator-form__input" name = "deposit-period">
                                <option value = "1" selected >1 год</option>
                                <option value = "2">2 год</option>
                                <option value = "3">3 год</option>
                                <option value = "4">4 год</option>
                                <option value = "5">5 год</option>
                            </select>
                        </label>
                        <div class="calculator-form__label">
                            <span>Пополнение вклада</span>
                            <label>
                                <input type="radio" name="replenishment-deposit" value="1" checked>
                                Да
                            </label>
                            <label>
                                <input type="radio" name="replenishment-deposit" value="0">
                                Нет
                            </label>
                        </div>
                        <label class="calculator-form__label">
                            Сумма пополнения вклада
                            <input id="deposit-replenishment-amount" type="number" name="deposit-replenishment-amount" class="calculator-form__input">
                        </label>
                    </div>
                    <div class="calculator-form_side_right">
                        <input id="deposit-amount-range" class="calculator-form__amount-range calculator-form__range" type="range" min="1000" max="3000000" value="1000" step="1000">
                        <input id="deposit-replenishment-range" class="calculator-form__replenishment-range calculator-form__range" type="range" min="1000" max="3000000" value="1000" step="1000">
                    </div>
                    <input type="submit" value="Рассчитать" class="calculator-form__button">
                    <div class="calculator-form__result">
                        Результат:
                        <div id="result"></div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="container footer-container">
            <ul class="nav__list">
                <li class="nav__item nav__item_bottom"><a href="/" class="">Кредитные карты</a></li>
                <li class="nav__item nav__item_bottom"><a href="/" class="">Вклады</a></li>
                <li class="nav__item nav__item_bottom"><a href="/" class="">Дебетовая карта</a></li>
                <li class="nav__item nav__item_bottom"><a href="/" class="">Страхование</a></li>
                <li class="nav__item nav__item_bottom"><a href="/" class="">Друзья</a></li>
                <li class="nav__item nav__item_bottom"><a href="/" class="">Интернет-Банк</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>