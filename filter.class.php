<?php


class Filter
{
    private $FilterColumns=array(); // all specified filtered columns 
    private $FilterColumnValues=array(); // all specified columns values of filtered columns
    private $LastAddedFilteredColumn=""; // at last added filtered columns name
    private $renderedString="";
    private $FilterColumnsAsOptionList="";
    private $IsPivotDesign=false;
    private $pivotKeyField="";
    private $pivotValueField="";
    
    public function __construct($isPivotDesign=false) {
        $this->IsPivotDesign=$isPivotDesign;
    }
    
    public function addFilteredColumn($ColumnKey,$ColumnValue="")
    {
        if($this->IsPivotDesign)
        {
            if($this->pivotKeyField=="" || $this->pivotValueField=="")
                throw new Exception ("Pivot parameters are not defined! Please define pivot parameters first. setPivotParameters(KeyField,ValueField)", 1031, null);
            
            if($ColumnValue=="")
            {
                // sadece değer gelirse.
                array_push($this->FilterColumns, $ColumnKey);
                //array_push($this->FilterColumnValues
                $this->FilterColumnValues[$ColumnKey]=array();
                $this->LastAddedFilteredColumn=$ColumnKey;
            }
            else
            {
                //hem anahtar hem değer gelirse
            }
            
        }
        else
        {
            if($ColumnValue=="")
            {
                // sadece değer gelirse.
                array_push($this->FilterColumns, $ColumnKey);
                //array_push($this->FilterColumnValues
                $this->FilterColumnValues[$ColumnKey]=array();
                $this->LastAddedFilteredColumn=$ColumnKey;
            }
            else
            {
                //hem anahtar hem değer gelirse
            }
        }
       
    }
    
    
    public function getFilteredColumnList()
    {
        print_r($this->FilterColumns);
    }
    
    
    public function addValueToFilteredColumn($FilteredColumnName,$Value)
    {
        array_push($this->FilterColumnValues[$FilteredColumnName],$Value);
    }
    
    public function addValueToLastAddedFilteredColumn($Value)
    {
        array_push($this->FilterColumnValues[$this->LastAddedFilteredColumn],$Value);
    }
    
    public function getFilteredColumnValueList()
    {
        print_r($this->FilterColumnValues);
    }
    
    public function renderAll()
    {
        if($this->IsPivotDesign)
        {
            for($i=0;$i<count($this->FilterColumns);$i++)
            {
                if(is_array($this->FilterColumnValues[$this->FilterColumns[$i]]) && count($this->FilterColumnValues[$this->FilterColumns[$i]])>1)
                {
                    $this->renderedString.= " (".$this->pivotKeyField."='".$this->FilterColumns[$i]."' and ".$this->pivotValueField." in(";
                    for($x=0;$x<count($this->FilterColumnValues[$this->FilterColumns[$i]]);$x++)
                    {
                        $this->renderedString.="'".$this->FilterColumnValues[$this->FilterColumns[$i]][$x]."'";
                        if($x<count($this->FilterColumnValues[$this->FilterColumns[$i]])-1)
                            $this->renderedString.=",";
                    }
                    $this->renderedString.="))";

                }
                else
                {
                    $this->renderedString.= "(".$this->pivotKeyField."='".$this->FilterColumns[$i]."' and ".$this->pivotValueField." ='".$this->FilterColumnValues[$this->FilterColumns[$i]][0]."') ";
                }
                if($i<count($this->FilterColumns)-1)
                    $this->renderedString.=" and ";
            }

            return $this->renderedString;
        }
        else
        {
            for($i=0;$i<count($this->FilterColumns);$i++)
            {
                if(is_array($this->FilterColumnValues[$this->FilterColumns[$i]]) && count($this->FilterColumnValues[$this->FilterColumns[$i]])>1)
                {
                    $this->renderedString.=" ".$this->FilterColumns[$i]." in(";
                    for($x=0;$x<count($this->FilterColumnValues[$this->FilterColumns[$i]]);$x++)
                    {
                        $this->renderedString.="'".$this->FilterColumnValues[$this->FilterColumns[$i]][$x]."'";
                        if($x<count($this->FilterColumnValues[$this->FilterColumns[$i]])-1)
                            $this->renderedString.=",";
                    }
                    $this->renderedString.=")";

                }
                else
                {
                    $this->renderedString.=$this->FilterColumns[$i]." ='".$this->FilterColumnValues[$this->FilterColumns[$i]][0]."' ";
                }
                if($i<count($this->FilterColumns)-1)
                    $this->renderedString.=" and ";
            }

            return $this->renderedString;
        }
    }
    
    public function addColumnAndValueViaMySQLResult($mysqlResult)
    {
        throw Exception("Not Implemented", "1404", "");
        
        
        
        
    }
    
    public function getFilteredColumnListAsOptionList()
    {
        $this->generateFilteredColumnListAsOptionList();
        return $this->FilterColumnsAsOptionList;
    }
    
    
     public function generateFilteredColumnListAsOptionList()
     {
          for($i=0;$i<count($this->FilterColumns);$i++)
        {
              $this->FilterColumnsAsOptionList.='<option value="'.$this->FilterColumns[$i].'">'.$this->FilterColumns[$i]."</option>";
        }
     }
     
     public function setPivotParameters($keyField,$valueField)
     {
         $this->pivotKeyField=$keyField;
         $this->pivotValueField=$valueField;
     }
    
    
    
    
    
}





