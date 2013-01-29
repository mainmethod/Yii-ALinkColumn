<?php

/**
 * ALinkColumn class file.
 *
 * @author Rob Farrell
 * @copyright Copyright &copy; 2013 Ashe Avenue Development
 */

Yii::import('zii.widgets.grid.CLinkColumn');

/**
 * ALinkColumn is a simple extension of CLinkColumn to alternatively handle AjaxLinks
 * 
 * @author Rob Farrell
 * @version 0.1 2013-01-29
 */

class ALinkColumn extends CLinkColumn{
    
    /**
     * @var bool whether the link is rendered as an AjaxLink or Link
     * defaults to false
     */
    public $isAjax = false;
    
    /**
     * @var array optional configuration for ajax
     * @see http://www.yiiframework.com/doc/api/1.1/CHtml#ajax-detail
     */
    public $ajaxOptions = array();
    
    
    /**
     * Renders the data cell content (overrides parent method).
     * This method renders a hyperlink in the data cell.
     * @param integer $row the row number (zero-based)
     * @param mixed $data the data associated with the row
     */
    protected function renderDataCellContent($row,$data){
        $url   = ($this->urlExpression===null)   ? $this->url   : $this->evaluateExpression($this->urlExpression,array('data'=>$data,'row'=>$row));
        $label = ($this->labelExpression===null) ? $this->label : $this->evaluateExpression($this->labelExpression,array('data'=>$data,'row'=>$row));
        $label = (is_string($this->imageUrl))    ? CHtml::image($this->imageUrl,$label) : $label;
        
        echo $this->isAjax ? CHtml::ajaxLink($label,$url,$this->ajaxOptions,$this->linkHtmlOptions) : CHtml::link($label,$url,$this->linkOptions);
    }
}
