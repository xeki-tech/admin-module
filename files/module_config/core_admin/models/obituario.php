<?php
$ag_admin_module = \agent\module_manager::import_module("ag_admin");
$title = "obituarios";
$single_name = "obituario";
$table = "obituarios"; # for db ( maybe multiple data bases for ref)
$code = "obituario"; # for urls


$html_inners_edit = <<<HTML
HTML;

    
$model_form = array(
    array(
        "type"=>"text",
        "name"=>"name", #name db field
        "title"=>"Mascota",
        "required"=>"",
        "class"=>"col-md-6",
        "value"=>"",
        "description"=>"Nombre de la mascota",
    ),
    array(
        "type"=>"text",
        "name"=>"owner", #name db field
        "title"=>"Dueno",
        "required"=>"",
        "class"=>"col-md-6",
        "value"=>"",
        "description"=>"Nombre del dueno",
    ),
    array(
        "type"=>"number",
        "name"=>"idCard", #name db field_controls
        "title"=>"Documento de identidad",
        "required"=>"",
        "class"=>"col-md-6",
        "value"=>"",
        "description"=>"CC / CE / Otro",
    ),
    array(
        "type"=>"image",
        "name"=>"image", #name db field
        "title"=>"Imagen",
        "required"=>"",
        "class"=>"col-md-6",
        "value"=>"",
        "description"=>"Imagen de la mascota",
    ),
    array(
        "type"=>"date",
        "name"=>"date", #name db field
        "title"=>"Fecha",
        "required"=>"",
        "class"=>"col-md-6",
        "value"=>"",
        "description"=>"Fecha de registro",
    )
);

if ($module_action_code == "list-obituarios") {
    $element_table_obituario = array(
        "type" => "table",
        "text" => "Obituarios",
        "class" => "col-md-12",
        "table" => array(
            "type" => "table",
            "items_query_code" => "obituario", # code like ws_
            "background" => "#66ccff",
            "data_fields" => array(
                array(
                    "title" => "Mascota",
                ),
                array(
                    "title" => "Dueño",
                ),
                array(
                    "title" => "CC / CE",
                ),
                array(
                    "title" => "Imagen",
                ),
                array(
                    "title" => "Fecha",
                )       
            )
        )
    );

    array_push($module['elements'], $element_table_obituario);
}

if ($module_action_code == "ws_obituario") {
//    d($_GET);
    $render_method = "json";
    $table = "{$table}";
    $primaryKey = 'id';
    $columns = array();
    array_push($columns, array("db" => "id", "dt" => count($columns)));
    array_push($columns, array("db" => "name", "dt" => count($columns)));
    array_push($columns, array("db" => "owner", "dt" => count($columns)));
    array_push($columns, array("db" => "idCard", "dt" => count($columns)));
    array_push($columns, array("db" => "image", "dt" => count($columns)));
    array_push($columns, array("db" => "date", "dt" => count($columns)));
    $array_json = SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns);
}



if ($module_action_code == "form_new_obituario") {

    $field_controls="";
    foreach($model_form as $item){
        $html_form = $ag_admin_module->form_generator($item);
        $field_controls.=$html_form;
    }

    $render_method = "json";
    $html = <<< HTML
    
<form method="post" enctype="multipart/form-data">
    <h2>New obituario</h2>
    <hr>
    {$field_controls}
  
  <input name="ag_admin_action" value="new_obituario" type="hidden">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
HTML;

    $array_json = array(
        "type" => "form",
        "html" => $html,
        "" => "",
        "" => "",
    );

}
if ($module_action_code == "form_edit_obituario") {
    $render_method = "json";
    $id_item = $_GET['id'];

    $query = "SELECT * FROM obituarios where id='{$id_item}'";
    $info = $sql->query($query);
    $info = $info[0];
//    d($info);
    // get info profit


    $field_controls="";
    foreach($model_form as $item){
        $item['value']=$info[$item['name']];
        $html_form = $ag_admin_module->form_generator($item);
        $field_controls.=$html_form;
    }

    $selected_begin =  $info['position']=="begin_body"?"selected":"";

    $bi_active_html = $info['bi_active'] == "on" ? "checked" : '';
    $html = <<< HTML
<div class="row">
    <div class="col-md-2 left_buttons">
        <div id_form="form_edit_obituario" id_item="{$id_item}" class="admin-btn"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</div>
        <div id_form="form_delete_obituario" id_item="{$id_item}" class="admin-btn"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar </div>
    </div>
    <div class="col-md-10">
        <form method="post">
           <h2>Edit obituario</h2>
            <hr>
            <div class="row">
                {$field_controls}
            </div>
            
            
          <input name="ag_admin_action" value="edit_obituario" type="hidden">
          <input name="id" value="{$id_item}" type="hidden">
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
HTML;

    $array_json = array(
        "type" => "form",
        "html" => $html,
        "" => "",
        "" => "",
    );

}


if ($module_action_code == "form_delete_obituario") {
    $render_method = "json";
    $id_item = $_GET['id'];

    $html = <<< HTML
    <div class="row">
        <div class="col-md-2 left_buttons">
            <div id_form="form_edit_obituario" id_item="{$id_item}" class="admin-btn"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Info</div>
            <div id_form="form_delete_obituario" id_item="{$id_item}" class="admin-btn"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete </div>
        </div>
        <div class="col-md-10">
            <form method="post">
               <h2>Delete Obituario</h2>
                <hr>
              <input name="ag_admin_action" value="delete_obituario" type="hidden">
              <input name="id" value="{$id_item}" type="hidden">
              <button type="submit" class="btn btn-primary">DELETE</button>
            </form>
        </div>
    </div>
HTML;

    $array_json = array(
        "type" => "form",
        "html" => $html,
        "" => "",
        "" => "",
    );
}



if($values["ag_admin_action"]=="new_obituario"){


    $data=array(
        "name"=>$values["name"],
        "owner"=>$values["owner"],
        "idCard"=>$values["idCard"],
        "image"=>$values["image"],
        "date"=>$values["date"]
    );
    $processed_images = $ag_admin->save_images($images_files,$_FILES);
    
    $data = array_merge($data,$processed_images);

    // add images
    $array_json['data']=$data;
    $res = $ag_sql->insert("obituarios",$data);

    if(!$res){
        $array_json['error']=$ag_sql->error();
    }
    else{
        $array_json['id_item']=$res;
        $array_json['callback']= <<<JS
        js_admin.edit_item("obituario",{$res});
JS;


    }

}

if($values["ag_admin_action"]=="delete_obituario"){
    $render_method = "json";
    $res = $ag_sql->delete("obituarios"," id = {$values['id']}");
    if(!$res){
        $array_json['error']=$ag_sql->error();
    }
    else{
        $array_json['id_item']=$res;
        $array_json['callback']= <<<JS
        js_admin.close();
JS;
    }
}

if($values["ag_admin_action"] == "edit_obituario"){
    
    // upgrade image
    
    $data=array(
        "name"=>$values["name"],
        "owner"=>$values["owner"],
        "idCard"=>$values["idCard"],
        "image"=>$values["image"],
        "date"=>$values["date"]
    );
    $processed_images = $ag_admin->save_images($images_files,$_FILES);
    
    $data = array_merge($data,$processed_images);

    $res = $ag_sql->update("obituarios",$data," id = '{$values['id']}'");
    if(!$res){
        $array_json['error']=$ag_sql->error();
    }else{
        $array_json['post']=$_POST;
        $array_json['id_item']=$res;
        $array_json['callback']= <<<JS
            js_admin.edit_item("obituario",{$values['id']});
JS;
    }
}