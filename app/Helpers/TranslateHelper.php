<?php

function locale_trans($data, $field, $locale = false) {
    if (!isset($data->{$field})) {
        return false;
    }
    if (!isset($data->translate)) {
        return $data->{$field};
    }
    $count = count($data->translate);
    $i = 0;
    if (!$locale) {
        $locale = app()->getLocale();
    }
    while ($i < count($data->translate) && !($data->translate[$i]->field == $field && $data->translate[$i]->lang == $locale)) {
        $i++;
    }
    return $i < $count ? $data->translate[$i]->text : $data->{$field};
}
