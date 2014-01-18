<?php 

$definition = array(
		'data' => new ezcInputFormDefinitionElement(
				ezcInputFormDefinitionElement::REQUIRED, 'unsafe_raw'
		)
);

$form = new ezcInputForm( INPUT_POST, $definition );

$Chat = erLhcoreClassChat::getSession()->load( 'erLhcoreClassModelChat', $Params['user_parameters']['chat_id']);

if ( erLhcoreClassChat::hasAccessToRead($Chat) )
{
	if ($form->hasValidData('data')) {
		$Chat->remarks = $form->data;
		$Chat->saveThis();
	}
}

echo json_encode(array());
exit;
?>