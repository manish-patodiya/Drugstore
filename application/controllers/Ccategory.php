<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Ccategory extends CI_Controller
{
    public $menu;
    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        $this->load->library('lcategory');
        $this->load->library('session');
        $this->load->model('Categories');
        $this->auth->check_admin_auth();
        $this->template->current_menu = 'category';

    }
    //Default loading for Category system.
    public function index()
    {
        //Calling Customer add form which will be loaded by help of "lcustomer,located in library folder"
        $content = $this->lcategory->category_add_form();
        //Here ,0 means array position 0 will be active class
        $this->template->full_admin_html_view($content);
    }
    //Product Add Form
    public function manage_category()
    {
        $content = $this->lcategory->category_list();
        $this->template->full_admin_html_view($content);
    }
    //Insert Product and upload
    public function insert_category()
    {

        //Customer  basic information adding.
        $data = array(
            'category_name' => $this->input->post('category_name'),
            'status' => 1,
        );

        $result = $this->Categories->category_entry($data);
        $is_modal_form = strtolower($this->input->post('is_modal_form'));
        if ($is_modal_form == 'yes') {
            echo json_encode([
                "status" => 1,
                "msg" => display('successfully_added'),
            ]);
        } else {
            //Previous balance adding -> Sending to customer model to adjust the data.
            $this->session->set_userdata(array('message' => display('successfully_added')));
            redirect(base_url('Ccategory'));
        }

    }
    //customer Update Form
    public function category_update_form($category_id)
    {
        $content = $this->lcategory->category_edit_data($category_id);
        $this->menu = array('label' => 'Edit Category', 'url' => 'Ccustomer');
        $this->template->full_admin_html_view($content);
    }
    // customer Update
    public function category_update()
    {
        $this->load->model('Categories');
        $category_id = $this->input->post('category_id');
        $data = array(
            'category_name' => $this->input->post('category_name'),
            'status' => $this->input->post('status'),
        );

        $this->Categories->update_category($data, $category_id);
        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Ccategory/index'));
        exit;
    }
    // product_delete
    public function category_delete($id = null)
    {
        $this->load->model('Categories');
        $category_id = $id;
        $this->Categories->delete_category($category_id);
        $this->session->set_userdata(array('message' => display('successfully_delete')));
        redirect(base_url('Ccategory/index'));
        return true;
    }
}