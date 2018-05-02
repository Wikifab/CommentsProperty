<?php
namespace CommentsProperty;

use SMWDINumber;

class CommentsProperty {

	public static function onExtension() {

		global $sespSpecialProperties, $sespLocalPropertyDefinitions;

		//add property annotator to SESP
		$sespSpecialProperties[] = '_COMMENTS';

		$sespLocalPropertyDefinitions['_COMMENTS'] = [
		    'id'    => '___COMMENTS',
		    'type'  => '_num',
		    'alias' => 'cs-comments',
		    'label' => 'Comments',
		    'callback'  => function( $appFactory, $property, $semanticData ){

		        $comments = \Comment::getAssociatedComments($semanticData->getSubject()->getTitle()->getArticleID());
		        $commentsCount = count($comments);

		        return new SMWDINumber($commentsCount);
		    }
		];
	}
}