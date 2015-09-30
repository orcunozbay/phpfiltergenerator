<?php


class Filter
{
    private $FilterColumns=array(); // all specified filtered columns 
    private $FilterColumnValues=array(); // all specified columns values of filtered columns
    private $LastAddedFilteredColumn=""; // at last added filtered columns name
    private $renderedString="";
    private $FilterColumnsAsOptionList="";
    
    public function addFilteredColumn($ColumnKey,$ColumnValue="")
    {
        if($ColumnValue=="")
        {
            // sadece değer gelirse.
            array_push($this->FilterColumns, $ColumnName);
            //array_push($this->FilterColumnValues
            $this->FilterColumnValues[$ColumnName]=array();
            $this->LastAddedFilteredColumn=$ColumnName;
        }
        else
        {
            //hem anahtar hem değer gelirse
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
        
        echo $this->renderedString;
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
    
    
    
    
    
}





