<?php

	class SmsTemplates
	{

		public function RegistrationSMS($name,$unique_id)
		{
			//$body=$this->sms_model->get_my_template('Application Submission');
			/*if($body){
				echo $body;
			}else{
				echo "no";
			}
			die;*/
			//return $body;
			//return $message='Dear '. ucfirst($name) . ',%nWelcome To Tefy. Your Registration Completed Successfully.' ;
		}
		public function AppCancelled($name,$application_id)
		{
			$body=$this->get_my_template('fdfd');
			echo $body;die;
			$message='Dear '. ucfirst($name) . ',%nYour Application : <b>' . $application_id.'</b> has been successfully cancelled. Please visit tefy.in to apply for re-apply.' ;
		}
		public function admission_sms($body,$name,$application_id)
		{
			echo $body;die;
			$rep = ['%%|name^{"inputtype" : "text", "maxlength" : "30"}%%', '%%|application^{"inputtype" : "text", "maxlength" : "15"}%%'];
			$rep_by = [$name, $application_id];
			$message=str_replace($rep,$rep_by,$body);
			return $message;
		}
	}