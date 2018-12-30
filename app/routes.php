<?php

Rota::get('')->controller('index')->method('index');

Rota::get('produtos')->controller('index')->method('produtos');
Rota::get('checkout/{slug_produto}')->controller('checkout')->method('index');