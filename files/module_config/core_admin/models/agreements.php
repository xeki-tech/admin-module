<?php
$ag_admin_module = \agent\module_manager::import_module("ag_admin");
$title = "convenios";
$single_name = "convenio";
$table = "agreements"; # for db ( maybe multiple data bases for ref)
$code = "convenio"; # for urls


$html_inners_edit = <<<HTML
HTML;

    
$model_form = array(
    array(
        "type"=>"number",
        "name"=>"idCard",
        "title"=>"C&eacute;dula de identidad",
        "required"=>"required",
        "class"=>"col-md-6",
        "value"=>"",
        "description"=>"C&eacute;dula de identidad",
    ),
    array(
        "type"=>"date",
        "name"=>"date",
        "title"=>"Fecha",
        "required"=>"required",
        "class"=>"col-md-6",
        "value"=>"",
        "description"=>"Fecha",
    ),
    array(
        "type"=>"text",
        "name"=>"agreement",
        "title"=>"Convenio",
        "required"=>"required",
        "class"=>"col-md-6",
        "value"=>"",
        "description"=>"Nombre de la empresa",
    ),
    array(
        "type"=>"text",
        "name"=>"owner",
        "title"=>"Propietario",
        "required"=>"required",
        "class"=>"col-md-6",
        "value"=>"Nombre completo del propietario",
        "description"=>"Nombre del propietario",
    ),
    array(
        "type"=>"number",
        "name"=>"phone",
        "title"=>"Tel&eacute;fono",
        "required"=>"required",
        "class"=>"col-md-6",
        "value"=>"Tel&eacute;fono principal",
        "description"=>"Tlf",
    ),
    array(
        "type"=>"number",
        "name"=>"phone2",
        "title"=>"Tel&eacute;fono 2",
        "required"=>"",
        "class"=>"col-md-6",
        "value"=>"Tel&eacute;fono secundario",
        "description"=>"Tlf",
    ),
    array(
        "type"=>"text",
        "name"=>"email",
        "title"=>"Email",
        "required"=>"required",
        "class"=>"col-md-6",
        "value"=>"correo@correo.com",
        "description"=>"Email",
    ),
    array(
        "type"=>"text",
        "name"=>"petName",
        "title"=>"Nombre de la mascota",
        "required"=>"required",
        "class"=>"col-md-6",
        "value"=>"Nombre de la mascota",
        "description"=>"Nombre de la mascota",
    ),
    array(
        "type"=>"select",
        "name"=>"species",
        "select_options" => array(
            "Gato" => "Gato",
            "Ave" => "Ave",
            "Conejo" => "Conejo",
            "Perro" => "Perro",
            "hamster" => "Hamster"
        ),
        "title"=>"Especie",
        "required"=>"required",
        "class"=>"col-md-6",
        "value"=>"",
        "description"=>"Especie",
    ),
    array(
        "type"=>"number",
        "name"=>"petAge",
        "title"=>"Edad",
        "required"=>"required",
        "class"=>"col-md-6",
        "value"=>"",
        "description"=>"Edad",
    ),
    array(
        "type"=>"select",
        "name"=>"petWeight",
        "select_options" => array(
            "Peque&ntilde;o" => "Peque&ntilde;o",
            "Mediano" => "Mediano",
            "Grande" => "Grande",
        ),
        "title"=>"Peso",
        "required"=>"required",
        "class"=>"col-md-6",
        "value"=>"",
        "description"=>"Peso",
    ),
);

if ($module_action_code == "list-convenios") {
    $element_table_agreement = array(
        "type" => "table",
        "text" => "Convenios",
        "class" => "col-md-12",
        "table" => array(
            "type" => "table",
            "items_query_code" => "agreement", # code like ws_
            "background" => "#66ccff",
            "data_fields" => array(
                array(
                    "title" => "Fecha",
                ), 
                array(
                    "title" => "Convenio",
                ),
                array(
                    "title" => "Propietario",
                ), 
                array(
                    "title" => "Cédula",
                ),               
                array(
                    "title" => "Teléfono",
                ),
                array(
                    "title" => "Teléfono 2",
                ),
                array(
                    "title" => "Email",
                ),
                array(
                    "title" => "Mascota",
                ),
                array(
                    "title" => "Especie",
                ),
                array(
                    "title" => "Edad",
                ),
                array(
                    "title" => "Talla",
                )
            ),
        ),
    );

    array_push($module['elements'], $element_table_agreement);
}

