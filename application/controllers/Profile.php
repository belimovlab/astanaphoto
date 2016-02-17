<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	var $data;
        
        function __construct() {
            parent::__construct();
            $this->data['user_info'] = $this->profile_model->get_user_info();
        }
        
	public function index()
	{
		redirect('/main');
	}
        
        public function signin()
	{
            if($this->auth->is_logined())
            {
                redirect('/account');
            }
            else
            {
                $this->data['header'] = $this->themelib->get_header('Авторизация в сервисе','profile_signin',  $this->data);
                $this->data['footer'] = $this->themelib->get_footer();
                $this->data['error'] = $this->session->userdata('error');
                $this->data['email'] = $this->session->userdata('email');
                $this->data['password'] = $this->session->userdata('password');
                $this->session->unset_userdata(array('email','password','error'));
                $this->load->view('profile/signin',  $this->data);
            }
	}
        
        public function signup()
	{
            if($this->auth->is_logined())
            {
                redirect('/account');
            }
            else
            {
                $this->data['header'] = $this->themelib->get_header('Регистрация в сервисе','profile_signin', $this->data);
                $this->data['footer'] = $this->themelib->get_footer('profile_signup');
                $this->data['ganres'] = $this->main_model->get_all_ganres();
                $this->data['error'] = $this->session->userdata('error');
                $this->data['email'] = $this->session->userdata('email');
                $this->data['password'] = $this->session->userdata('password');
                $this->data['repassword'] = $this->session->userdata('repassword');
                $this->data['surname'] = $this->session->userdata('surname');
                $this->data['birthday'] = $this->session->userdata('birthday');
                $this->data['account'] = $this->session->userdata('account');
                $this->session->unset_userdata(array('email','password','repassword','name','surname','birthday','account','error'));
                $this->load->view('profile/signup',  $this->data);
            }
	}

        public function try_signup()
        {
            if($this->auth->is_logined())
            {
                redirect('/account');
            }
            else
            {
                if(
                        !$this->input->post('email') || 
                        !$this->input->post('password') || 
                        $this->input->post('password') == '' ||
                        $this->input->post('password') != $this->input->post('repassword') ||
                        !$this->input->post('name') ||
                        !$this->input->post('surname') ||
                        !$this->input->post('birthday') ||
                        !$this->input->post('account')
                    )
                {
                        $this->session->set_userdata('error','Заполните все поля.');
                        $this->session->set_userdata(array(
                            'email' => $this->input->post('email') ? $this->input->post('email') : '',
                            'password' => $this->input->post('password') ? $this->input->post('password') : '',
                            'repassword' => $this->input->post('repassword') ? $this->input->post('repassword') : '',
                            'name' => $this->input->post('name') ? $this->input->post('name') : '',
                            'surname' => $this->input->post('surname') ? $this->input->post('surname') : '',
                            'birthday' => $this->input->post('birthday') ? $this->input->post('birthday') : '',
                            'account' => $this->input->post('account') ? $this->input->post('account') : ''

                        ));
                        redirect('/profile/signup');
                }
                else
                {
                    $this->load->helper('email');
                    if(valid_email($this->input->post('email')))
                    {
                        if($this->profile_model->check_user_by_email($this->input->post('email')))
                        {
                            $this->session->set_userdata('error','Заполните Email уже используется.');
                            $this->session->set_userdata(array(
                                'email' => $this->input->post('email') ? $this->input->post('email') : '',
                                'password' => $this->input->post('password') ? $this->input->post('password') : '',
                                'repassword' => $this->input->post('repassword') ? $this->input->post('repassword') : '',
                                'name' => $this->input->post('name') ? $this->input->post('name') : '',
                                'surname' => $this->input->post('surname') ? $this->input->post('surname') : '',
                                'birthday' => $this->input->post('birthday') ? $this->input->post('birthday') : '',
                                'account' => $this->input->post('account') ? $this->input->post('account') : ''
                            ));
                            redirect('/profile/signup');
                        }
                        else
                        {
                            $this->profile_model->set_new_user(
                                    $this->input->post('email'), 
                                    $this->input->post('password'), 
                                    $this->input->post('name'), 
                                    $this->input->post('surname'), 
                                    $this->input->post('birthday'), 
                                    $this->input->post('account') );
                            redirect('/main');
                        }
                    }
                    else
                    {
                        $this->session->set_userdata('error','Заполните Email корректно.');
                        $this->session->set_userdata(array(
                            'email' => $this->input->post('email') ? $this->input->post('email') : '',
                            'password' => $this->input->post('password') ? $this->input->post('password') : '',
                            'repassword' => $this->input->post('repassword') ? $this->input->post('repassword') : '',
                            'name' => $this->input->post('name') ? $this->input->post('name') : '',
                            'surname' => $this->input->post('surname') ? $this->input->post('surname') : '',
                            'birthday' => $this->input->post('birthday') ? $this->input->post('birthday') : '',
                            'account' => $this->input->post('account') ? $this->input->post('account') : ''

                        ));
                        redirect('/profile/signup');
                    }
                }
            }
        }
        
        public function try_signin()
        {
            if($this->auth->is_logined())
            {
                redirect('/account');
            }
            else
            {
                if(!$this->input->post('email') || !$this->input->post('password') || $this->input->post('password') == '')
                {
                        $this->session->set_userdata('error','Заполните все поля.');
                        $this->session->set_userdata(array(
                            'email' => $this->input->post('email') ? $this->input->post('email') : '',
                            'password' => $this->input->post('password') ? $this->input->post('password') : ''
                        ));
                        redirect('/profile/signin');
                }
                else
                {
                    $this->load->helper('email');
                    if(valid_email($this->input->post('email')))
                    {
                        $res = $this->profile_model->get_user_info_by_email_and_password($this->input->post('email'), $this->input->post('password'));
                        if($this->auth->try_signin($res))
                        {
                            $redirected_url = $this->themelib->getSessionValue('redirected_url');
                            if($redirected_url)
                            {
                                redirect($redirected_url);
                            }
                            else
                            {
                                redirect('/account');
                            }
                        }
                        else
                        {
                            $this->session->set_userdata('error','Неверно указазны email или пароль.');
                            redirect('/profile/signin');
                        }
                    }
                    else
                    {
                        $this->session->set_userdata('error','Заполните Email корректно.');
                        $this->session->set_userdata(array(
                            'email' => $this->input->post('email') ? $this->input->post('email') : '',
                            'password' => $this->input->post('password') ? $this->input->post('password') : ''
                        ));
                        redirect('/profile/signin');
                    }
                }
            }
        }
        
        public function signout()
        {
            if($this->auth->is_logined())
            {
                $this->auth->user_logout();
                redirect('/');
            }
            else
            {
                redirect('/profile/signin');
            }
        }
}
