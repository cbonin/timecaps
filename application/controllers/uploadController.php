<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class uploadController extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('filesModel');
      $this->load->database();
      $this->load->helper('url');
   }
   public function index()
   {
      $this->load->view('upload');
   }

   public function upload_file()
   {
      $status = "";
      $msg = "";
      $file_element_name = 'userfile';
      $title = $this->input->post("title");
      $dirName = $this->input->post("idBoite");
      if (empty($title))
      {
         $status = "error";
         $msg = "Veuillez saisir un titre";
      }
      if ($status != "error")
      {
         $filename = ("./files/".$dirName);
         if (!file_exists($filename)) {
             mkdir("./files/".  $dirName, 0777);
         }
         $config['upload_path'] = './files/'.$dirName;
         $config['allowed_types'] = 'mp4|gif|jpg|png|doc|txt|odt|pdf|jpeg|wav|mp3|video/mp4|wmv|avi|ogg|ogv|rtf|bmp|docx|MOV|mpeg|rtf';
         $config['max_size']  = 1024 * 20;
         $config['max_height']  = 2000;
         $config['max_width']  = 2000;
         $config['encrypt_name'] = FALSE;
         $config['file_name'] = $this->input->post('title');
         $this->load->library('upload', $config);
         if (!$this->upload->do_upload($file_element_name))
         {
            $status = 'error';
            $msg = $this->upload->display_errors('', '');
         }
         else
         {

            $thumbFolder = ("./files/".$dirName."/thumb");
            if (!file_exists($thumbFolder)) {
                mkdir("./files/".$dirName."/thumb", 0777);
            }

            $data = $this->upload->data();
            
            //Resize et creation de la thumnail
            $ctemp['image_library'] = 'gd2';
            $ctemp['source_image']  = $data['full_path'];
            $ctemp['create_thumb'] = TRUE;
            $ctemp['maintain_ratio'] = TRUE;
            $ctemp['width'] = 100;
            $ctemp['height'] = 100;
            $ctemp['new_image'] = './files/'.$dirName.'/thumb';
            $ctemp['thumb_marker'] = '';
            
            $this->load->library('image_lib'); 
            $this->image_lib->initialize($ctemp);
            $this->image_lib->resize();
            $this->image_lib->clear();

            $dataToUp = array(
               'titre' => $this->input->post('title'),
               'nom' => $data['file_name'],
               'type' => $data['file_type'],
               'taille' => $data['file_size'],
            );

            $depositeur = intval($this->session->userdata('idUser'));
            $depositer = array(
               'idBoite' => $dirName,
               'idDepositeur' => $depositeur
            );
            $isFile = $this->filesModel->insertMaster($dataToUp, $depositer);

            if($isFile)
            {
               $status = "success";
               $msg = "Votre fichier a bien ete uploade";
            }
            else
            {
               unlink($data['full_path']);
               $status = "error";
               $msg = "Une erreur est survenue, veuillez re-essayer";
            }
         }
         @unlink($_FILES[$file_element_name]);
      }
      echo json_encode(array('status' => $status, 'msg' => $msg));
   }

   public function files($idBoite)
   {
      $files = $this->filesModel->getFiles($idBoite);
      $this->load->view('back/files', array('files' => $files));
   }

   public function delete_file($file_id, $boite_id)
   {
      if ($this->filesModel->delete_file($file_id, $boite_id))
      {
         $status = 'success';
         $msg = 'Le fichier à bien été supprime';
      }
      else
      {
         $status = 'error';
         $msg = 'Une erreur est survenue, veuillez re-essayer';
      }
      echo json_encode(array('status' => $status, 'msg' => $msg));
   }














}