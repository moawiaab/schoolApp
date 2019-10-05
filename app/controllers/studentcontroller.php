<?php

namespace FR_MO\Controllers;
use FR_MO\LIB\database\PDOdatabase;
use FR_MO\Models\StudentModel;
use FR_MO\Models\ClassesModel;
use FR_MO\Models\CashedModel;
use FR_MO\Models\FatherModel;
use FR_MO\Models\CoursModel;
use FR_MO\LIB\herber;
use FR_MO\LIB\FileUpload;
use FR_MO\LIB\InputFilter;

class StudentController extends AppController
{
    use InputFilter;
	use herber;
	public function defaultMethod ()
	{	$this->_data['student'] = StudentModel::getAll();
		//$this->goToLo('/user',3000,'جاري تحويلك الى المستخدمين');
		$this->setView();
    }
    
    public function addMethod(){
		$this->_data['classes'] = ClassesModel::getAll();
		$this->_data['sexes'] = StudentModel::getAllSex();
		if(isset($_POST['submit'])){
			$this->goToLo();
			$std = new StudentModel();
			$std->staName  =  $this->filterString($_POST['staName']);
			$std->address  =  $this->filterString($_POST['address']);
			$std->phone    =  $this->filterString($_POST['phone']);
			$std->age      =  $this->filterInt($_POST['age']);
			$std->sex      =  $this->filterInt($_POST['sex']);
			$std->amunt    =  $this->filterFloat($_POST['amunt']);
			$std->classId  =  $this->filterInt($_POST['classId']);
			$std->createdDate = date('Y-m-d');
			$std->feeding =   $this->filterString($_POST['feeding']);
			$std->updatedBy = $this->session->u->UserId;
            $std->createdBy = $this->session->u->UserId;
			if(!empty($_FILES['stu-img']['name'])){
				$upload = new FileUpload($_FILES['stu-img']);
				try {
				  $upload->upload();
                  $std->img = $upload->new_name;
				} catch (Exception $e) {
				}
              }
			if($std->save()){
                $fatth = new FatherModel();
                $fatth->stuId  = $id;
                $fatth->id =  $id;
                $fatth->save(false);
                $this->goToLoTU('/student',2);
            }
		}

        $this->setView();
	}
	

	public function editMethod(){
			$id = $this->filterInt($this->_params[0]);
			$std = StudentModel::getByPK($id);
            if($std == false){
                $this->goToLoTU('/student',2);
            }
            $this->_data['classes'] = ClassesModel::getAll();
            $this->_data['sexes'] = StudentModel::getAllSex();
            $this->_data['student'] = $std;
            if(isset($_POST['submit'])){
                $this->goToLo();
                $std->staName  =  $this->filterString($_POST['staName']);
                $std->address  =  $this->filterString($_POST['address']);
                $std->phone    =  $this->filterString($_POST['phone']);
                $std->age      =  $this->filterInt($_POST['age']);
                $std->sex      =  $this->filterInt($_POST['sex']);
                $std->amunt    =  $this->filterFloat($_POST['amunt']);
                $std->classId  =  $this->filterInt($_POST['classId']);
                $std->feeding =   $this->filterString($_POST['feeding']);
                if($std->save());
                $this->goToLoTU('/student',2);
            }
			$this->setView();
	}
    public function profileMethod(){
		$id = $this->filterInt($this->_params[0]);
        $this->_data['cashed']= CashedModel::getCashedById($id);   
        $fatth = FatherModel::getByPK($id);   
        $this->_data['fathers'] = $fatth;  
        $stu = StudentModel::getStudentById($id);
        //var_dump($stu['classId']);
		$this->_data['courses'] = CoursModel::getCoursByClass($this->filterInt($stu['classId']));
        $this->_data['student'] = $stu;

        if(isset($_POST['submit'])){

            if($fatth === false){
                $fatt = new FatherModel();
                $fatt->fname  = $this->filterString($_POST['fname']);
                $fatt->addres = $this->filterString($_POST['addres']);
                $fatt->phon   = $this->filterString($_POST['phon']);
                $fatt->email  = $this->filterString($_POST['email']);
                $fatt->stuId  = $id;
                $fatt->id  = $id;
                $fatt->save(false);
            }else{
            $fatth->fname  = $this->filterString($_POST['fname']);
            $fatth->addres = $this->filterString($_POST['addres']);
            $fatth->phon   = $this->filterString($_POST['phon']);
            $fatth->email  = $this->filterString($_POST['email']);
            $fatth->stuId  = $id;
            $fatth->save();
            $this->goToLoTU('/student/profile/'.$id,2);
        }
        }

        $this->setView();
	}
	
	public function cashedMethod(){
		$id = $this->filterInt($this->_params[0]);
		if(isset($_POST['submit'])){
            $this->goToLo();
            $stud = StudentModel::getByPK($id);
            if($stud === false)
                $this->goToLoTU($_SERVER['HTTP_REFERER'],20);
            $mat = new CashedModel();
            $mat->staId = (int)$stud->id;
            $mat->classId = (int)$stud->classId;
            $mat->date = date('Y-m-d');
            $mat->amount = $this->filterFloat($_POST['amount']);
            $mat->detales   = $this->filterString($_POST['detales']);
            $mat->cearedBy = $this->session->u->UserId;
            $mat->updatedBy = $this->session->u->UserId;

            if($mat->save()){
                //$this->messenger->add('تم إضافة الصلاحية بنجاح');
                $this->goToLoTU('/student',1000);
            }else{
                $this->goToLoTU($_SERVER['HTTP_REFERER'],20);
            }
        }
		$this->setView();
	}


}