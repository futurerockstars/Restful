<?php
namespace Drahak\Restful\Application\Routes;

use Drahak\Restful\IResourceRouter;

/**
 * Resource CrudRoute to simple resource creation
 * @package Drahak\Restful\Routes
 * @author Drahomír Hanák
 */
class CrudRoute extends ResourceRoute
{

	/** Presenter action names */
    const ACTION_CREATE = 'create';
	const ACTION_READ = 'default';
	const ACTION_UPDATE = 'update';
    const ACTION_DELETE = 'delete';

    public function __construct($mask, $presenter = '', $flags = IResourceRouter::CRUD)
    {
        parent::__construct($mask, $presenter . ':default', $flags);
        $this->actionDictionary = array(
            IResourceRouter::POST => self::ACTION_CREATE,
            IResourceRouter::GET => self::ACTION_READ,
            IResourceRouter::PUT => self::ACTION_UPDATE,
            IResourceRouter::DELETE => self::ACTION_DELETE
        );
    }

}