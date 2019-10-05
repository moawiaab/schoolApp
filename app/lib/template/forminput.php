<?php

namespace FR_MO\Lib\Template;

trait FormInput{

    public function addEditUl($add,$edit,$delete,$print){?>
        <div class="addEditUl">
            <ul>
                <li><a href="<?=$add?>"><i class="fa fa-plus"></i></a></li>
                <li><a href="<?=$edit?>"><i class="fas fa-edit"></i></a></li>
                <li><a href="<?=$delete?>"><i class="fa fa-trash"></i></a></li>
                <li><a href="<?=$print?>"><i class="fa fa-print"></i></a></li>    
            </ul>
        </div>
      
    <?php
    }
    public function startForm($type="application/x-www-form-urlencoded"){?>
        <form action="" method="post" enctype="<?=$type?>" id="mainForm">
   <?php
    }

    public function endForm(){?>
        </form>
   <?php
    }
    public function setInput($type,$label,$nameId,$col = 6,$value='',$unm='1-1000',$title='لا تتركل حقل فارغاً من فضلك')
    {$val=''; if($value != ''){$val = "has-data";} ?>
        <div class="form-Input col-md-<?=$col?>">
            <input type="<?=$type?>" name="<?=$nameId?>" value="<?=$value?>" 
            class="myInput <?=$val?>" autocomplete="off"
            data-validation = "length" 
            data-validation-length = "<?=$unm?>"
            data-validation-error-msg = "<?=$title?>"
            >
            <label for="<?=$nameId?>" class="labelUp"><?=$label?></label>
            <span id="anderline" class=""></span>
        </div>
    <?php    
    }
    public function startSelect($nameId,$col = 6,$unm='1-40',$title='اختر البند المطلوب'){ ?>
    <div class="form-Input col-md-<?=$col?>">
    
        <select name="<?=$nameId?>" id="<?=$nameId?>"  autocomplete="off"
            data-validation = "length" 
            data-validation-length = "<?=$unm?>"
            data-validation-error-msg = "<?=$title?>"
        >
    <?php    
    }
    public function setOption($value,$name,$id = 0){ $select = ($value == $id)?'selected = "selected"':''?>
        <option value="<?=$value?>" <?=$select?>><?=$name?></option>
    <?php    
    }
    public function endSelect($label="اختر من هنا"){ ?>
        </select>   
        <label for="" class="labelUp"><?=$label?></label>
        </div>
    <?php    
    }
    public function setSubmit($value='حفظ',$nameId = "submit"){ ?>
        <div class="form-Input col-md-12">
            <input type="submit" name="<?=$nameId?>" value="<?=$value?>" class="submit">
        </div>
    <?php    
    }
    public function setModelBtn($value='حفظ',$nameId = "sumbit"){ ?>
        <div class="form-Input col-md-12">
        <a href="" data-toggle="modal" data-target="#myModal"> <i class="fa fa-edit"></i> تعديل بيانات الطالب </a>        </div>
    <?php    
    }
    public function checkAllBox($col=1,$label=''){ ?>
        <div class="form-checkbox col-md-<?=$col?>">
            <input type="checkbox" value="" class="mycheckAll" id="select_all">
            <label for="select_all" class="labelCh"><?=$label?></label>
         </div>
    <?php
    }
    public function setImg($url,$class='',$alrt='لاتوجد صورة'){ ?>
        <img src="<?=$url?>" alt="<?=$alrt?>" class="<?=$class?>">
    <?php
    }
    public function setCheckBox($col,$name,$label,$value,$check = []){ ?>
        <div class="form-checkbox col-md-<?=$col?>">
            <input type="checkbox" name="<?=$name?>"  value="<?=$value?>"
             class="checkbox" id="<?=$value?>" <?=in_array($value,$check)?'checked':''?>>
            <label for="<?=$value?>" class="labelCh"><?=$label?></label>
         </div>
    <?php
    }
    public function tableCheck($name,$value){ ?>
        <div class="teblecheck">
            <input type="checkbox" name="<?=$name?>[]"  value="<?=$value?>" class="checkbox">
         </div>
    <?php
    }

    public function setRadio($name,$label,$id,$col=4){?>
        <div class="form-checkbox col-md-<?=$col?>">
            <input type="radio" id="<?=$id?>" class="" name="<?=$name?>">
            <label for="<?=$id?>" class="labelCh"><?=$label?></label>
         </div>
    <?php
    }
public function startModel($title){?>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?=$title?></h4>
        </div>
        <div class="modal-body">
<?php
}

public function endModel(){?>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info" id="sendStudend">حفظ</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<?php
}
}

