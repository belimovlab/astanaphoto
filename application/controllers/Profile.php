<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

        
        private $data;
        private $user_avatar_uploads_dir = './content/user_avatar_temp/';
        private $user_avatar_dir = '/content/user_avatars/';
        
        private $user_photo_uploads_dir = './content/user_photo_temp/';
        private $user_photo_save_dir = './content/user_photos/';
        
        private $user_action_uploads_dir = './content/user_avatar_temp/';
        private $user_action_save_dir = './content/user_action/';   
        
        
        function __construct() {
            parent::__construct();
            if(!$this->userlib->is_logined())
            {
                $this->userlib->set_redirect_url();
                redirect('/account/login');
            }
            $this->data['user_info'] = $this->session->userdata('user_info');
        }

        public function index()
	{
            $this->data['header']        = $this->themelib->get_header($this->data['user_info']->first_name.' '.$this->data['user_info']->second_name,'profile/index,profile/photoswipe',  $this->data);
            $this->data['footer']        = $this->themelib->get_footer('photoswipe.min,photoswipe-ui-default.min,profile/index');
            $this->data['ganres_by_id']  = $this->ganres_model->get_ganres_array_by_ganres_id_key($this->data['user_info']->account_type);
            $this->data['user_types_id'] = $this->ganres_model->get_user_types_array_by_user_type_id_key();
            $this->data['best_photos']   = $this->profile_model->get_all_users_best_photos($this->data['user_info']->user_id);
            if($this->data['user_info']->additional_genre)
            {
                $this->data['ad_gen']    = explode(";", $this->data['user_info']->additional_genre);
                $this->data['ad_gen']    = array_unique($this->data['ad_gen']);
            }
            $this->data['port_albums']   = $this->profile_model->get_users_albums_with_photo($this->data['user_info']->user_id);
            $this->data['gets_albums']   = $this->profile_model->get_all_users_photos();
            
            $this->data['user_albums'] = $this->profile_model->get_all_users_albums_by_id_key_array();
                    
            
            $this->data['actions']       = $this->profile_model->get_all_actions();
            $this->data['comments']      = $this->profile_model->get_all_users_comments();
            $this->data['comments_cnt']  = $this->profile_model->get_comments_count();
            $this->data['bookmarks_cnt'] = $this->profile_model->check_bookmarks();
            $this->load->view('/profile/index',  $this->data);
	}
        
        public function edit_inform()
	{
            $this->data['header'] = $this->themelib->get_header('Редактирование основной информации','profile/index,profile/signin',  $this->data);
            $this->data['footer'] = $this->themelib->get_footer('autogrowtextarea,profile/edit_inform');
            $this->data['ganres'] = $this->ganres_model->get_sub_ganres_by_user_type($this->data['user_info']->account_type);
            $this->data['ganres_by_id']  = $this->ganres_model->get_ganres_array_by_ganres_id_key($this->data['user_info']->account_type);
            $this->data['user_types_id'] = $this->ganres_model->get_user_types_array_by_user_type_id_key();
            if($this->data['user_info']->additional_genre)
            {
                $this->data['ad_gen'] = explode(";", $this->data['user_info']->additional_genre);
                $this->data['ad_gen'] = array_unique($this->data['ad_gen']);
            }
            
            
            $this->load->view('/profile/edit_inform',  $this->data);
	}
        
        public function edit_contacts()
	{
            $this->data['header'] = $this->themelib->get_header('Редактирование контактной информации','profile/index,profile/signin',  $this->data);
            $this->data['footer'] = $this->themelib->get_footer('profile/edit_contacts');
            $this->userlib->reload_user_info();
            $this->load->view('/profile/edit_contacts',  $this->data);
	}
        
        public function edit_avatar()
	{
            $this->data['header'] = $this->themelib->get_header('Редактирование фотографии','profile/index,profile/signin',  $this->data);
            $this->data['footer'] = $this->themelib->get_footer('toprogress,flow.min,profile/avatar');
            $this->userlib->reload_user_info();
            $this->load->view('/profile/edit_avatar',  $this->data);
	}
        
        public function update_param()
        {
            if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                
                switch($this->input->post('param_name'))
                {
                    case 'type_cost':
                        $res = $this->input->post('param_value') == 'per_project' ? 'per_project'  : 'per_hour';
                        $this->profile_model->update_type_cost($res, 1);
                    break;
                    case 'ad_gen':
                        if($this->data['user_info']->profi)
                        {
                            $res = explode(";", $this->input->post('param_value'));
                            $res = array_unique($res);
                            $tmp_res = array();
                            foreach ($res as $one)
                            {
                                if($one != '')
                                {
                                    $tmp_res[] = $one;
                                }
                            }

                            if(count($tmp_res) >3)
                            {
                                $new_array = array();
                                for($i=0; $i <3 ; $i++)
                                {
                                    $new_array[$i] = $tmp_res[$i];
                                }
                            }
                            else
                            {
                                $new_array = $tmp_res;
                            }
                            $str = implode(";", $new_array);
                            $this->profile_model->update_contacts_item('additional_genre', $str);
                        }
                    break;
                    default:
                        $this->profile_model->update_contacts_item($this->input->post('param_name'), $this->input->post('param_value'));
                    break;
                }
                $this->userlib->reload_user_info();
                echo json_encode(array(
                    'status'=>'success'
                ));
            }
            else
            {
                echo json_encode(array('error_text'=>'Это не AJAX запрос.','status'=>'error'));
            }
        }
        
        private function createFileFromChunks($temp_dir, $fileName, $chunkSize, $totalSize) {


            $total_files = 0;
            foreach(scandir($temp_dir) as $file) {
                 if (stripos($file, $fileName) !== false) {
                     $total_files++;
                 }
            }

            if ($total_files * $chunkSize >=  ($totalSize - $chunkSize + 1)) {
                $new_file_name = mktime().'_'.md5($fileName).".".substr($fileName, strrpos($fileName, '.')+1);
                if (($fp = fopen($this->user_avatar_uploads_dir.$new_file_name, 'w')) !== false) {
                    for ($i=1; $i<=$total_files; $i++) {
                        fwrite($fp, file_get_contents($temp_dir.'/'.$fileName.'.part'.$i));
                    }
                    fclose($fp);
                } else {
                    return false;
                }
                if (rename($temp_dir, $temp_dir.'_UNUSED')) {
                    $this->rrmdir($temp_dir.'_UNUSED');
                } else {
                    $this->rrmdir($temp_dir);
                }
                if(file_exists($this->user_avatar_uploads_dir.$new_file_name))
                {
                    include('./third_part/SimpleImage.php');
                    try {
                        $img = new abeautifulsite\SimpleImage($this->user_avatar_uploads_dir.$new_file_name);
                        $img->fit_to_width(260)->save($this->user_avatar_uploads_dir.'260_'.$new_file_name);
                        $img->fit_to_width(30)->save($this->user_avatar_uploads_dir.'30_'.$new_file_name);
                        
                        if(file_exists($this->user_avatar_uploads_dir.'260_'.$new_file_name) && file_exists($this->user_avatar_uploads_dir.'30_'.$new_file_name))
                        {
                            unlink($this->user_avatar_uploads_dir.$new_file_name);
                        }
                        
                    } catch(Exception $e) {
                        echo json_encode(array("error"=>-1,'error_message'=> $e->getMessage()));
                    }
                    echo json_encode(array('file_name'=>$new_file_name,"success"=>1));
                }
                else
                {
                    echo json_encode(array("error"=>-1));
                }
               
            }

        }

        private function rrmdir($dir) 
        { 
            if (is_dir($dir)) { 
                $objects = scandir($dir); 
                foreach ($objects as $object) { 
                    if ($object != "." && $object != "..") 
                    { 
                        if (filetype($dir."/".$object) == "dir")
                        { 
                            $this->rrmdir($dir."/".$object);
                        }
                        else
                        {
                            unlink($dir."/".$object); 
                        }
                    }
                } 
                reset($objects); 
                rmdir($dir); 
            } 
        } 

        public function uploads()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $temp_dir = $this->user_avatar_uploads_dir.$_GET['flowIdentifier'];
                $chunk_file = $temp_dir.'/'.$_GET['flowFilename'].'.part'.$_GET['flowChunkNumber'];
                if (file_exists($chunk_file)) {
                    header("HTTP/1.0 200 Ok");
                } else
                {
                  header("HTTP/1.0 404 Not Found");
                }
            }

            if (!empty($_FILES)) foreach ($_FILES as $file) {
                if ($file['error'] != 0) {
                    continue;
                }
                $temp_dir = $this->user_avatar_uploads_dir.$_POST['flowIdentifier'];
                $dest_file = $temp_dir.'/'.$_POST['flowFilename'].'.part'.$_POST['flowChunkNumber'];

                if (!is_dir($temp_dir)) {
                    mkdir($temp_dir, 0777, true);
                }
                if (!move_uploaded_file($file['tmp_name'], $dest_file)) {
                    echo json_encode(array("error"=>-1));
                } else {
                    $this->createFileFromChunks($temp_dir, $_POST['flowFilename'],
                            $_POST['flowChunkSize'], $_POST['flowTotalSize']);
                    
                }
            }
        }
        
        public function save_avatar()
        {
            if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                //$this->profile_model->update_contacts_item($this->input->post('param_name'), $this->input->post('param_value'));
                
                $res = $this->profile_model->update_avatar($this->input->post('file_name'), $this->user_avatar_uploads_dir, $this->user_avatar_dir);
                if($res)
                {
                    echo json_encode(array(
                        'status'=>'success'
                    ));
                    $this->userlib->reload_user_info();
                }
                else
                {
                    echo json_encode(array('error_text'=>'Ошибка записи аватара!','status'=>'error'));
                }
            }
            else
            {
                echo json_encode(array('error_text'=>'Это не AJAX запрос.','status'=>'error'));
            }
        }
        
        public function edit_portfolio()
        {
            $this->data['header'] = $this->themelib->get_header('Редактирование портфолио','profile/index,profile/signin',  $this->data);
            $this->data['footer'] = $this->themelib->get_footer('profile/edit_portfolio');
            $this->data['error']  = $this->themelib->getSessionValue('error');
            $this->data['success']  = $this->themelib->getSessionValue('success'); 
            $this->data['ganres'] = $this->ganres_model->get_sub_ganres_by_user_type($this->data['user_info']->account_type);
            $this->data['ganres_by_id']  = $this->ganres_model->get_ganres_array_by_ganres_id_key($this->data['user_info']->account_type);
            $this->data['user_types_id'] = $this->ganres_model->get_user_types_array_by_user_type_id_key();
            $this->data['photo_cnt'] = $this->profile_model->get_photo_in_albums_count($this->data['user_info']->user_id);
            if($this->data['user_info']->profi)
            {
                $this->data['personal_albums'] = $this->profile_model->get_personal_album($this->data['user_info']->user_id);
                $this->data['personal_photo_cnt'] = $this->profile_model->get_photo_in_personal_albums_count($this->data['user_info']->user_id);
            }

            $this->load->view('/profile/edit_portfolio',  $this->data);
        }
        
        public function add_album()
        {
            if($this->data['user_info']->profi)
            {
                $this->data['header'] = $this->themelib->get_header('Добавление альбома','profile/index,profile/signin',  $this->data);
                $this->data['footer'] = $this->themelib->get_footer();
                $this->data['error']  = $this->themelib->getSessionValue('error'); 
                $this->load->view('/profile/add_album',  $this->data);
            }
            else
            {
                $this->session->set_userdata('error','Ваш аккаунт не имеет отметку профессионала <strong>PROFI</strong>');
                redirect('/profile/edit_portfolio');
            }
        }
        
        public function save_album()
        {
            if($this->data['user_info']->profi)
            {
                if($this->input->post('album_name'))
                {
                    $allow_album_count = $this->profile_model->get_personal_album_count($this->data['user_info']->user_id);
                    if(MainSiteConfig::get_profi_parametrs('profi_personal_albums_count') > $allow_album_count)
                    {
                        $this->profile_model->create_personal_album($this->input->post('album_name'));
                        $this->session->set_userdata('success','Ваш дополнительный альбом создан.');
                        redirect('/profile/edit_portfolio');
                    }
                    else
                    {
                        $this->session->set_userdata('error','Вы уже создали максимальное количество альбомов.');
                        redirect('/profile/edit_portfolio');
                    }
                }
                else
                {
                    $this->session->set_userdata('error','Ваш аккаунт не имеет отметку профессионала <strong>PROFI</strong>');
                    redirect('/profile/add_album');
                }
            }
            else
            {
                $this->session->set_userdata('error','Ваш аккаунт не имеет отметку профессионала <strong>PROFI</strong>');
                redirect('/profile/edit_portfolio');
            }
        }
        
        public function view_album($album_id)
        {
            $res = $this->ganres_model->get_ganres_array_by_ganres_id_key($this->data['user_info']->account_type);
            if($res[$album_id]->id)
            {
                $this->data['album_info']    = $res[$album_id];
                $this->data['albums_photos'] = $this->profile_model->get_albums_photo($album_id);
                $this->data['best_photos']   = $this->profile_model->get_user_best_photo_as_array();
                $this->data['header'] = $this->themelib->get_header('Редаткирование альбома - '.$this->data['album_info']->name,'profile/index,profile/signin,profile/photoswipe',  $this->data);
                $this->data['footer'] = $this->themelib->get_footer('toprogress,flow.min,photoswipe.min,photoswipe-ui-default.min,profile/view_album');
                $this->data['error']  = $this->themelib->getSessionValue('error'); 
                $this->data['success']  = $this->themelib->getSessionValue('success'); 
                $this->load->view('/profile/view_album',  $this->data);
            }
            else
            {
                $this->session->set_userdata('error','У вас нет такого альбома.');
                redirect('/profile/edit_portfolio');
            }
        }
        
        public function albums_uploads()
        {
            if($this->input->post('upload_token') && $this->input->post('album_id'))
            {
                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    $temp_dir = $this->user_photo_uploads_dir.$_GET['flowIdentifier'];
                    $chunk_file = $temp_dir.'/'.$_GET['flowFilename'].'.part'.$_GET['flowChunkNumber'];
                    if (file_exists($chunk_file)) {
                        header("HTTP/1.0 200 Ok");
                    } else
                    {
                      header("HTTP/1.0 404 Not Found");
                    }
                }

                if (!empty($_FILES)) foreach ($_FILES as $file) {
                    if ($file['error'] != 0) {
                        continue;
                    }
                    $temp_dir = $this->user_photo_uploads_dir.$_POST['flowIdentifier'];
                    $dest_file = $temp_dir.'/'.$_POST['flowFilename'].'.part'.$_POST['flowChunkNumber'];

                    if (!is_dir($temp_dir)) {
                        mkdir($temp_dir, 0777, true);
                    }
                    if (!move_uploaded_file($file['tmp_name'], $dest_file)) {
                        echo json_encode(array("error"=>-1));
                    } else {
                        $this->createFileFromChunks_1($temp_dir, $_POST['flowFilename'],
                                $_POST['flowChunkSize'], $_POST['flowTotalSize'],$this->input->post('album_id'));

                    }
                }
            }
            else
            {
                echo json_encode(array("error"=>-1,'error_message'=> 'Unknown album'));
            }

        }
        
        private function createFileFromChunks_1($temp_dir, $fileName, $chunkSize, $totalSize, $album_id) {


            $total_files = 0;
            foreach(scandir($temp_dir) as $file) {
                 if (stripos($file, $fileName) !== false) {
                     $total_files++;
                 }
            }

            if ($total_files * $chunkSize >=  ($totalSize - $chunkSize + 1)) {
                $new_file_name = mktime().'_'.md5($fileName).".".substr($fileName, strrpos($fileName, '.')+1);
                if (($fp = fopen($this->user_photo_uploads_dir.$new_file_name, 'w')) !== false) {
                    for ($i=1; $i<=$total_files; $i++) {
                        fwrite($fp, file_get_contents($temp_dir.'/'.$fileName.'.part'.$i));
                    }
                    fclose($fp);
                } else {
                    return false;
                }
                if (rename($temp_dir, $temp_dir.'_UNUSED')) {
                    $this->rrmdir($temp_dir.'_UNUSED');
                } else {
                    $this->rrmdir($temp_dir);
                }
                if(file_exists($this->user_photo_uploads_dir.$new_file_name))
                {
                    $this->save_user_photo($album_id,$new_file_name);
                }
                else
                {
                    echo json_encode(array("error"=>-1));
                }
               
            }

        }
        
        private function save_user_photo($album_id,$new_file_name)
        {
            if($album_id)
            {
                $user_albums = $this->profile_model->get_all_users_albums();
                if(in_array($album_id, $user_albums))
                {
                    ini_set('memory_limit', '256M' );
                    include('./third_part/SimpleImage.php');
                    try {
                        copy($this->user_photo_uploads_dir.$new_file_name, $this->user_photo_save_dir.'original_'.$new_file_name);
                        $img = new abeautifulsite\SimpleImage($this->user_photo_uploads_dir.$new_file_name);
                        $wim = $img->get_width();
                        $him = $img->get_height();
                        
                        
                        if($wim > $him)
                        {
                            $razn      = round(($wim-$him) / 2);
                            $top_x     = $razn;
                            $top_y     = 0;
                            $bottom_x  = $wim - $razn;
                            $bottom_y  = $him;
                            if($wim > 500)
                            {
                                $img->fit_to_width(500)->save($this->user_photo_save_dir.'500_'.$new_file_name);
                            }
                            else
                            {
                                $img->save($this->user_photo_save_dir.'500_'.$new_file_name);
                            }

                            $img->thumbnail(140,140,'center')->save($this->user_photo_save_dir.'140_'.$new_file_name);
                        }
                        elseif($him > $wim)
                        {
                            $razn      = round(($wim-$him) / 2);
                            $top_x     = 0;
                            $top_y     = $razn;
                            $bottom_x  = $wim;
                            $bottom_y  = $him - $razn;
                            if($him > 500 & $wim > 500)
                            {
                                $img->fit_to_width(500)->save($this->user_photo_save_dir.'500_'.$new_file_name);
                            }
                            else
                            {
                                $img->save($this->user_photo_save_dir.'500_'.$new_file_name);
                            }
                            $img->thumbnail(140,140,'center')->save($this->user_photo_save_dir.'140_'.$new_file_name);
                        }
                        else
                        {
                            if($wim > 500)
                            {
                                $img->fit_to_width(500)->save($this->user_photo_save_dir.'500_'.$new_file_name);
                            }
                            else
                            {
                                $img->save($this->user_photo_save_dir.'500_'.$new_file_name);
                            }
                            $img->thumbnail(140,140,'center')->save($this->user_photo_save_dir.'140_'.$new_file_name);
                        }


                    } catch(Exception $e) {
                        echo json_encode(array("error"=>-1,'error_message'=> $e->getMessage()));
                    }

                    if(
                        file_exists($this->user_photo_save_dir.'original_'.$new_file_name) && 
                        file_exists($this->user_photo_save_dir.'500_'.$new_file_name) && 
                        file_exists($this->user_photo_save_dir.'140_'.$new_file_name)
                        )
                    {
                            unlink($this->user_photo_uploads_dir.$new_file_name);
                            if($this->profile_model->save_photo_to_album($new_file_name, $album_id,$wim,$him))
                            {
                                $file_id = $this->profile_model->get_file_id_by_file_name($new_file_name);
                                echo json_encode(array('file_name'=>$new_file_name,"file_id"=> $file_id,"width"=>$wim,"height"=>$him, "success"=>1));
                            }
                            else
                            {
                                unlink($this->user_photo_save_dir.'original_'.$new_file_name);
                                unlink($this->user_photo_save_dir.'500_'.$new_file_name);
                                unlink($this->user_photo_save_dir.'140_'.$new_file_name);
                                echo json_encode(array("error"=>-1,'error_message'=> 'You have exceeded the number of photos!','error_type'=>'error_count'));
                            }
                    }
                    else
                    {
                        unlink($this->user_photo_uploads_dir.$new_file_name);
                        echo json_encode(array("error"=>-1,'error_message'=> 'Unknown error!','error_type'=>'unknown_error'));
                    }
                }
                else
                {
                    echo json_encode(array("error"=>-1,'error_message'=> 'Album doesn`t exists!','error_type'=>'error_album_exist'));
                }
            }
            else
            {
                echo json_encode(array("error"=>-1,'error_message'=> 'Album doesn`t exists!','error_type'=>'error_album_exist'));
            }
        }
        
        public function delete_photo($photo_id)
        {
            if($photo_id && is_numeric($photo_id))
            {
                $res = $this->db->get_where('users_photo',array(
                    'id'      => $photo_id,
                    'user_id' => $this->data['user_info']->user_id
                ))->row();
                if($res->id)
                {
                    unlink($this->user_photo_save_dir.'original_'.$res->filename);
                    unlink($this->user_photo_save_dir.'500_'.$res->filename);
                    unlink($this->user_photo_save_dir.'140_'.$res->filename);
                    $this->db->delete('users_photo', array('id' => $res->id)); 
                    $this->profile_model->try_delete_from_best_photos($res->id);
                    redirect('/profile/view_album/'.$res->album_id);
                }
                else
                {
                    $this->session->set_userdata('error','Очень сложно удалить фотографию, которой нет.');
                    redirect('/profile/edit_portfolio');
                }
            }
            else
            {
                $this->session->set_userdata('error','У вас нет такой фотографии.');
                redirect('/profile/edit_portfolio');
            }
        }
        
        public function set_to_bests($photo_id)
        {
            if($photo_id && is_numeric($photo_id))
            {
                $res = $this->db->get_where('users_photo',array(
                    'id'      => $photo_id,
                    'user_id' => $this->data['user_info']->user_id
                ))->row();
                if($res->id)
                {
                    $cnt = $this->profile_model->count_photo_in_best();
                    $allow_photos = MainSiteConfig::get_profi_parametrs($this->data['user_info']->profi  ? 'profi_best_photos' : 'non_profi_best_photos' );
                    if($cnt < $allow_photos)
                    {
                        $this->profile_model->set_in_best_photos($res->id);
                        $this->session->set_userdata('success','Фотография успешно добавлена в раздел лучших работ.');
                        redirect('/profile/view_album/'.$res->album_id);
                    }
                    else
                    {
                        $this->session->set_userdata('error','Вы превышаете возможное количество фотографий в разделе лучших работ.');
                        redirect('/profile/view_album/'.$res->album_id);
                    }
                }
                else
                {
                    $this->session->set_userdata('error','Нам не удалось определить, какую конкретно фотографию необходимо добавить в лучшее.');
                    redirect('/profile/edit_portfolio');
                }
            }
            else
            {
                $this->session->set_userdata('error','У вас нет такой фотографии.');
                redirect('/profile/edit_portfolio');
            }
        }
        
        public function unset_from_bests($photo_id)
        {
            if($photo_id && is_numeric($photo_id))
            {
                $res = $this->db->get_where('users_photo',array(
                    'id'      => $photo_id,
                    'user_id' => $this->data['user_info']->user_id
                ))->row();
                if($res->id)
                {
                    $this->profile_model->unset_from_best_photos($res->id);
                    $this->session->set_userdata('success','Фотография успешно удалена из раздела лучших работ.');
                    redirect('/profile/view_album/'.$res->album_id);
                }
                else
                {
                    $this->session->set_userdata('error','Нам не удалось определить, какую конкретно фотографию необходимо убрать из лучшего.');
                    redirect('/profile/edit_portfolio');
                }
            }
            else
            {
                $this->session->set_userdata('error','У вас нет такой фотографии.');
                redirect('/profile/edit_portfolio');
            }
        }
        
        public function view_personal_album($album_id)
        {
            $res = $this->profile_model->get_personal_album_id_by_array($this->data['user_info']->user_id);
            if($res[$album_id]->id)
            {
                $this->data['album_info']    = $res[$album_id];
                $this->data['albums_photos'] = $this->profile_model->get_albums_photo($album_id);
                $this->data['best_photos']   = $this->profile_model->get_user_best_photo_as_array();
                $this->data['header'] = $this->themelib->get_header('Редаткирование альбома - '.$this->data['album_info']->name,'profile/index,profile/signin,profile/photoswipe',  $this->data);
                $this->data['footer'] = $this->themelib->get_footer('toprogress,flow.min,photoswipe.min,photoswipe-ui-default.min,profile/view_album');
                $this->data['error']  = $this->themelib->getSessionValue('error'); 
                $this->data['success']  = $this->themelib->getSessionValue('success'); 
                $this->load->view('/profile/view_personal_album',  $this->data);
            }
            else
            {
                $this->session->set_userdata('error','У вас нет такого альбома.');
                //redirect('/profile/edit_portfolio');
            }
        }
        
        public function delete_photo_personal($photo_id)
        {
            if($photo_id && is_numeric($photo_id))
            {
                $res = $this->db->get_where('users_photo',array(
                    'id'      => $photo_id,
                    'user_id' => $this->data['user_info']->user_id
                ))->row();
                if($res->id)
                {
                    unlink($this->user_photo_save_dir.'original_'.$res->filename);
                    unlink($this->user_photo_save_dir.'500_'.$res->filename);
                    unlink($this->user_photo_save_dir.'140_'.$res->filename);
                    $this->db->delete('users_photo', array('id' => $res->id));
                    $this->profile_model->try_delete_from_best_photos($res->id);
                    redirect('/profile/view_personal_album/'.$res->album_id);
                }
                else
                {
                    $this->session->set_userdata('error','Очень сложно удалить фотографию, которой нет.');
                    redirect('/profile/edit_portfolio');
                }
            }
            else
            {
                $this->session->set_userdata('error','У вас нет такой фотографии.');
                redirect('/profile/edit_portfolio');
            }
        }
        
        public function set_to_bests_personal($photo_id)
        {
            if($photo_id && is_numeric($photo_id))
            {
                $res = $this->db->get_where('users_photo',array(
                    'id'      => $photo_id,
                    'user_id' => $this->data['user_info']->user_id
                ))->row();
                if($res->id)
                {
                    $cnt = $this->profile_model->count_photo_in_best();
                    $allow_photos = MainSiteConfig::get_profi_parametrs($this->data['user_info']->profi  ? 'profi_best_photos' : 'non_profi_best_photos' );
                    if($cnt < $allow_photos)
                    {
                        $this->profile_model->set_in_best_photos($res->id);
                        $this->session->set_userdata('success','Фотография успешно добавлена в раздел лучших работ.');
                        redirect('/profile/view_personal_album/'.$res->album_id);
                    }
                    else
                    {
                        $this->session->set_userdata('error','Вы превышаете возможное количество фотографий в разделе лучших работ.');
                        redirect('/profile/view_personal_album/'.$res->album_id);
                    }
                }
                else
                {
                    $this->session->set_userdata('error','Нам не удалось определить, какую конкретно фотографию необходимо добавить в лучшее.');
                    redirect('/profile/edit_portfolio');
                }
            }
            else
            {
                $this->session->set_userdata('error','У вас нет такой фотографии.');
                redirect('/profile/edit_portfolio');
            }
        }
        
        public function unset_from_bests_personal($photo_id)
        {
            if($photo_id && is_numeric($photo_id))
            {
                $res = $this->db->get_where('users_photo',array(
                    'id'      => $photo_id,
                    'user_id' => $this->data['user_info']->user_id
                ))->row();
                if($res->id)
                {
                    $this->profile_model->unset_from_best_photos($res->id);
                    $this->session->set_userdata('success','Фотография успешно удалена из раздела лучших работ.');
                    redirect('/profile/view_personal_album/'.$res->album_id);
                }
                else
                {
                    $this->session->set_userdata('error','Нам не удалось определить, какую конкретно фотографию необходимо убрать из лучшего.');
                    redirect('/profile/edit_portfolio');
                }
            }
            else
            {
                $this->session->set_userdata('error','У вас нет такой фотографии.');
                redirect('/profile/edit_portfolio');
            }
        }
        
        public function edit_top_works()
	{
            $this->data['header'] = $this->themelib->get_header('Редактирование лучших работ','profile/index,profile/signin',  $this->data);
            $this->data['footer'] = $this->themelib->get_footer('');
            $this->data['best_photos'] = $this->profile_model->get_all_users_best_photos($this->data['user_info']->user_id);
            $this->load->view('/profile/edit_top_works',  $this->data);
	}
        
        public function unset_from_bests_edit($photo_id)
        {
            if($photo_id && is_numeric($photo_id))
            {
                $res = $this->db->get_where('users_photo',array(
                    'id'      => $photo_id,
                    'user_id' => $this->data['user_info']->user_id
                ))->row();
                if($res->id)
                {
                    $this->profile_model->unset_from_best_photos($res->id);
                    $this->session->set_userdata('success','Фотография успешно удалена из раздела лучших работ.');
                    redirect('/profile/edit_top_works/');
                }
                else
                {
                    $this->session->set_userdata('error','Нам не удалось определить, какую конкретно фотографию необходимо убрать из лучшего.');
                    redirect('/profile/edit_portfolio');
                }
            }
            else
            {
                $this->session->set_userdata('error','У вас нет такой фотографии.');
                redirect('/profile/edit_portfolio');
            }
        }
        
        public function view_portfolio_item($album_id)
        {
            $res  =$this->profile_model->get_all_users_albums();
            if(in_array($album_id, $res))
            {
                $this->data['album_id'] = $album_id;
                $this->data['album_info_tmp'] = $this->profile_model->get_all_users_albums_by_id_key_array()[$album_id];
                $this->data['album_photos'] = $this->profile_model->get_albums_photo($album_id);
                $this->data['header']        = $this->themelib->get_header('Просмотр альбома','profile/index,profile/photoswipe',  $this->data);
                $this->data['footer']        = $this->themelib->get_footer('photoswipe.min,photoswipe-ui-default.min,profile/index');
                $this->load->view('/profile/view_portfolio_item',  $this->data);
            }
            else
            {
                $this->session->set_userdata('error','У вас нет такого альбома. Заведите себе такой.');
                redirect('/profile/edit_portfolio');
            }
        }
        
        public function edit_actions()
        {
            $this->data['header'] = $this->themelib->get_header('Редактирование акций исполнителя','profile/index,profile/signin,profile/actions',  $this->data);
            $this->data['footer'] = $this->themelib->get_footer('');
            $this->data['error']  = $this->themelib->getSessionValue('error');
            $this->data['success']  = $this->themelib->getSessionValue('success'); 
            $this->data['all_actions'] = $this->profile_model->get_all_actions();
            $this->load->view('/profile/edit_actions',  $this->data);
        }
        
        public function create_action()
        {
            $this->data['header'] = $this->themelib->get_header('Добавление новой рекламной акции','profile/index,profile/signin,profile/actions,profile/ui/trumbowyg.min',  $this->data);
            $this->data['footer'] = $this->themelib->get_footer('autogrowtextarea,toprogress,flow.min,trumbowyg.min,profile/create_action');
            $this->data['error']  = $this->themelib->getSessionValue('error');
            $this->data['success']  = $this->themelib->getSessionValue('success'); 
            $this->data['all_actions'] = $this->profile_model->get_all_actions();
            $this->load->view('/profile/create_action',  $this->data);
        }
        
        public function upload_action()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $temp_dir = $this->user_action_uploads_dir.$_GET['flowIdentifier'];
                $chunk_file = $temp_dir.'/'.$_GET['flowFilename'].'.part'.$_GET['flowChunkNumber'];
                if (file_exists($chunk_file)) {
                    header("HTTP/1.0 200 Ok");
                } else
                {
                  header("HTTP/1.0 404 Not Found");
                }
            }

            if (!empty($_FILES)) foreach ($_FILES as $file) {
                if ($file['error'] != 0) {
                    continue;
                }
                $temp_dir = $this->user_action_uploads_dir.$_POST['flowIdentifier'];
                $dest_file = $temp_dir.'/'.$_POST['flowFilename'].'.part'.$_POST['flowChunkNumber'];

                if (!is_dir($temp_dir)) {
                    mkdir($temp_dir, 0777, true);
                }
                if (!move_uploaded_file($file['tmp_name'], $dest_file)) {
                    echo json_encode(array("error"=>-1));
                } else {
                  $this->createFileFromChunks_action($temp_dir, $_POST['flowFilename'], $_POST['flowChunkSize'], $_POST['flowTotalSize']);
                   
                    
                }
            }
        }
        
        private function createFileFromChunks_action($temp_dir, $fileName, $chunkSize, $totalSize) {


            $total_files = 0;
            foreach(scandir($temp_dir) as $file) {
                 if (stripos($file, $fileName) !== false) {
                     $total_files++;
                 }
            }

            if ($total_files * $chunkSize >=  ($totalSize - $chunkSize + 1)) {
                $new_file_name = mktime().'_'.md5($fileName).".".substr($fileName, strrpos($fileName, '.')+1);
                if (($fp = fopen($this->user_action_uploads_dir.$new_file_name, 'w')) !== false) {
                    for ($i=1; $i<=$total_files; $i++) {
                        fwrite($fp, file_get_contents($temp_dir.'/'.$fileName.'.part'.$i));
                    }
                    fclose($fp);
                } else {
                    return false;
                }
                if (rename($temp_dir, $temp_dir.'_UNUSED')) {
                    $this->rrmdir($temp_dir.'_UNUSED');
                } else {
                    $this->rrmdir($temp_dir);
                }
                if(file_exists($this->user_action_uploads_dir.$new_file_name))
                {
                    $this->save_action_image($new_file_name);
                }
                else
                {
                    echo json_encode(array("error"=>-1));
                }
               
            }

        }
        
        private function save_action_image($new_file_name)
        {
            ini_set('memory_limit', '256M' );
            include('./third_part/SimpleImage.php');
            try {
                $img = new abeautifulsite\SimpleImage($this->user_action_uploads_dir.$new_file_name);
                $wim = $img->get_width();
                $him = $img->get_height();

                if($wim > 1000 && $him > 250)
                {
                    $img->fit_to_width(740)->save($this->user_action_save_dir.'740_'.$new_file_name);
                    $img->fit_to_width(200)->save($this->user_action_save_dir.'200_'.$new_file_name);
                    if(file_exists($this->user_action_save_dir.'740_'.$new_file_name) && file_exists($this->user_action_save_dir.'200_'.$new_file_name))
                    {
                        unlink($this->user_action_uploads_dir.$new_file_name);
                        echo json_encode(array('file_name'=>$new_file_name, "success"=>1));
                    }
                    else
                    {
                        echo json_encode(array("error"=>-1,'error_message'=> 'unknown_file'));
                    }
                }
                else
                {
                    unlink($this->user_action_uploads_dir.$new_file_name);
                    echo json_encode(array("error"=>-1,'error_message'=> 'size_error'));
                }
                
            } catch(Exception $e) {
                echo json_encode(array("error"=>-1,'error_message'=> $e->getMessage()));
            }

        }
        
        public function save_action()
        {
            $title  = trim($this->input->post('title'));
            $text = trim($this->input->post('text'));
            $file_name = trim($this->input->post('file_name'));
            if($title)
            {
                if($text == '' && $file_name == '')
                {
                    $this->session->set_userdata('error','Введите текст или задайте изображение рекламной акции.');
                    redirect('/profile/create_action');
                }
                else
                {
                    $res = $this->profile_model->get_user_actions_count();
                    if($res < MainSiteConfig::get_profi_parametrs($this->data['user_info']->profi ? 'profi_actions' : 'non_profi_actions'))
                    {
                        $this->profile_model->save_user_action($title,$text,$file_name);
                        $this->session->set_userdata('success','Акция успешно добавлена');
                        redirect('/profile/edit_actions');
                    }
                    else
                    {
                        $this->session->set_userdata('error','Вы не можете добавить больше рекламных акций.');
                        redirect('/profile/edit_actions');
                    }
                }
            }
            else
            {
                $this->session->set_userdata('error','Введите название рекламной акции.');
                redirect('/profile/create_action');
            }
        }
        
        public function view_action($action_id)
        {
            $res = $this->profile_model->get_action_info($action_id);
            if($res->id && is_numeric($action_id))
            {
                $this->data['header']   = $this->themelib->get_header('Просмотр акции - '.$res->title,'profile/index,profile/signin,profile/actions',  $this->data);
                $this->data['footer']   = $this->themelib->get_footer();
                $this->data['error']    = $this->themelib->getSessionValue('error'); 
                $this->data['success']  = $this->themelib->getSessionValue('success'); 
                $this->data['action']   = $res;
                $this->load->view('/profile/view_action',  $this->data);
            }
            else
            {
                $this->session->set_userdata('error','У вас нет такой рекламной акции.');
                redirect('/profile/edit_actions');
            }
        }
        
        public function delete_action($action_id)
        {
            $res = $this->profile_model->get_action_info($action_id);
            if($res->id && is_numeric($action_id))
            {
                unlink($this->user_action_save_dir."200_".$res->image);
                unlink($this->user_action_save_dir."740_".$res->image);
                $this->profile_model->delete_action($res->id);
                $this->session->set_userdata('success','Акция успешно удалена.');
                redirect('/profile/edit_actions');
            }
            else
            {
                $this->session->set_userdata('error','У вас нет такой рекламной акции.');
                redirect('/profile/edit_actions');
            }
        }
        
        public function balance_add()
	{
            $this->data['header']        = $this->themelib->get_header('Пополнение баланса','profile/signin,profile/index',  $this->data);
            $this->data['footer']        = $this->themelib->get_footer();
                        
            $this->load->view('/profile/balance_add',  $this->data);
	}
        
        public function delete_album($album_id)
        {
            $res  =$this->profile_model->get_all_users_albums();
            if(in_array($album_id, $res))
            {
                $peral = $this->profile_model->get_personal_album_id_by_array($this->data['user_info']->user_id);
                if($peral[$album_id]->id)
                {
                    $ss = $this->profile_model->get_albums_photo($album_id);
                    if(count($ss) > 0)
                    {
                        $this->session->set_userdata('error','Альбом не пустой. Сначала удалите все фотографии из альбома.');
                        redirect('/profile/view_personal_album/'.$album_id);
                    }
                    else
                    {
                        $this->profile_model->delete_personal_album($album_id);
                        $this->session->set_userdata('success','Альбом успешно удален.');
                        redirect('/profile/edit_portfolio/');
                    }
                }
                else
                {
                    $this->session->set_userdata('error','Удалить можно только персональные альбомы.');
                    redirect('/profile/edit_portfolio/');
                }
            }
            else
            {
                $this->session->set_userdata('error','У вас нет такого альбома. Его невозможно удалить.');
                redirect('/profile/edit_portfolio');
            }
        }
}
