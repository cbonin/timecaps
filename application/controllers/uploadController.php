<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller
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
      if (empty($this->input->post("title")))
      {
         $status = "error";
         $msg = "Veuillez saisir un titre";
      }
      if ($status != "error")
      {
         $config['upload_path'] = './files/';
         $config['allowed_types'] = 'gif|jpg|png|doc|txt';
         $config['max_size']  = 1024 * 8;
         $config['encrypt_name'] = TRUE;
         $this->load->library('upload', $config);
         if (!$this->upload->do_upload($file_element_name))
         {
            $status = 'error';
            $msg = $this->upload->display_errors('', '');
         }
         else
         {
            $data = $this->upload->data();

            $dataToUp = array(
               'titre' => $this->input->post('title'),
               'nom' => $data['file_name'],
            )

            $file_id = $this->filesModel->insert_file(dataToUp);
            if($file_id)
            {
               $status = "success";
               $msg = "File successfully uploaded";
            }
            else
            {
               unlink($data['full_path']);
               $status = "error";
               $msg = "Une erreur est survenue, veuillez ré-essayer";
            }
         }
         @unlink($_FILES[$file_element_name]);
      }
      echo json_encode(array('status' => $status, 'msg' => $msg));
   }

   public function files()
   {
      $files = $this->files_model->get_files();
      $this->load->view('files', array('files' => $files));
   }

   public function get_files()
   {
      return $this->db->select()
            ->from('files')
            ->get()
            ->result();
   }

   public function delete_file($file_id)
   {
      if ($this->files_model->delete_file($file_id))
      {
         $status = 'success';
         $msg = 'Le fichier à bien été supprimé';
      }
      else
      {
         $status = 'error';
         $msg = 'Une erreur est survenue, veuillez ré-essayer';
      }
      echo json_encode(array('status' => $status, 'msg' => $msg));
   }














}