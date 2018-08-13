# Xeki php Admin
Admin for xeki admin 

## Todo 

## Instalation

### Xeki install
In console 
```
xeki add module xeki-admin
```


### Manual 
+ Clone 
+ Run composer in /core/libs/ folder
+ Copy module to folder xeki-admin
+ Copy config 


## Elements

+ Text

```
array(
    "type"=>"text",
    "name"=>"agreement",
    "title"=>"Text description",
    "required"=>"required",
    "class"=>"col-md-6",
    "value"=>"",
    "description"=>"Nombre de la empresa",
),
```
+ Big text 

```
array(
    "type"=>"admin_blog",
    "name"=>"agreement",
    "title"=>"Nice editor text",
    "required"=>"required",
    "class"=>"col-md-6",
    "value"=>"",
    "description"=>"Nombre de la empresa",
),
```
+ Number

```
array(
        "type"=>"number",
        "name"=>"idCard",
        "title"=>"Id card",
        "required"=>"required",
        "class"=>"col-md-6",
        "value"=>"",
        "description"=>"Your id card",
    ),
```

+ Date

```
array(
    "type"=>"date",
    "name"=>"date",
    "title"=>"Date",
    "required"=>"required",
    "class"=>"col-md-6",
    "value"=>"",
    "description"=>"Date",
),
```
+ Select
```
array(
        "type"=>"select",
        "name"=>"type",
        "select_options" => array(
            "Option1" => "Option1",
            "value" => "Formated Value",
        ),
        "title"=>"Select items",
        "required"=>"required",
        "class"=>"col-md-6",
        "value"=>"",
        "description"=>"Especie",
    ),,
```

+ Boolean
```
array(
        "type"=>"bool",
        "name"=>"active",
        "title"=>"Active",
        "required"=>"required",
        "class"=>"col-md-6",
        "value"=>"",
        "description"=>"Set active or not for your item",
    ),
```

+ Container with items
```
array(
        "type"=>"array_json",
        "array_json_data"=>array(
            array(
                "type"=>"text",
                "title"=>"Title",
                "value_name"=>"title",
                "preview"=>true,
            ),
            array(
                "type"=>"image",
                "title"=>"Image",
                "value_name"=>"image",
                "preview"=>true,
            ),
            array(
                "type"=>"admin_blog",
                "title"=>"Description",
                "value_name"=>"description",
                "preview"=>false,
            ),

        ),
        "name"=>"list_items", #name db field
        "title"=>"List items",
        "required"=>"",
        "value"=>"",
        "description"=>"",
    ),
```




## Pages
Define new url 
```

$xeki_admin = \xeki\module_manager::import_module("xeki_admin");
 

$xeki_admin->set_page("url-page"); // optional
$element_table = array(    
    "type" => "table",
    "text" => "Convenios",
    "class" => "col-md-12",
    "options_list"=>
    "table" => array(
        "type" => "table",
        "background" => "#66ccff",
        "data_fields" => array(
            array(
                "title" => "Name",
            ), 
            array(
                "title" => "Slogan",
            ),
            array(
                "title" => "Item",
            ), 
            array(
                "title" => "Price",
            ),               
        ),
    ),
);
$xeki_admin->set_page("url-page",$element_table);

$element_html = array(    
    "type" => "table",
    "text" => "Convenios",
    "class" => "col-md-12",
    "table" => array(
        "type" => "table",
        "background" => "#66ccff",
        "data_fields" => array(
            array(
                "title" => "Name",
            ), 
            array(
                "title" => "Slogan",
            ),
            array(
                "title" => "Item",
            ), 
            array(
                "title" => "Price",
            ),               
        ),
    ),
);
$xeki_admin->set_page("url-page",$element_table);


```

## How create a admin item
 
### Auto admin
 


# Nice to have
    + Seo counter for title / description / keywords
     
## Type of data

### Text
Simple Text 
+ Third Libs : NONE 
+ Aditional JS : NONE


### Date
Simple Text 
+ Third Libs : DatePicker 
+ Aditional JS : Format for sql format

### Boolean switch
+ Third Libs : JUST Nice CSS 
+ Aditional JS : None
### Select
+ Third Libs : 
+ Aditional JS : 

### Text

## General arquitecture




