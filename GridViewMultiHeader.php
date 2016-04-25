<?php

/**
 * @copyright Copyright &copy; Alessio Garzi, 2016
 * @package yii2-gridviewmultiheader
 * @version 1.0.0
 */

namespace ozzyboshi\gridviewmultiheader;

use yii\grid\GridView;
use yii\helpers\Html;
 
class GridViewMultiheader extends GridView {
 
    public $addingHeaders = array();
 
    public function renderTableHeader() {
        $res="";
        if (!empty($this->addingHeaders))
            $res=$res.$this->multiRowHeader();
 
        $cells = [];
        foreach ($this->columns as $column) {
            /* @var $column Column */
            $cells[] = $column->renderHeaderCell();
        }
        $content = Html::tag('tr', implode('', $cells), $this->headerRowOptions);
        if ($this->filterPosition == self::FILTER_POS_HEADER) {
            $content = $this->renderFilters() . $content;
        } elseif ($this->filterPosition == self::FILTER_POS_BODY) {
            $content .= $this->renderFilters();
        }
        return "<thead>\n" . $res.$content . "\n</thead>";
    }
 
    protected function multiRowHeader() {
        $res=Html::beginTag('thead') . "\n";
        $res=$res.Html::beginTag('tr') . "\n";
        foreach ($this->addingHeaders as $row) {
            $res=$res.$this->addHeaderRow($row);
        }
        $res=$res.Html::endTag('tr') . "\n";
        $res=$res.Html::endTag('thead') . "\n";
        return $res;
    }
 
    protected function addHeaderRow($row) {
        // add a single header row
        
        // inherits header options from first column
        //$options = $this->columns[0]->headerHtmlOptions;
        $options="";
        $res="";
        foreach ($row as $header => $width) {
            $options['colspan'] = $width;
            $res=$res.Html::beginTag('th', $options);
            $res=$res.$header;
            $res=$res.Html::endTag('th');
        }
       
        return $res;
    }
}
?>
