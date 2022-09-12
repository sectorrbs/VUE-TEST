<?php

    if (!function_exists('fa5')) {
        function fa5($attr, $type = 'r')
        {
            $class = '';
            $attrs = '';
            if (is_array($attr)) {
                if (array_key_exists('class', $attr)) {
                    $class = $attr['class'];
                    unset($attr['class']);
                }

                foreach ($attr as $k => $v) $attrs .= $k . '="' . $v . '" ';
            } else {
                $class = $attr;
            }
            return '<i class="fa5 fa' . $type . ' fa-' . $class . '" ' . $attrs . '></i>';
        }
    }

    if (!function_exists('fa5r')) {
        function fa5r($attr)
        {
            return fa5($attr, 'r');
        }
    }

    if (!function_exists('fa5s')) {
        function fa5s($attr)
        {
            return fa5($attr, 's');
        }
    }

    if (!function_exists('fa5l')) {
        function fa5l($attr)
        {
            return fa5($attr, 'l');
        }
    }

    if (!function_exists('fa5d')) {
        function fa5d($attr)
        {
            return fa5($attr, 'd');
        }
    }

    if (!function_exists('fa5b')) {
        function fa5b($attr)
        {
            return fa5($attr, 'b');
        }
    }

    if (!function_exists('icon')) {
        function icon($class, $attr = array())
        {
            $attr_html = '';
            foreach ($attr as $k => $v) $attr_html .= $k . '="' . $v . '" ';

            $icon = '<i class="icon icon-' . $class . '" ' . $attr_html . '></i>';
            return $icon;
        }
    }

    if (!function_exists('anchor')) {
        function anchor($uri = '', $title = '', $attributes = '')
        {
            $title = (string)$title;

            if ($uri == 'js' || $uri == 'javascript:void(0)') {
                $site_url = 'javascript:void(0)';

            } else {

                $site_url = is_array($uri)
                    ? url($uri)
                    : (preg_match('#^(\w+:)?//#i', $uri) ? $uri : url($uri));
            }

            if ($title === '') {
                $title = $site_url;
            }

            if ($attributes !== '') {
                $attributes = _stringify_attributes($attributes);
            }

            return '<a href="' . $site_url . '" ' . $attributes . ' >' . $title . '</a>';
        }
    }

    if (!function_exists('_stringify_attributes')) {
        /**
         * Stringify attributes for use in HTML tags.
         *
         * Helper function used to convert a string, array, or object
         * of attributes to a string.
         *
         * @param mixed    string, array, object
         * @param bool
         * @return    string
         */
        function _stringify_attributes($attributes, $js = FALSE)
        {
            $atts = NULL;

            if (empty($attributes)) {
                return $atts;
            }

            if (is_string($attributes)) {
                return ' ' . $attributes;
            }

            $attributes = (array)$attributes;

            foreach ($attributes as $key => $val) {
                $atts .= ($js) ? $key . '=' . $val . ',' : ' ' . $key . '="' . $val . '"';
            }

            return rtrim($atts, ',');
        }
    }

    if (!function_exists('mask')) {
        function mask($str, $pattern)
        {
            $return = '';
            $j = 0;
            for ($i = 0; $i < strlen($pattern); $i++) {
                if ($pattern[$i] == '?' and isset($str[$j])) {
                    $return .= $str[$j];
                    $j++;
                } else {
                    $return .= $pattern[$i];
                }
            }
            return $return;
        }
    }


    if (!function_exists('action_result')) {
        function action_result($status = false, $text = "", $close = false)
        {
            $status = $status ? 'note-' . $status : "";
            $close = $close ? '<div class="note-close" data-note-close>'. fa5s('times') . '</div>' : "";
            return '<div class="note ' . $status . '" data-note-body>' . $close . $text . '</div>';
        }
    }


    /*
|--------------------------------------------------------------------------
| FILES HELPERS
|--------------------------------------------------------------------------
*/
    if ( ! function_exists('check_img'))
    {
        function check_img($src, $attr = array(), $nophoto = 'default.png', $only_url = false)
        {
            if(file_exists('./'.$src) and $src != "" and !is_dir('./'.$src)) {
                if(!empty($attr))
                {   dd(1);
                    $attr['src'] = $src;
                    return !$only_url ? url($attr) : url($src);
                }

                return !$only_url ? url($src) : url($src);
            }

            if($nophoto)
            {
                $np = $nophoto != '' ? $nophoto : '300x200.png';
                $attr = 'assets/uploads/nophoto/'.$np;

                return !$only_url ? url($attr) : url('assets/site/img/no-photo/'.$np);
            }

            return '';
        }
    }
