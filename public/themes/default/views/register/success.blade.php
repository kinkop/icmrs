{{

    Theme::partial('message', array(
        'data' => array(
            'type' => 'success',
            'text' => 'Registred successful. <br /> <a href="' . URL::to('profile') . '">Go to your profile</a> or <a href="' . $conference->frontEndViewUrl . '">Conference page</a>'
        )
    ))

}}