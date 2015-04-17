<?php

return array(
    'model'  => 'User',
    "prefix" => "user_",
    "fields" => array(
        "dates"             => array(),
        "booleans"          => array('status'),
        "varchars"          => array('email','password','name','surname'),
        "texts"             => array(),
        "long_texts"        => array(),
        "integers"          => array(),
        "files"             => array(),
        "custom_selections" => array(

        ),
        "relations" => array(
            "field_name" => array(
                "related_model"     => "UserGroup",
                "relation_type"     => "manyToOne", // 'oneToMany', 'manyToOne', 'manyToMany'
                "fields_for_select" => array("name"),
            ),
        ),
        "contextual_varchars"   => array(),
        "contextual_texts"      => array(),
        "contextual_long_texts" => array(),
        "contextual_files"      => array(),
    ),
    "max_tree_depth"  => 0,
    "listing_fields"  => array('email','status'),
    "form_manager"    => array(
//        "tab_name" => array(
//            "field_name"
//        )
    ),
);