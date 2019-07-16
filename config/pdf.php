<?php

return [
    'mode' => 'utf-8',
    'format' => 'A4',
    'author' => '',
    'subject' => '',
    'keywords' => '',
    'margin_header' => 0,
    'margin_footer' => 5,
    'margin_top'           => 10,
	'margin_bottom'        => 20,
    'creator' => '108Recruit Pdf',
    'display_mode' => 'fullpage',
    'tempDir' => base_path('../temp/'),
    'font_path' => base_path('public/pdf-fonts'),
    'font_data' => [
        'latoregular' => [
            'R' => "Lato-Regular.ttf",
            'B' => 'Lato-Bold.ttf',
        ],
        'phetsarathot' => [
            'R' => 'phetsarath_ot.ttf',
            'B' => 'phetsarath_ot_bold_new.ttf',
            'useOTL' => 0xFF,
            'useKashida' => 75,
        ],
        'saysetthot' => [
            'R' => 'saysettha_OT.ttf',
            'B' => 'saysettha_OT.ttf',
        ],
        "dhyanalao" => [/* Lao fonts */
            'R' => 'Dhyana-Regular.ttf',
            'B' => "Dhyana-Bold.ttf",
            'useOTL' => 0xFF,
        ],
    ]
];
