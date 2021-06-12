<?php
use Illuminate\Support\Facades\Config;

function get_default_lang(){
	if (config::get('app.locale') == "ar"){
        echo 'rtl';
    } else {
        echo 'ltr';
    };
    //APP::isLocale('ar')
}
