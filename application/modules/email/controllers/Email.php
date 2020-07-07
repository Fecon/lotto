<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends MX_Controller {
	public function __construct()
       {
        	parent::__construct();
        	$this->load->model('Mail_model');
       }

    public function mail_new_ticket($ticket_id)
    {
       $ticket = $this->Mail_model->get_ticket_detail($ticket_id);

		$message = 'เรียนผู้ดูแลระบบ Ticket Support

        มี Ticket ใหม่เข้ามาในระบบ กรุณาตรวจสอบเพื่อดำเนินการต่อไป

        Ticket ID : #'.str_pad((string)$ticket[0]['ticket_id'], 7, "0", STR_PAD_LEFT).'
        Topic : '.$ticket[0]['ticket_title'].'
        Project : '.$ticket[0]['project_name'].'
        Sender : '.$ticket[0]['user_name'].'
        Send Time : '.$ticket[0]['ticket_send_time'].'
        Link Ticket :'.site_url('admin_ticket_manage/ticket_detail/'.$ticket[0]['ticket_id']);

		$subject = 'Ticket Support : แจ้งเตือน Ticket ใหม่';
		$input = array(
			'message' => $message, 
			'subject' => $subject, 
		);
		$get_email = $this->Mail_model->get_administrator();
		for($i=0;$i<count($get_email);$i++){
			$receiver[] = $get_email[$i]['user_email'] ;
		}

		echo $this->sendmail($receiver,$input);
    }
    
    public function mail_ticket_manage($ticket_id)
    {
        $ticket = $this->Mail_model->get_ticket_detail($ticket_id);
        $ticket_status = $this->ticket_status($ticket[0]['ticket_status']);

        $message = 'เรียนคุณ'.$ticket[0]['user_name'].'

        มีการดำเนินการ Ticket ที่ท่านส่งแล้ว กรุณาตรวจสอบเพื่อดำเนินการต่อไป

        Ticket ID : #'.str_pad((string)$ticket[0]['ticket_id'], 7, "0", STR_PAD_LEFT).'
        Topic : '.$ticket[0]['ticket_title'].'
        Project : '.$ticket[0]['project_name'].'
        Sender : '.$ticket[0]['user_name'].'
        Send Time : '.$ticket[0]['ticket_send_time'].'
        Ticket Status :'.$ticket_status.'

        Link to Ticket :'.site_url('user_ticket/ticket_detail/'.$ticket[0]['ticket_id']);

        $subject = 'Ticket Support : แจ้งเตือนการดำเนินการ Ticket';
        $input = array(
            'message' => $message, 
            'subject' => $subject, 
        );

        $receiver[] = $ticket[0]['user_email'] ;
        $this->sendmail($receiver,$input);
    }
    public function mail_ticket_admin_reply($ticket_id)
    {
        $ticket = $this->Mail_model->get_ticket_detail($ticket_id);
        $ticket_status = $this->ticket_status($ticket[0]['ticket_status']);

        $message = 'เรียนคุณ'.$ticket[0]['user_name'].'

        มีข้อความตอบกลับ Ticket ที่ท่านส่ง กรุณาตรวจสอบเพื่อดำเนินการต่อไป

        Ticket ID : #'.str_pad((string)$ticket[0]['ticket_id'], 7, "0", STR_PAD_LEFT).'
        Topic : '.$ticket[0]['ticket_title'].'
        Project : '.$ticket[0]['project_name'].'
        Sender : '.$ticket[0]['user_name'].'
        Send Time : '.$ticket[0]['ticket_send_time'].'
        Ticket Status :'.$ticket_status.'

        Link to Ticket :'.site_url('user_ticket/ticket_detail/'.$ticket[0]['ticket_id']);

        $subject = 'Ticket Support : คุณมีข้อความใหม่จากระบบ Ticket';
        $input = array(
            'message' => $message, 
            'subject' => $subject, 
        );

        $receiver[] = $ticket[0]['user_email'] ;

        $this->sendmail($receiver,$input);
    }
    public function mail_ticket_user_reply($ticket_id)
    {
        $ticket = $this->Mail_model->get_ticket_detail($ticket_id);
        $ticket_status = $this->ticket_status($ticket[0]['ticket_status']);

        $message = 'เรียนคุณ'.$ticket[0]['user_name'].'

        มีข้อความตอบกลับจากผู้ใช้งาน กรุณาตรวจสอบเพื่อดำเนินการต่อไป

        Ticket ID : #'.str_pad((string)$ticket[0]['ticket_id'], 7, "0", STR_PAD_LEFT).'
        Topic : '.$ticket[0]['ticket_title'].'
        Project : '.$ticket[0]['project_name'].'
        Sender : '.$ticket[0]['user_name'].'
        Send Time : '.$ticket[0]['ticket_send_time'].'
        Ticket Status :'.$ticket_status.'

        Link to Ticket :'.site_url('admin_ticket_manage/ticket_detail/'.$ticket[0]['ticket_id']);

        $subject = 'Ticket Support : คุณมีข้อความใหม่จากระบบ Ticket';

        $input = array(
            'message' => $message, 
            'subject' => $subject, 
        );

        $get_email = $this->Mail_model->get_administrator();
        for($i=0;$i<count($get_email);$i++){
            $receiver[] = $get_email[$i]['user_email'] ;
        }


        $this->sendmail($receiver,$input);
    }
	public function sendmail($receiver,$input)
	{
		$this->load->library('phpmailer');

		$this->phpmailer->CharSet = "utf-8";
		$this->phpmailer->IsSMTP();             // ใช้งาน SMTP
        $this->phpmailer->SMTPAuth   = true;   // เปิดการการตรวจสอบการใช้งาน SMTP
        $this->phpmailer->SMTPSecure = "ssl";  // protocol ที่จะใช้เชื่อมต่อกับ server
        $this->phpmailer->Host       = "smtp.gmail.com";      // ตั้งค่า mail server ของเรานะครับ ตัวอย่างจะใช้ของ Gmail นะครับ
        $this->phpmailer->Port       = 465;                   //  port ที่ใช้  ถ้าเป็นของ hosting ทั่วไปส่วนใหญ่เป็น 25 นะครับ
        $this->phpmailer->Username   = "info@t-techsolution.com ";  //  email address
        $this->phpmailer->Password   = "casper12";            // รหัสผ่าน Gamil
        $this->phpmailer->SetFrom('info@t-techsolution.com ', 'T-tech Support no-reply');  //ผู้ส่ง
        //$this->phpmailer->AddReplyTo("response@yourdomain.com","ชื่อ-นามสกุล");  //email ผู้รับเมื่อมีการตอบกลับนะครับ
        $this->phpmailer->Subject    = $input['subject']; //หัวข้ออีเมล์
        $this->phpmailer->Body      = $input['message']; //ส่วนนี้รายละเอียดสามารถส่งเป็นรูปแบบ HTML ได้
        //$this->phpmailer->AltBody    = "Plain text message"; //ส่วนนี้ส่งเป็นข้อมูลอย่างเดียวเท่าสนั้น แล้วแต่จะเปิดใช้นะครับ

        
        for($i=0;$i<count($receiver);$i++){
        	 $this->phpmailer->AddAddress($receiver[$i]); 
        }
        
        // $this->phpmailer->AddAddress('wanchalermb@gmail.com'); 
        $this->phpmailer->AddAddress('l2uncs@gmail.com'); 
 
        // $this->phpmailer->AddAttachment("images/phpmailer.gif");      // การแนบไฟล์ถ้าต้องการ สามารถเพิ่มได้มากกว่า 1 เช่นกันครับ
        // $this->phpmailer->AddAttachment("images/phpmailer_mini.gif"); // ตัวอย่างการพิ่มได้มากกว่า 1
        if(!$this->phpmailer->Send()) {
            return $data["message"] = "Error: " . $this->phpmailer->ErrorInfo;
        } else {
            return $data["message"] = "ส่งอีเมล์สำเร็จ!";
        }

	}
    public function ticket_status($status)
    {
        switch ($status) {
            case 1:
                $ticket_status = "รอการตอบกลับ";
                break;
            case 2:
                $ticket_status = "รับเรื่องแล้ว";
                break;
            case 3:
                $ticket_status = "กำลังดำเนินการ";
                break;
            case 4:
                $ticket_status = "ปิดแล้ว";
                break;
            case 5:
                $ticket_status = "ยกเลิก";
            break;
        }
        return $ticket_status ;
    }

}
