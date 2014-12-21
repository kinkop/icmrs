<?php

    return array(
        'slide_path' => public_path() . DIRECTORY_SEPARATOR . 'upload' . DIRECTORY_SEPARATOR . 'slides',
        'slide_url' => asset('upload/slides'),

        'conference_path' => public_path() . DIRECTORY_SEPARATOR . 'upload' . DIRECTORY_SEPARATOR . 'conferences',
        'conference_url' => asset('upload/conferences'),

        'file_path' => public_path() . DIRECTORY_SEPARATOR . 'upload' . DIRECTORY_SEPARATOR . 'files',
        'file_url' => asset('upload/files'),
    );