if ($module_action_code == "ws_agreement") {
//    d($_GET);
    $render_method = "json";
    $table = "{$table}";
    $primaryKey = 'idCard';
    $columns = array();
    array_push($columns, array("db" => "idCard", "dt" => count($columns)));
    array_push($columns, array("db" => "date", "dt" => count($columns)));
    array_push($columns, array("db" => "agreement", "dt" => count($columns)));
    array_push($columns, array("db" => "owner", "dt" => count($columns)));
    array_push($columns, array("db" => "idCard", "dt" => count($columns)));
    array_push($columns, array("db" => "phone", "dt" => count($columns)));
    array_push($columns, array("db" => "phone2", "dt" => count($columns)));
    array_push($columns, array("db" => "email", "dt" => count($columns)));
    array_push($columns, array("db" => "petName", "dt" => count($columns)));
    array_push($columns, array("db" => "species", "dt" => count($columns)));
    array_push($columns, array("db" => "petAge", "dt" => count($columns)));
    array_push($columns, array("db" => "petWeight", "dt" => count($columns)));

    $array_json = SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns);
}



if ($module_action_code == "form_new_agreement") {

    $field_controls="";
    foreach($model_form as $item){
        $html_form = $ag_admin_module->form_generator($item);
        $field_controls.=$html_form;
    }

    $render_method = "json";
    $html = <<< HTML
    
<form method="post" enctype="multipart/form-data">
    <h2>Nuevo registro</h2>
    <hr>
    {$field_controls}
  
  <input name="ag_admin_action" value="new_agreement" type="hidden">
  <button type="submit" class="btn btn-primary">Registrar</button>
</form>
HTML;

    $array_json = array(
        "type" => "form",
        "html" => $html,
        "" => "",
        "" => "",
    );

}
if ($module_action_code == "form_edit_agreement") {
    $render_method = "json";
    $id_item = $_GET['id'];

    $query = "SELECT * FROM agreements where idCard='{$id_item}'";
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
        <div id_form="form_edit_agreement" id_item="{$id_item}" class="admin-btn"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</div>
        <div id_form="form_delete_agreement" id_item="{$id_item}" class="admin-btn"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar </div>
    </div>
    <div class="col-md-10">
        <form method="post">
           <h2>Edit agreement</h2>
            <hr>
            <div class="row">
                {$field_controls}
            </div>
            
            
          <input name="ag_admin_action" value="edit_agreement" type="hidden">
          <input name="id" value="{$id_item}" type="hidden">
          <button type="submit" class="btn btn-success">Actualizar</button>
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


if ($module_action_code == "form_delete_agreement") {
    $render_method = "json";
    $id_item = $_GET['id'];

    $html = <<< HTML
    <div class="row">
        <div class="col-md-2 left_buttons">
            <div id_form="form_edit_agreement" id_item="{$id_item}" class="admin-btn"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Info</div>
            <div id_form="form_delete_agreement" id_item="{$id_item}" class="admin-btn"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete </div>
        </div>
        <div class="col-md-10">
            <form method="post">
               <h2>Delete agreement</h2>
                <hr>
              <input name="ag_admin_action" value="delete_agreement" type="hidden">
              <input name="idCard" value="{$id_item}" type="hidden">
              <button type="submit" class="btn btn-warning">ELIMINAR</button>
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



if($values["ag_admin_action"]=="new_agreement"){

    $data=array(
        "idCard"=>$values["idCard"],
        "date"=>$values["date"],
        "agreement"=>$values["agreement"],
        "owner"=>$values["owner"],
        "phone"=>$values["phone"],
        "phone2"=>$values["phone2"],
        "email"=>$values["email"],
        "petName"=>$values["petName"],
        "species"=>$values["species"],
        "petAge"=>$values["petAge"],
        "petWeight"=>$values["petWeight"]
    );
    // $processed_images = $ag_admin->save_images($images_files,$_FILES);
    
    // $data = array_merge($data,$processed_images);

    // add images
    $array_json['data']=$data;
    $res = $ag_sql->insert("agreements", $data);

    $array_json['post']=$_POST;
    $array_json['id_item']=$res;
    $array_json['callback']= <<<JS
        js_admin.close();
JS;
    

}


if($values["ag_admin_action"] == "edit_agreement"){
    
    // upgrade image
    
    $data=array(
        "idCard"=>$values["idCard"],
        "date"=>$values["date"],
        "agreement"=>$values["agreement"],
        "owner"=>$values["owner"],
        "phone"=>$values["phone"],
        "phone2"=>$values["phone2"],
        "email"=>$values["email"],
        "petName"=>$values["petName"],
        "species"=>$values["species"],
        "petAge"=>$values["petAge"],
        "petWeight"=>$values["petWeight"]
    );
    // $processed_images = $ag_admin->save_images($images_files,$_FILES);
    
    // $data = array_merge($data,$processed_images);

    $res = $ag_sql->update("agreements",$data," idCard = '{$values['idCard']}'");
    if(!$res){
        $array_json['error']=$ag_sql->error();
    }else{
        $array_json['post']=$_POST;
        $array_json['id_item']=$res;
        $array_json['callback']= <<<JS
            js_admin.close();
JS;
    }
}

if($values["ag_admin_action"]=="delete_agreement"){
    $render_method = "json";
    $res = $ag_sql->delete("agreements"," idCard = {$values['idCard']}");
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