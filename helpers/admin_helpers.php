<?php

    function iconlist($params): string
    {
        $html = '<ul class="entries-view-info">';

        foreach ($params as $item) {
            $html .= '<li><div class="item">' .
                '<div class="icon">' . (!empty($item['icon']) ? $item['icon'] : null) . '</div>' .
                '<div class="text">' . (!empty($item['text']) ? $item['text'] : '&nbsp;') . '</div>' .
                '</div></li>';
        }


        $html .= '</ul>';

        return $html;
    }


    # BUTTONS

    /* icons */

    function btn_icon_view($path)
    {
        return anchor($path, fa5r('eye'), ['class' => 'btn btn-sm btn-info btn-icon', 'title' => 'Просмотр']);
    }

    function btn_icon_edit($path)
    {
        return anchor($path, fa5s('pencil-alt'), ['class' => 'btn btn-sm btn-success btn-icon', 'title' => 'Редактирование']);
    }

    function btn_icon_delete($path)
    {
        return anchor($path, fa5r('trash-alt'), ['class' => 'btn btn-sm btn-error btn-icon', 'title' => 'Удаление', 'data-entries' => 'delete']);
    }

    /* buttons */

    function btn_add($text = 'Добавить', $icon = null)
    {
        $icon = $icon ?? fa5s('plus mr5');
        return '<button class="btn btn-success">' . $icon . ' ' . $text . '</button>';
    }

    function btn_save($text = 'Сохранить', $icon = null)
    {
        $icon = $icon ?? fa5r('save mr5');
        return '<button class="btn btn-success">' . $icon . ' ' . $text . '</button>';
    }

    function btn_save_exit($text = 'Соxранить и выйти', $icon = null)
    {
        $icon = $icon ?? fa5s('check mr5');
        return '<button class="btn btn-info" data-entryform="close">' . $icon . ' ' . $text . '</button>';
    }

    /* links */

    function btn_link_edit($path, $text = 'Редактировать', $icon = null)
    {
        $icon = $icon ?? fa5s('pen mr5');
        return anchor($path, $icon . ' ' . $text, ['class' => 'btn btn-success']);
    }

    function btn_link_create($path, $text = 'Добавить запись', $icon = null)
    {
        $icon = $icon ?? fa5s('plus mr5');
        return anchor($path, $icon . ' ' . $text, ['class' => 'btn btn-success']);
    }

    function btn_link_delete($path, $text = 'Удалить запись', $icon = null)
    {
        $icon = $icon ?? fa5s('times mr5');
        return anchor($path, $icon . ' ' . $text, ['class' => 'btn btn-error', 'data-entries' => 'delete']);
    }

    function btn_link_back($path, $text = 'Вернуться назад', $icon = null)
    {
        $icon = $icon ?? fa5s('reply mr5');
        return anchor($path, $icon . ' ' . $text, ['class' => 'btn']);
    }

    if (!function_exists('visibility')) {
        function visibility($check)
        {
            return $check
                ? '<span class="color-success" data-toggle="tooltip" title="Отображать на сайте">' . fa5r('eye fa-fw') . '</span>'
                : '<span class="color-error" data-toggle="tooltip" title="Не отображать на сайте">' . fa5s('eye-slash fa-fw') . '</span>';
        }
    }

    if (!function_exists('seo_checker')) {
        function seo_checker($title, $descr)
        {
            $result = null;
            $text = [];
            $icon = '<i class=\'fa5 fas fa-exclamation-triangle fa-fw mr5\'></i>';

            if ($title) {
                $meta_title = mb_strlen($title);
                if ($meta_title == '') {
                    $text[] = $icon . ' Meta Title не указан!';
                } elseif ($meta_title < META_TITLE_ALLOW) {
                    $text[] = $icon . ' Meta Title должен содержать не менее ' . META_TITLE_ALLOW . ' символов!';
                } elseif ($meta_title > META_TITLE_TOTAL) {
                    $text[] = $icon . ' Meta Title должен содержать не более ' . META_TITLE_TOTAL . ' символов!';
                }
            }

            if ($descr) {
                $meta_description = mb_strlen($descr);
                if ($meta_description == '') {
                    $text[] = $icon . ' Meta Description не указан!';
                } elseif ($meta_description < META_DESCRIPTION_ALLOW) {
                    $text[] = $icon . ' Meta Description должен содержать не менее ' . META_DESCRIPTION_ALLOW . ' символов!';
                } elseif ($meta_description > META_DESCRIPTION_TOTAL) {
                    $text[] = $icon . ' Meta Description должен содержать не более ' . META_DESCRIPTION_TOTAL . ' символов!';
                }
            }

            if (!empty($text)) {
                $result = '<span class="color-warning" data-toggle="tooltip" data-html="true" data-title="<div>' . implode("</div><div class='mt5'>", $text) . '</div>" data-placement="left">' . fa5s('exclamation-triangle fa-fw') . '</span>';
            }

            return $result;
        }
    }

    if (!function_exists('entries_date')) {
        function entries_date($date)
        {
            return '<div>' . fa5r('calendar-alt mr5 fa-fw color-gray-lite') . ' ' . date('d.m.Y', strtotime($date)) . '</div>' .
                '<div>' . fa5r('clock mr5 fa-fw color-gray-lite') . ' ' . date('H:i', strtotime($date)) . '</div>';
        }
    }
