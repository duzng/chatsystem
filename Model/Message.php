<?php
App::uses('AppModel', 'Model');

class Message extends AppModel {
	
 	public $actsAs = array('Containable');
	
    public $belongsTo = array(
        'UserFrom' => array(
            'className'  => 'User',
            'foreignKey' => 'senderid'
        )
    );	
	
	public $validate = array(
		'message' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Message can not be empty',
			),
		),
	);
}
