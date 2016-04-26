# yii2-gridview-multiheader
A standard yii2 gridview with more than one header

Yii2 Gridview Multiheader.
==================
This widget is a Yii 2 extension of the regular Yii2 Gridview widget and allows to build a html table with more than a raw as header.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require ozzyboshi/yii2-gridview-multiheader
```

or add

```
"ozzyboshi/yii2-gridview-multiheader": "*"
```

to the require section of your `composer.json` file.

In the latter case you want probably to add a psr-4 autoloader to your  `composer.json` file like this

```
"autoload" : {
        "classmap" : [
                "vendor/ozzyboshi/yii2-gridview-multiheader"
            ]
        },
```

and run composer dumpautoload

Usage:
------

```php
// MyView.php

use ozzyboshi\gridviewmultiheader\GridViewMultiheader as GridViewMultiheader;
...

<?php

echo GridViewMultiheader::widget([
  'tableOptions' => ['class' => 'table table-striped',],
  'addingHeaders' => [
      ['' => 1],
      ['Prelievi da enel' => 3],
      ['Delta Prelievi da enel' => 4],
      ['Produzione impianto' => 3],
      ['Delta produzione impianto' => 4],
      ['Immissioni su rete ENEL' => 3],
      ['Delta immissioni su rete ENEL' => 4],
      ['Consumi casa' => 3]
    ],
    'dataProvider' => $dataProvider,
    'showHeader' => true,
    'id' => 'summarytable',
    'columns' => [
      'data',
      'consumofascia1',
      'consumofascia2',
      'consumofascia3',
      'consumodelta1witheuro',
      'consumodelta2witheuro',
      'consumodelta3witheuro',
      'consumodeltatotalewitheuro',
      'produzionefascia1',
      'produzionefascia2',
      'produzionefascia3',
      'produzionedelta1witheuro',
      'produzionedelta2witheuro',
      'produzionedelta3witheuro',
      'produzionedeltatotalewitheuro',
      'immissionefascia1',
      'immissionefascia2',
      'immissionefascia3',
      'immissionedelta1witheuro',
      'immissionedelta2witheuro',
      'immissionedelta3witheuro',
      'immissionedeltatotalewitheuro',
      'consumicasafotovoltaico',
      'consumicasatotali',
      'consumicasapercentuale',
    ],
  ]);
?>
```

You can see the result of this table at http://lettureenel.ozzyboshi.com


