<?php

function base64trimmer($data)
{
    if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {

        $data = substr($data, strpos($data, ',') + 1);
        $type = strtolower($type[1]);

        if (!in_array($type, ['jpg', 'jpeg', 'gif', 'png'])) {
            throw new \Exception('Image Type is Not valid');
        }


        if ($data === false) {
            throw new \Exception('Failed to Decode BASE64');
        }

    } else {
        throw new \Exception('Data Not Matched With Image Data');
    }

    return $data;
}
